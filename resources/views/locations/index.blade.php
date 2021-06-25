@extends('adminlte::page')

@section('title', 'Lokacije')

@section('content_header')
    <h1>Lokacije</h1>
@stop

@section('content')
    @include('inc.card.card_start', ['card_title' => 'Sve lokacije'])

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

    @include('inc.card.card_end')

    {{ $locations->links() }}

@endsection