@extends('adminlte::page')

@section('title', 'Vrste natječaja')

@section('content_header')
    <h1>Vrste natječaja</h1>
@stop

@section('content')
    
    @include('inc.select_country')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sve vrste natječaja</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Datum</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->type_name }}</td>
                                    <td>{{ date("d.m.Y", strtotime($type->created_at)) }}</td>
                                    <td><a href="/types/{{ $type->id }}/edit"><i class="fas fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
    
    {{ $types->links() }}

@endsection