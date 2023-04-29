<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Matchs;
use App\Models\Equipe;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Http\Requests\MassDestroyMatchRequest;

class MatchsController extends Controller
{





    function index()
    {
        abort_if(Gate::denies('match_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        $matches = Matchs::with(['equipe_1', 'equipe_2'])->get();



        return view('admin.matches.index', compact('matches'));
    }
    function create()
    {
        abort_if(Gate::denies('match_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        $equipe_1s = Equipe::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');


        $equipe_2s = Equipe::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');



        return view('admin.matches.create', compact('equipe_1s', 'equipe_2s'));
    }
    function store(StoreMatchRequest $request)
    {




        $match = Matchs::create($request->all());


        return redirect()->route('admin.matches.index');
    }
    function edit(Matchs $match)
    {
        abort_if(Gate::denies('match_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        $equipe_1s = Equipe::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');


        $equipe_2s = Equipe::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');


        $match->load('equipe_1', 'equipe_2');

        return view('admin.matches.edit', compact('equipe_1s', 'equipe_2s', 'match'));
    }
    function update(UpdateMatchRequest $request, Matchs $match)
    {




        $match->update($request->all());


        return redirect()->route('admin.matches.index');
    }
    function show(Matchs $match)
    {
        abort_if(Gate::denies('match_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




        $match->load('equipe_1', 'equipe_2');

        return view('admin.matches.show', compact('match'));
    }
    function destroy(Matchs $match)
    {
        abort_if(Gate::denies('match_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




        $match->delete();
        return back();
    }
    function massDestroy(MassDestroyMatchRequest $request)
    {




        $matches = Matchs::find(request('ids'));

        foreach ($matches as $match) {
            $match->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
