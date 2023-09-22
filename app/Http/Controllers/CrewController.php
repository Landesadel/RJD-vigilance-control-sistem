<?php

namespace App\Http\Controllers;

use App\Http\Requests\Crews\CreateRequest;
use App\Models\Crew;
use App\QueryBuilders\CrewQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index(CrewQueryBuilder $queryBuilder): View
    {
        return \view('crews.index', [
            'crewList' => $queryBuilder->getCollection(),
        ]);
    }

    public function create(): View
    {
        return \view('crews.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $crew = Crew::create($request->validated());

        if($crew){
            return redirect()->route('crews.index')->with('success', 'Данные сохранены');
        }
        return \back()->with('error', 'Ошибка записи данных');
    }
}
