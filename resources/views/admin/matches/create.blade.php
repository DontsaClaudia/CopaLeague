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
                <label class="required" for="resultat_1">{{ trans('cruds.match.fields.resultat_1') }}</label>
                <input class="form-control {{ $errors->has('resultat_1') ? 'is-invalid' : '' }}" type="number" name="resultat_1" id="resultat_1" value="{{ old('resultat_1', '0') }}" step="1" required>
                @if($errors->has('resultat_1'))
                    <span class="text-danger">{{ $errors->first('resultat_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.resultat_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="resultat_2">{{ trans('cruds.match.fields.resultat_2') }}</label>
                <input class="form-control {{ $errors->has('resultat_2') ? 'is-invalid' : '' }}" type="number" name="resultat_2" id="resultat_2" value="{{ old('resultat_2', '0') }}" step="1" required>
                @if($errors->has('resultat_2'))
                    <span class="text-danger">{{ $errors->first('resultat_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.resultat_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_de_matchs">{{ trans('cruds.match.fields.date_de_matchs') }}</label>
                <input class="form-control datetime {{ $errors->has('date_de_matchs') ? 'is-invalid' : '' }}" type="text" name="date_de_matchs" id="date_de_matchs" value="{{ old('date_de_matchs') }}" required>
                @if($errors->has('date_de_matchs'))
                    <span class="text-danger">{{ $errors->first('date_de_matchs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.date_de_matchs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carton_rouge">{{ trans('cruds.match.fields.carton_rouge') }}</label>
                <input class="form-control {{ $errors->has('carton_rouge') ? 'is-invalid' : '' }}" type="number" name="carton_rouge" id="carton_rouge" value="{{ old('carton_rouge', '') }}" step="1">
                @if($errors->has('carton_rouge'))
                    <span class="text-danger">{{ $errors->first('carton_rouge') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.carton_rouge_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carton_jaune">{{ trans('cruds.match.fields.carton_jaune') }}</label>
                <input class="form-control {{ $errors->has('carton_jaune') ? 'is-invalid' : '' }}" type="number" name="carton_jaune" id="carton_jaune" value="{{ old('carton_jaune', '') }}" step="1">
                @if($errors->has('carton_jaune'))
                    <span class="text-danger">{{ $errors->first('carton_jaune') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.carton_jaune_helper') }}</span>
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