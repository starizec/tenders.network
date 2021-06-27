@extends('adminlte::page')

@section('title', 'Lokacije')

@section('content_header')
    <h1>Lokacije</h1>
@stop

@section('content')
    
    @include('inc.select_country')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sve lokacije</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <td>{{ $location->id }}</td>
                                    <td><b>{{ $location->location_name }}</b> <br> 
                                        <small>{{ $location->location_name }}</small></td>
                                    <td><a href="/locations/{{ $location->id }}/edit"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
    
    {{ $locations->links() }}

@endsection