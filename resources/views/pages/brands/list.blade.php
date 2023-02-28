@extends('adminlte::page')

@section('title', 'Marcas - Listado')

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-cubes"></i> Marcas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display" id="table">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Productos Registrados</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marcas as $marca)
                            <tr>
                                <td>{{ $marca->clave }}</td>
                                <td>{{ $marca->nombre }}</td>
                                <td><span class="badge bg-success">{{ $marca->productos->count() }}</span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('marca.edit', $marca->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-sm btn-danger btn-remove"
                                            data-id="{{ $marca->id }}" data-name="{{ $marca->nombre }}"
                                            data-prod="{{ $marca->productos->count() }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        jQuery(function() {
            jQuery('body').on('click', '.btn-remove', function() {
                let data = jQuery(this).data();
                if (data.prod > 0) {
                    bootbox.dialog({
                        message: `<h5>La marca <strong class="text-danger">${data.name}</strong> tiene productos registrados, si se elimina tambien lo haran sus productos. ¿Desea continuar ?</h5>`,
                        buttons: [{
                                label: 'Si',
                                className: 'btn-danger',
                                callback: function() {
                                    bootbox.dialog({
                                        message: `<h5>¿Está seguro que desea eliminar la marca <strong class="text-danger">${data.name}</strong>?</h5>`,
                                        buttons: [{
                                                label: 'Si',
                                                className: 'btn-danger',
                                                callback: function() {
                                                    window.location.href =
                                                        '/marcas/eliminar/' +
                                                        data.id;
                                                }
                                            },
                                            {
                                                label: 'No',
                                                className: 'btn-dark'
                                            }
                                        ]
                                    });
                                }
                            },
                            {
                                label: 'No',
                                className: 'btn-dark'
                            }
                        ]
                    });

                }else{
                    bootbox.dialog({
                    message: `<h5>¿Está seguro que desea eliminar la marca <strong class="text-danger">${data.name}</strong>?</h5>`,
                    buttons: [{
                            label: 'Si',
                            className: 'btn-danger',
                            callback: function() {
                                window.location.href = '/marcas/eliminar/' + data.id;
                            }
                        },
                        {
                            label: 'No',
                            className: 'btn-dark'
                        }
                    ]
                });
                }


            });
        });
    </script>
@stop
