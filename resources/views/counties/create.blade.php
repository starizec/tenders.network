@extends('adminlte::page')

@section('title', 'Dodaj mjesto')

@section('content_header')
    <h1>Dodavanje županije</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dodaj županiju</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-county') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">

                        <div class="form-group">
                            <label>Naziv županije</label>
                            <input type="text" name="county_name" class="form-control" autocomplete="off">
                        </div>

                       
                </div>
                <div class="card-footer d-flex">
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection