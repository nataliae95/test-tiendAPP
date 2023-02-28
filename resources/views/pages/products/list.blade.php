@extends('adminlte::page')

@section('title', 'Productos - Listado')

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-cubes"></i> Productos
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display" id="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Talla</th>
                            <th>Marca</th>
                            <th>Fecha de embarque</th>
                            <th>Observaciones</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Productos as $producto)
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->talla->nombre }}</td>
                                <td>{{ $producto->marca->nombre }}</td>
                                <td>{{ $producto->fecha_embarque }}</td>
                                <td>
                                    @if ($producto->observacion != '')
                                        <a href="javascript:;" class="btn-see-observation btn btn-sm btn-info" data-text="{{ $producto->observacion }}" data-name="{{ $producto->nombre }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('producto.edit', $producto->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-sm btn-danger btn-remove"
                                            data-name="{{ $producto->nombre }}" data-id="{{ $producto->id }}">
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

                bootbox.dialog({
                    message: `<h5>¿Está seguro que desea eliminar el producto <strong class="text-danger">${data.name}</strong>?</h5>`,
                    buttons: [{
                            label: 'Si',
                            className: 'btn-danger',
                            callback: function() {
                                window.location.href = '/productos/eliminar/' + data.id;
                            }
                        },
                        {
                            label: 'No',
                            className: 'btn-dark'
                        }
                    ]
                });
            });

                jQuery('body').on('click', '.btn-see-observation', function() {
                    let data = jQuery(this).data();
                    bootbox.dialog({
                        message: `
            <h5>Observaciones ${data.name}</h5>
            <hr />
            <div class="col-lg-12">
                <p>${data.text}</p>
            </div>
            `,
                        buttons: [{
                            label: 'Cerrar'
                        }]
                    });
                });
            });
    </script>
@stop
