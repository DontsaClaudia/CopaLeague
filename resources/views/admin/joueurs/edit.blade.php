@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.joueur.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.joueurs.update", [$joueur->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="equipe_id">{{ trans('cruds.joueur.fields.equipe') }}</label>
                <select class="form-control select2 {{ $errors->has('equipe') ? 'is-invalid' : '' }}" name="equipe_id" id="equipe_id" required>
                    @foreach($equipes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('equipe_id') ? old('equipe_id') : $joueur->equipe->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('equipe'))
                    <span class="text-danger">{{ $errors->first('equipe') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.equipe_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nom_et_prenom">{{ trans('cruds.joueur.fields.nom_et_prenom') }}</label>
                <input class="form-control {{ $errors->has('nom_et_prenom') ? 'is-invalid' : '' }}" type="text" name="nom_et_prenom" id="nom_et_prenom" value="{{ old('nom_et_prenom', $joueur->nom_et_prenom) }}" required>
                @if($errors->has('nom_et_prenom'))
                    <span class="text-danger">{{ $errors->first('nom_et_prenom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.nom_et_prenom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_de_naissance">{{ trans('cruds.joueur.fields.date_de_naissance') }}</label>
                <input class="form-control date {{ $errors->has('date_de_naissance') ? 'is-invalid' : '' }}" type="text" name="date_de_naissance" id="date_de_naissance" value="{{ old('date_de_naissance', $joueur->date_de_naissance) }}" required>
                @if($errors->has('date_de_naissance'))
                    <span class="text-danger">{{ $errors->first('date_de_naissance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.date_de_naissance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.joueur.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', $joueur->age) }}" step="1" required>
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dossard">{{ trans('cruds.joueur.fields.dossard') }}</label>
                <input class="form-control {{ $errors->has('dossard') ? 'is-invalid' : '' }}" type="number" name="dossard" id="dossard" value="{{ old('dossard', $joueur->dossard) }}" step="1" required>
                @if($errors->has('dossard'))
                    <span class="text-danger">{{ $errors->first('dossard') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.dossard_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="poste">{{ trans('cruds.joueur.fields.poste') }}</label>
                <input class="form-control {{ $errors->has('poste') ? 'is-invalid' : '' }}" type="text" name="poste" id="poste" value="{{ old('poste', $joueur->poste) }}" required>
                @if($errors->has('poste'))
                    <span class="text-danger">{{ $errors->first('poste') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.poste_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.joueur.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $joueur->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.email_helper') }}</span>
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