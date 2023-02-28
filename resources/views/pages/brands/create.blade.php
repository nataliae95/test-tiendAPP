@extends('adminlte::page')

@section('title', 'Marcas - Registro')

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus-circle"></i> Nueva Marca
        </div>
        <div class="card-body">
            <form action="{{ route('marca.save') }}" method="post" enctype="multipart/form-data" charset=utf-8>
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        name="nombre" id="nombre" value="{{ old('nombre') }}" />
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Alias</label>
                                    <input type="text" class="form-control @error('clave') is-invalid @enderror"
                                        value="{{ old('clave') }}" name="clave" id="clave" placeholder="" />
                                    @error('clave')
                                        <span class="invalid-feedback" role="alert">
                                            <strong strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                Guardar
                            </button>
                            <a href="{{ route('marca.index') }}" type="button" class="btn btn-dark">
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
