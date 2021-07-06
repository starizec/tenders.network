@extends('adminlte::page')

@section('title', 'Partneri')

@section('content_header')
    <h1>Parnteri</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Svi partneri</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Vlasnik</th>
                            <th>Email</th>
                            <th>Država</th>
                            <th>Datum</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $partner)
                                <tr>
                                    <td>{{ $partner->id }}</td>
                                    <td>{{ $partner->partner_name }}</td>
                                    <td>{{ $partner->partner_owner }}</td>
                                    <td>{{ $partner->partner_email }}</td>
                                    <td>{{ $partner->country->country_name }}</td>
                                    <td>{{ date("d.m.Y", strtotime($partner->created_at)) }}</td>
                                    <td><a href="/partners/{{ $partner->id }}/edit"><i class="fas fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
    
    {{ $partners->links() }}

@endsection