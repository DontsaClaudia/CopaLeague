<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEquipeRequest;
use App\Http\Requests\StoreEquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Models\Equipe;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Media;
use Symfony\Component\HttpFoundation\Response;

class EquipesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('equipe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipes = Equipe::with(['media'])->get();

        return view('admin.equipes.index', compact('equipes'));
    }

    public function create()
    {
        abort_if(Gate::denies('equipe_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.equipes.create');
    }

    public function store(StoreEquipeRequest $request)
    {
        $equipe = Equipe::create($request->all());

        if ($request->input('photo', false)) {
            $equipe->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $equipe->id]);
        }

        return redirect()->route('admin.equipes.index');
    }

    public function edit(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.equipes.edit', compact('equipe'));
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

        return redirect()->route('admin.equipes.index');
    }

    public function show(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.equipes.show', compact('equipe'));
    }

    public function destroy(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipe->delete();

        return back();
    }

    public function massDestroy(MassDestroyEquipeRequest $request)
    {
        $equipes = Equipe::find(request('ids'));

        foreach ($equipes as $equipe) {
            $equipe->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('equipe_create') && Gate::denies('equipe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Equipe();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
