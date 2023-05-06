<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTournoiRequest;
use App\Http\Requests\UpdateTournoiRequest;
use App\Http\Resources\Admin\TournoiResource;
use App\Models\Tournoi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TournoisApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tournoi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TournoiResource(Tournoi::all());
    }

    public function store(StoreTournoiRequest $request)
    {
        $tournoi = Tournoi::create($request->all());

        return (new TournoiResource($tournoi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tournoi $tournoi)
    {
        abort_if(Gate::denies('tournoi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TournoiResource($tournoi);
    }

    public function update(UpdateTournoiRequest $request, Tournoi $tournoi)
    {
        $tournoi->update($request->all());

        return (new TournoiResource($tournoi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tournoi $tournoi)
    {
        abort_if(Gate::denies('tournoi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tournoi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
