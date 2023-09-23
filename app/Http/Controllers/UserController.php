<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateRequest;
use App\Models\User;
use App\Models\Disturbance;
use App\QueryBuilders\CrewQueryBuilder;
use App\QueryBuilders\RoleQueryBuilder;
use App\QueryBuilders\UserQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use JsonStreamingParser\Listener\InMemoryListener;
use JsonStreamingParser\Parser;

class UserController extends Controller
{
    public function index(int $crewId, UserQueryBuilder $queryBuilder): View
    {
        return \view('users.index', [
            'crew_id' => $crewId,
            'userList' => $queryBuilder->getCollectionByCrewId($crewId),
        ]);
    }

    public function create(CrewQueryBuilder $crewQueryBuilder, RoleQueryBuilder $roleQueryBuilder): View
    {
        return \view('users.create', [
            'crews' => $crewQueryBuilder->getCollection(),
        ]);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $validate = $request->validated();

        $validate['role_id'] = (new RoleQueryBuilder())->getRoleIdByName($request['role_id']);
        $user = new User();

        if(!empty($request['assistant_last_name'])) {
             $user = $user->createWithAssistant($validate);
        } else {
            $user = $user->createUser($validate);

        }

        if($user){
            $listener = new InMemoryListener();
            $pathToFile = $request->file('file')->getPathname();
            $parser = new Parser(fopen($pathToFile, 'r'), $listener);
            $parser->parse();
            $result = $listener->getJson();

            if ($result) {
                Disturbance::createDistsByUserId($result, $user);
            }

            return redirect()->route('crews.index')->with('success', 'Данные сохранены');
        }
        return \back()->with('error', 'Ошибка записи данных');
    }

    /**
     * @param UserQueryBuilder $userQueryBuilder
     * @param int              $userId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View|\Illuminate\Foundation\Application
     */
    public function show(UserQueryBuilder $userQueryBuilder, int $userId)
    {
        return \view('users.show', [
            'user' => $userQueryBuilder->getById($userId),
            'distList' => $userQueryBuilder->getUserDistsByUserId($userId),
        ]);
    }
}
