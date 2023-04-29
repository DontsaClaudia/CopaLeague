<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJoueurRequest;
use App\Http\Requests\StoreJoueurRequest;
use App\Http\Requests\UpdateJoueurRequest;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JoueursController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('joueur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $joueurs = Joueur::with(['equipe'])->get();

        return view('admin.joueurs.index', compact('joueurs'));
    }

    public function create()
    {
        abort_if(Gate::denies('joueur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipes = Equipe::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.joueurs.create', compact('equipes'));
    }

    public function store(StoreJoueurRequest $request)
    {
        $joueur = Joueur::create($request->all());

        return redirect()->route('admin.joueurs.index');
    }

    public function edit(Joueur $joueur)
    {
        abort_if(Gate::denies('joueur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipes = Equipe::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $joueur->load('equipe');

        return view('admin.joueurs.edit', compact('equipes', 'joueur'));
    }

    public function update(UpdateJoueurRequest $request, Joueur $joueur)
    {
        $joueur->update($request->all());

        return redirect()->route('admin.joueurs.index');
    }

    public function show(Joueur $joueur)
    {
        abort_if(Gate::denies('joueur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $joueur->load('equipe');

        return view('admin.joueurs.show', compact('joueur'));
    }

    public function destroy(Joueur $joueur)
    {
        abort_if(Gate::denies('joueur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $joueur->delete();

        return back();
    }

    public function massDestroy(MassDestroyJoueurRequest $request)
    {
        $joueurs = Joueur::find(request('ids'));

        foreach ($joueurs as $joueur) {
            $joueur->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
