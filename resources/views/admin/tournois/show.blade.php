@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tournoi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tournois.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tournoi.fields.id') }}
                        </th>
                        <td>
                            {{ $tournoi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tournoi.fields.nom_tournois') }}
                        </th>
                        <td>
                            {{ $tournoi->nom_tournois }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tournoi.fields.nombre_d_equipes') }}
                        </th>
                        <td>
                            {{ $tournoi->nombre_d_equipes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tournoi.fields.date_de_debut') }}
                        </th>
                        <td>
                            {{ $tournoi->date_de_debut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tournoi.fields.date_de_fin') }}
                        </th>
                        <td>
                            {{ $tournoi->date_de_fin }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tournois.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection