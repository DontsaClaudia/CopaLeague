<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Stade;
use App\Models\Matchs;
use App\Http\Requests\StoreStadeRequest;
use App\Http\Requests\UpdateStadeRequest;
use App\Http\Requests\MassDestroyStadeRequest;

class StadesController extends Controller  {





function index()
{
    abort_if(Gate::denies('stade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$stades = Stade::with(['match_1'])->get();



    return view('admin.stades.index', compact('stades'));
}
function create()
{
    abort_if(Gate::denies('stade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$match_1s = Matchs::pluck('date_de_matchs', 'id')->prepend(trans('global.pleaseSelect'), '');



    return view('admin.stades.create', compact('match_1s'));
}
function store(StoreStadeRequest $request)
{




$stade = Stade::create($request->all());


return redirect()->route('admin.stades.index');

}
function edit(Stade $stade)
{
    abort_if(Gate::denies('stade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$match_1s = Matchs::pluck('date_de_matchs', 'id')->prepend(trans('global.pleaseSelect'), '');


$stade->load('match_1');

    return view('admin.stades.edit', compact('match_1s', 'stade'));
}
function update(UpdateStadeRequest $request, Stade $stade)
{




$stade->update($request->all());


return redirect()->route('admin.stades.index');

}
function show(Stade $stade)
{
    abort_if(Gate::denies('stade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$stade->load('match_1');

    return view('admin.stades.show', compact('stade'));
}
function destroy(Stade $stade)
{
    abort_if(Gate::denies('stade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$stade->delete();
return back();

}
function massDestroy(MassDestroyStadeRequest $request)
{




$stades = Stade::find(request('ids'));

foreach ($stades as $stade) {
$stade->delete();
}

return response(null, Response::HTTP_NO_CONTENT);

}

}
