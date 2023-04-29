@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stade.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stades.update", [$stade->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="match_1_id">{{ trans('cruds.stade.fields.match_1') }}</label>
                <select class="form-control select2 {{ $errors->has('match_1') ? 'is-invalid' : '' }}" name="match_1_id" id="match_1_id" required>
                    @foreach($match_1s as $id => $entry)
                        <option value="{{ $id }}" {{ (old('match_1_id') ? old('match_1_id') : $stade->match_1->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('match_1'))
                    <span class="text-danger">{{ $errors->first('match_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stade.fields.match_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.stade.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', $stade->nom) }}" required>
                @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stade.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lieu">{{ trans('cruds.stade.fields.lieu') }}</label>
                <input class="form-control {{ $errors->has('lieu') ? 'is-invalid' : '' }}" type="text" name="lieu" id="lieu" value="{{ old('lieu', $stade->lieu) }}" required>
                @if($errors->has('lieu'))
                    <span class="text-danger">{{ $errors->first('lieu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stade.fields.lieu_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
