<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStadeRequest;
use App\Http\Requests\StoreStadeRequest;
use App\Http\Requests\UpdateStadeRequest;
use App\Models\Stade;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StadesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('stade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stades = Stade::with(['media'])->get();

        return view('admin.stades.index', compact('stades'));
    }

    public function create()
    {
        abort_if(Gate::denies('stade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stades.create');
    }

    public function store(StoreStadeRequest $request)
    {
        $stade = Stade::create($request->all());

        if ($request->input('photo', false)) {
            $stade->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $stade->id]);
        }

        return redirect()->route('admin.stades.index');
    }

    public function edit(Stade $stade)
    {
        abort_if(Gate::denies('stade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stades.edit', compact('stade'));
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

        return redirect()->route('admin.stades.index');
    }

    public function show(Stade $stade)
    {
        abort_if(Gate::denies('stade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stades.show', compact('stade'));
    }

    public function destroy(Stade $stade)
    {
        abort_if(Gate::denies('stade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stade->delete();

        return back();
    }

    public function massDestroy(MassDestroyStadeRequest $request)
    {
        $stades = Stade::find(request('ids'));

        foreach ($stades as $stade) {
            $stade->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('stade_create') && Gate::denies('stade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Stade();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
