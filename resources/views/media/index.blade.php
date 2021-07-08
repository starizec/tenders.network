@extends('adminlte::page')

@section('title', 'Sve datoteke')

@section('content_header')
    <h1>Sve datoteke</h1>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-6">
            @foreach($files as $file)
                {{ $file }}
            @endforeach
        </div>
    </div>
@endsection