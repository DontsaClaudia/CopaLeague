@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stade.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stades.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stade.fields.id') }}
                        </th>
                        <td>
                            {{ $stade->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stade.fields.nom') }}
                        </th>
                        <td>
                            {{ $stade->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stade.fields.lieu') }}
                        </th>
                        <td>
                            {{ $stade->lieu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stade.fields.photo') }}
                        </th>
                        <td>
                            @if($stade->photo)
                                <a href="{{ $stade->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $stade->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stades.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection