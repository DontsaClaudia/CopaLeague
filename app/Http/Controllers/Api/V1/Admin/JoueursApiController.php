<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJoueurRequest;
use App\Http\Requests\UpdateJoueurRequest;
use App\Http\Resources\Admin\JoueurResource;
use App\Models\Joueur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JoueursApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('joueur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JoueurResource(Joueur::with(['equipe'])->get());
    }

    public function store(StoreJoueurRequest $request)
    {
        $joueur = Joueur::create($request->all());

        return (new JoueurResource($joueur))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Joueur $joueur)
    {
        abort_if(Gate::denies('joueur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JoueurResource($joueur->load(['equipe']));
    }

    public function update(UpdateJoueurRequest $request, Joueur $joueur)
    {
        $joueur->update($request->all());

        return (new JoueurResource($joueur))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Joueur $joueur)
    {
        abort_if(Gate::denies('joueur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $joueur->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
