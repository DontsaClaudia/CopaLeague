<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Match;
use App\Http\Resources\Admin\MatchResource;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;

class MatchsApiController extends Controller  {





function index()
{
    abort_if(Gate::denies('match_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return new MatchResource(Match::with(['equipe_1', 'equipe_2', 'stade'])->get());
    
}
function store(StoreMatchRequest $request)
{
    



$match = Match::create($request->all());


return (new MatchResource($match))
->response()
->setStatusCode(Response::HTTP_CREATED);
    
}
function show(Match $match)
{
    abort_if(Gate::denies('match_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return new MatchResource($match->load(['equipe_1', 'equipe_2', 'stade']));
    
}
function update(UpdateMatchRequest $request, Match $match)
{
    



$match->update($request->all());


return (new MatchResource($match))
->response()
->setStatusCode(Response::HTTP_ACCEPTED);
    
}
function destroy(Match $match)
{
    abort_if(Gate::denies('match_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$match->delete();
return response(null, Response::HTTP_NO_CONTENT);
    
}

}