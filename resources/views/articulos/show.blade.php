@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Articulo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('articulos.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                {{ $articulo->titulo}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contenido:</strong>
                {{ $articulo->contenido}}
            </div>
        </div>
    </div>
@endsection