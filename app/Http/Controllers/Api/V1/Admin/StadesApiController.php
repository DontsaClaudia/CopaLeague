<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStadeRequest;
use App\Http\Requests\UpdateStadeRequest;
use App\Http\Resources\Admin\StadeResource;
use App\Models\Stade;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StadesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StadeResource(Stade::with(['match_1'])->get());
    }

    public function store(StoreStadeRequest $request)
    {
        $stade = Stade::create($request->all());

        return (new StadeResource($stade))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Stade $stade)
    {
        abort_if(Gate::denies('stade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StadeResource($stade->load(['match_1']));
    }

    public function update(UpdateStadeRequest $request, Stade $stade)
    {
        $stade->update($request->all());

        return (new StadeResource($stade))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Stade $stade)
    {
        abort_if(Gate::denies('stade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stade->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
