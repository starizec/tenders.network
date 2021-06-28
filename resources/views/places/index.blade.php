@extends('adminlte::page')

@section('title', 'Mjesta')

@section('content_header')
    <h1>Mjesta</h1>
@stop

@section('content')
    
    @include('inc.select_country')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sva mjesta</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Županija</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($places as $place)
                                <tr>
                                    <td>{{ $place->id }}</td>
                                    <td><b>{{ $place->place_name }}</b></td>
                                    <td></td>
                                    <td><a href="/places/{{ $place->id }}/edit"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
    
    {{ $places->links() }}

@endsection