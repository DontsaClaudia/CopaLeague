<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTournoiRequest;
use App\Http\Requests\StoreTournoiRequest;
use App\Http\Requests\UpdateTournoiRequest;
use App\Models\Tournoi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TournoisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tournoi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tournois = Tournoi::all();

        return view('admin.tournois.index', compact('tournois'));
    }

    public function create()
    {
        abort_if(Gate::denies('tournoi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tournois.create');
    }

    public function store(StoreTournoiRequest $request)
    {
        $tournoi = Tournoi::create($request->all());

        return redirect()->route('admin.tournois.index');
    }

    public function edit(Tournoi $tournoi)
    {
        abort_if(Gate::denies('tournoi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tournois.edit', compact('tournoi'));
    }

    public function update(UpdateTournoiRequest $request, Tournoi $tournoi)
    {
        $tournoi->update($request->all());

        return redirect()->route('admin.tournois.index');
    }

    public function show(Tournoi $tournoi)
    {
        abort_if(Gate::denies('tournoi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tournois.show', compact('tournoi'));
    }

    public function destroy(Tournoi $tournoi)
    {
        abort_if(Gate::denies('tournoi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tournoi->delete();

        return back();
    }

    public function massDestroy(MassDestroyTournoiRequest $request)
    {
        $tournois = Tournoi::find(request('ids'));

        foreach ($tournois as $tournoi) {
            $tournoi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
