@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tournoi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tournois.update", [$tournoi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nom_tournois">{{ trans('cruds.tournoi.fields.nom_tournois') }}</label>
                <input class="form-control {{ $errors->has('nom_tournois') ? 'is-invalid' : '' }}" type="text" name="nom_tournois" id="nom_tournois" value="{{ old('nom_tournois', $tournoi->nom_tournois) }}" required>
                @if($errors->has('nom_tournois'))
                    <span class="text-danger">{{ $errors->first('nom_tournois') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tournoi.fields.nom_tournois_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_d_equipes">{{ trans('cruds.tournoi.fields.nombre_d_equipes') }}</label>
                <input class="form-control {{ $errors->has('nombre_d_equipes') ? 'is-invalid' : '' }}" type="number" name="nombre_d_equipes" id="nombre_d_equipes" value="{{ old('nombre_d_equipes', $tournoi->nombre_d_equipes) }}" step="1" required>
                @if($errors->has('nombre_d_equipes'))
                    <span class="text-danger">{{ $errors->first('nombre_d_equipes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tournoi.fields.nombre_d_equipes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_de_debut">{{ trans('cruds.tournoi.fields.date_de_debut') }}</label>
                <input class="form-control date {{ $errors->has('date_de_debut') ? 'is-invalid' : '' }}" type="text" name="date_de_debut" id="date_de_debut" value="{{ old('date_de_debut', $tournoi->date_de_debut) }}" required>
                @if($errors->has('date_de_debut'))
                    <span class="text-danger">{{ $errors->first('date_de_debut') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tournoi.fields.date_de_debut_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_de_fin">{{ trans('cruds.tournoi.fields.date_de_fin') }}</label>
                <input class="form-control date {{ $errors->has('date_de_fin') ? 'is-invalid' : '' }}" type="text" name="date_de_fin" id="date_de_fin" value="{{ old('date_de_fin', $tournoi->date_de_fin) }}" required>
                @if($errors->has('date_de_fin'))
                    <span class="text-danger">{{ $errors->first('date_de_fin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tournoi.fields.date_de_fin_helper') }}</span>
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