@extends('adminlte::page')

@section('title', 'Producto - Registro')

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus-circle"></i> Nuevo Producto
        </div>
        <div class="card-body">
            <form action="{{ route('producto.update', $producto->id) }}" method="post" enctype="multipart/form-data"
                charset=utf-8>
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" />
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        Marca
                                    </label>
                                    <select class="form-control select-chosen @error('marca_id') is-invalid @enderror"
                                        name="marca_id" id="marca_id">
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca->id }}"
                                                {{ old('marca_id', $producto->id_marca) ? 'selected' : '' }}>
                                                {{ $marca->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('marca_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        Talla
                                    </label>
                                    <select class="form-control select-chosen @error('talla_id') is-invalid @enderror"
                                        name="talla_id" id="talla_id">
                                        @foreach ($tallas as $talla)
                                            <option value="{{ $talla->id }}"
                                                {{ old('talla_id', $producto->id_talla) ? 'selected' : '' }}>
                                                {{ $talla->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('talla_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Cantidad</label>
                                    <input type="text" class="form-control @error('cantidad') is-invalid @enderror"
                                        name="cantidad" id="cantidad"
                                        value="{{ old('cantidad', $producto->cantidad) }}" />
                                    @error('cantidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Fecha de Embarque</label>
                                    <input type="date" class="form-control @error('fecha_embarque') is-invalid @enderror"
                                        name="fecha_embarque" id="fecha_embarque"
                                        value="{{ old('fecha_embarque', $producto->fecha_embarque) }}" />
                                    @error('fecha_embarque')
                                        <span class="invalid-feedback" role="alert">
                                            <strong strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Observaciones</label>
                                    <textarea class="form-control" name="observacion" id="observacion" rows="3">{{ old('observacion') }}</textarea>
                                </div>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>
                            <a href="{{ route('producto.index') }}" type="button" class="btn btn-dark">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')

@stop
