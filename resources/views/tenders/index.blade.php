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
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tenders as $tender)
                                <tr>
                                    <td>
                                        {{ $tender->tender_title }}
                                    </td>
                                    <td>
                                        {{ number_format((float)$tender->tender_value, 2, ',', '') }} {{ $tender->country->currency_symbol }}
                                    </td>
                                    <td>
                                        @foreach($tender->types as $type)
                                            <span class="badge badge-success">{{ $type->type_name }}</span> 
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($tender->categories as $category)
                                            <span class="badge badge-warning">{{ $category->category_name }}</span> 
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($tender->tags as $tag)
                                            <span class="badge badge-info">{{ $tag->tag_name }}</span> 
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ date("d.m.Y", strtotime($tender->created_at)) }}
                                    </td>
                                    <td>
                                        <a href="/tenders/{{ $tender->id }}/edit"><i class="fa fa-edit"></i></a>
                                    </td>
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