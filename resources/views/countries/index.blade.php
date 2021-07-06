@extends('adminlte::page')

@section('title', 'Države')

@section('content_header')
    <h1>Države</h1>
@stop

@section('content')
<div class="row">
    <div class="col col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sve države</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Jezik</th>
                        <th>valuta</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($countries as $country)
                            <tr>
                                <td>{{ $country->id }}</td>
                                <td><b>{{ $country->country_name }}</b></td>
                                <td><b>{{ $country->country_language }}</b></td>
                                <td><b>{{ $country->currency_name }}</b></td>
                                <td><a href="/countries/{{ $country->id }}/edit"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection