@extends('adminlte::page')

@section('title', 'Natječaji')

@section('content_header')
    <h1>Natječaji</h1>
@stop

@section('content')
    
    @include('inc.select_country')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Svi natječaji</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Naslov</th>
                            <th>Vrijednost</th>
                            <th>Vrsta</th>
                            <th>Kategorije</th>
                            <th>Oznake</th>
                            <th>Datum</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tenders as $tender)
                                <tr>
                                    <td>{{ $tender->tender_title }}</td>
                                    <td>{{ $tender->tender_value }}</td>
                                    <td></td>
                                    <td></td>
                                    <td><td>{{ $tender->created_at }}</td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
    
    {{ $tenders->links() }}

@endsection