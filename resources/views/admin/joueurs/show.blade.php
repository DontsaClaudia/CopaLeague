@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.joueur.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.joueurs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.joueur.fields.id') }}
                            </th>
                            <td>
                                {{ $joueur->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.joueur.fields.equipe') }}
                            </th>
                            <td>
                                {{ $joueur->equipe->nom ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.joueur.fields.nom_et_prenom') }}
                            </th>
                            <td>
                                {{ $joueur->nom_et_prenom }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.joueur.fields.date_de_naissance') }}
                            </th>
                            <td>
                                {{ $joueur->date_de_naissance }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.joueur.fields.age') }}
                            </th>
                            <td>
                                {{ $joueur->age }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.joueur.fields.dossard') }}
                            </th>
                            <td>
                                {{ $joueur->dossard }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.joueur.fields.poste') }}
                            </th>
                            <td>
                                {{ $joueur->poste }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.joueurs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
