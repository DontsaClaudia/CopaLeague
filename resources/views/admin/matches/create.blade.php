@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.match.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.matches.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="equipe_1_id">{{ trans('cruds.match.fields.equipe_1') }}</label>
                <select class="form-control select2 {{ $errors->has('equipe_1') ? 'is-invalid' : '' }}" name="equipe_1_id" id="equipe_1_id" required>
                    @foreach($equipe_1s as $id => $entry)
                        <option value="{{ $id }}" {{ old('equipe_1_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('equipe_1'))
                    <span class="text-danger">{{ $errors->first('equipe_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.equipe_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="equipe_2_id">{{ trans('cruds.match.fields.equipe_2') }}</label>
                <select class="form-control select2 {{ $errors->has('equipe_2') ? 'is-invalid' : '' }}" name="equipe_2_id" id="equipe_2_id" required>
                    @foreach($equipe_2s as $id => $entry)
                        <option value="{{ $id }}" {{ old('equipe_2_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('equipe_2'))
                    <span class="text-danger">{{ $errors->first('equipe_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.equipe_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resultat_1">{{ trans('cruds.match.fields.resultat_1') }}</label>
                <input class="form-control {{ $errors->has('resultat_1') ? 'is-invalid' : '' }}" type="number" name="resultat_1" id="resultat_1" value="{{ old('resultat_1', '') }}" step="1">
                @if($errors->has('resultat_1'))
                    <span class="text-danger">{{ $errors->first('resultat_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.resultat_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resultat_2">{{ trans('cruds.match.fields.resultat_2') }}</label>
                <input class="form-control {{ $errors->has('resultat_2') ? 'is-invalid' : '' }}" type="number" name="resultat_2" id="resultat_2" value="{{ old('resultat_2', '') }}" step="1">
                @if($errors->has('resultat_2'))
                    <span class="text-danger">{{ $errors->first('resultat_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.resultat_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_et_heure">{{ trans('cruds.match.fields.date_et_heure') }}</label>
                <input class="form-control datetime {{ $errors->has('date_et_heure') ? 'is-invalid' : '' }}" type="text" name="date_et_heure" id="date_et_heure" value="{{ old('date_et_heure') }}">
                @if($errors->has('date_et_heure'))
                    <span class="text-danger">{{ $errors->first('date_et_heure') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.date_et_heure_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stade_id">{{ trans('cruds.match.fields.stade') }}</label>
                <select class="form-control select2 {{ $errors->has('stade') ? 'is-invalid' : '' }}" name="stade_id" id="stade_id" required>
                    @foreach($stades as $id => $entry)
                        <option value="{{ $id }}" {{ old('stade_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('stade'))
                    <span class="text-danger">{{ $errors->first('stade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.stade_helper') }}</span>
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