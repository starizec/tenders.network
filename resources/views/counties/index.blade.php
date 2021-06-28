@extends('adminlte::page')

@section('title', 'Županije')

@section('content_header')
    <h1>Župnaije</h1>
@stop

@section('content')
    
    @include('inc.select_country')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sve županije</h3>
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
                            @foreach($counties as $county)
                                <tr>
                                    <td>{{ $county->id }}</td>
                                    <td><b>{{ $county->county_name }}</b></td>
                                    <td><a href="/counties/{{ $county->id }}/edit"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
    
    {{ $counties->links() }}

@endsection