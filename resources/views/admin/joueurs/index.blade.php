@extends('layouts.admin')
@section('content')
@can('joueur_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.joueurs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.joueur.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.joueur.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Joueur">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.joueur.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.joueur.fields.equipe') }}
                        </th>
                        <th>
                            {{ trans('cruds.equipe.fields.nom_coach') }}
                        </th>
                        <th>
                            {{ trans('cruds.joueur.fields.nom_et_prenom') }}
                        </th>
                        <th>
                            {{ trans('cruds.joueur.fields.date_de_naissance') }}
                        </th>
                        <th>
                            {{ trans('cruds.joueur.fields.age') }}
                        </th>
                        <th>
                            {{ trans('cruds.joueur.fields.dossard') }}
                        </th>
                        <th>
                            {{ trans('cruds.joueur.fields.poste') }}
                        </th>
                        <th>
                            {{ trans('cruds.joueur.fields.email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($joueurs as $key => $joueur)
                        <tr data-entry-id="{{ $joueur->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $joueur->id ?? '' }}
                            </td>
                            <td>
                                {{ $joueur->equipe->nom ?? '' }}
                            </td>
                            <td>
                                {{ $joueur->equipe->nom_coach ?? '' }}
                            </td>
                            <td>
                                {{ $joueur->nom_et_prenom ?? '' }}
                            </td>
                            <td>
                                {{ $joueur->date_de_naissance ?? '' }}
                            </td>
                            <td>
                                {{ $joueur->age ?? '' }}
                            </td>
                            <td>
                                {{ $joueur->dossard ?? '' }}
                            </td>
                            <td>
                                {{ $joueur->poste ?? '' }}
                            </td>
                            <td>
                                {{ $joueur->email ?? '' }}
                            </td>
                            <td>
                                @can('joueur_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.joueurs.show', $joueur->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('joueur_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.joueurs.edit', $joueur->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('joueur_delete')
                                    <form action="{{ route('admin.joueurs.destroy', $joueur->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('joueur_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.joueurs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Joueur:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection