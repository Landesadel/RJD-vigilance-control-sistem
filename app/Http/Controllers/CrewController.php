<?php

namespace App\Http\Controllers;

use App\Http\Requests\Crews\CreateRequest;
use App\Models\Crew;
use App\QueryBuilders\UserQueryBuilder;
use App\QueryBuilders\CrewQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CrewController extends Controller
{
    /**
     * @param CrewQueryBuilder $queryBuilder
     * @return View
     */
    public function index(CrewQueryBuilder $queryBuilder): View
    {
        return \view('crews.index', [
            'crewList' => $queryBuilder->getCollection(),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('crews.create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $crew = Crew::create($request->validated());

        if($crew){
            return redirect()->route('crews.index')->with('success', 'Данные сохранены');
        }
        return \back()->with('error', 'Ошибка записи данных');
    }

    /**
     * @param CrewQueryBuilder $crewQueryBuilder
     * @param int              $crewId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View|\Illuminate\Foundation\Application
     */
    public function show(CrewQueryBuilder $crewQueryBuilder, int $crewId)
    {
        return \view('crews.show', [
            'crew' => $crewQueryBuilder->getById($crewId),
            'userList' => $crewQueryBuilder->getAllUsersByCrewId($crewId),
            'dists' => $crewQueryBuilder->getCountDistsByCrewId($crewId),
        ]);
    }
}
