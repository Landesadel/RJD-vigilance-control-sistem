<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateRequest;
use App\Models\User;
use App\QueryBuilders\CrewQueryBuilder;
use App\QueryBuilders\RoleQueryBuilder;
use App\QueryBuilders\UserQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
            'roles' => $roleQueryBuilder->getCollection(),
            'crews' => $crewQueryBuilder->getCollection(),
        ]);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        if($user){
            return redirect()->route('index')->with('success', 'Данные сохранены');
        }
        return \back()->with('error', 'Ошибка записи данных');
    }
}
