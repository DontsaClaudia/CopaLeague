<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreStadeRequest;
use App\Http\Requests\UpdateStadeRequest;
use App\Http\Resources\Admin\StadeResource;
use App\Models\Stade;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StadesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('stade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StadeResource(Stade::all());
    }

    public function store(StoreStadeRequest $request)
    {
        $stade = Stade::create($request->all());

        if ($request->input('photo', false)) {
            $stade->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new StadeResource($stade))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Stade $stade)
    {
        abort_if(Gate::denies('stade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StadeResource($stade);
    }

    public function update(UpdateStadeRequest $request, Stade $stade)
    {
        $stade->update($request->all());

        if ($request->input('photo', false)) {
            if (! $stade->photo || $request->input('photo') !== $stade->photo->file_name) {
                if ($stade->photo) {
                    $stade->photo->delete();
                }
                $stade->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($stade->photo) {
            $stade->photo->delete();
        }

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
