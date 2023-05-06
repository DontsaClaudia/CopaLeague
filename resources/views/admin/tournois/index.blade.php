@extends('layouts.admin')
@section('content')
@can('tournoi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tournois.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tournoi.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tournoi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tournoi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tournoi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tournoi.fields.nom_tournois') }}
                        </th>
                        <th>
                            {{ trans('cruds.tournoi.fields.nombre_d_equipes') }}
                        </th>
                        <th>
                            {{ trans('cruds.tournoi.fields.date_de_debut') }}
                        </th>
                        <th>
                            {{ trans('cruds.tournoi.fields.date_de_fin') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tournois as $key => $tournoi)
                        <tr data-entry-id="{{ $tournoi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tournoi->id ?? '' }}
                            </td>
                            <td>
                                {{ $tournoi->nom_tournois ?? '' }}
                            </td>
                            <td>
                                {{ $tournoi->nombre_d_equipes ?? '' }}
                            </td>
                            <td>
                                {{ $tournoi->date_de_debut ?? '' }}
                            </td>
                            <td>
                                {{ $tournoi->date_de_fin ?? '' }}
                            </td>
                            <td>
                                @can('tournoi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tournois.show', $tournoi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tournoi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tournois.edit', $tournoi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tournoi_delete')
                                    <form action="{{ route('admin.tournois.destroy', $tournoi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tournoi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tournois.massDestroy') }}",
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
  let table = $('.datatable-Tournoi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection