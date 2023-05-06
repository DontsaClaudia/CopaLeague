<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Http\Resources\Admin\EquipeResource;
use App\Models\Equipe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('equipe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipeResource(Equipe::all());
    }

    public function store(StoreEquipeRequest $request)
    {
        $equipe = Equipe::create($request->all());

        if ($request->input('photo', false)) {
            $equipe->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new EquipeResource($equipe))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipeResource($equipe);
    }

    public function update(UpdateEquipeRequest $request, Equipe $equipe)
    {
        $equipe->update($request->all());

        if ($request->input('photo', false)) {
            if (! $equipe->photo || $request->input('photo') !== $equipe->photo->file_name) {
                if ($equipe->photo) {
                    $equipe->photo->delete();
                }
                $equipe->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($equipe->photo) {
            $equipe->photo->delete();
        }

        return (new EquipeResource($equipe))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipe->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
