@extends('adminlte::page')

@section('title', 'Oznake natječaja')

@section('content_header')
    <h1>Oznake natječaja</h1>
@stop

@section('content')
    
    @include('inc.select_country')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sve oznake natječaja</h3>
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
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->tag_name }}</td>
                                    <td>{{ date("d.m.Y", strtotime($tag->created_at)) }}</td>
                                    <td><a href="/tags/{{ $tag->id }}/edit"><i class="fas fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
    
    {{ $tags->links() }}

@endsection