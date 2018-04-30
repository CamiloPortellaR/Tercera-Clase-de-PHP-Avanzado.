@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.5 - Ejemplo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articulos.create') }}"> Crear Nuevo articulo</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Titulo</th>
            <th>Contenido</th>
            <th width="280px">Accion</th>
        </tr>
    @foreach ($articulos as $articulo)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $articulo->titulo}}</td>
        <td>{{ $articulo->contenido}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('articulos.show',$articulo->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ route('articulos.edit',$articulo->id) }}">Editar</a>
            {!! Form::open(['method' => 'DELETE','route' => ['articulos.destroy', $articulo->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $articulos->links() !!}
@endsection