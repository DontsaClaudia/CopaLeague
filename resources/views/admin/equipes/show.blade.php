@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.equipe.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.equipes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.equipe.fields.id') }}
                        </th>
                        <td>
                            {{ $equipe->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipe.fields.nom') }}
                        </th>
                        <td>
                            {{ $equipe->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipe.fields.nom_coach') }}
                        </th>
                        <td>
                            {{ $equipe->nom_coach }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipe.fields.photo') }}
                        </th>
                        <td>
                            @if($equipe->photo)
                                <a href="{{ $equipe->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $equipe->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.equipes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection