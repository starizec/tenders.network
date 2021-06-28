@extends('adminlte::page')

@section('title', 'Dodaj županiju')

@section('content_header')
    <h1>Izmjena podataka županije</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $county->county_name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-county') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                        <input type="hidden" name="county_id" value="{{ $county->id }}">

                        <div class="form-group">
                            <label>Naziv župninje</label>
                            <input value="{{ $county->county_name }}" type="text" name="county_name" class="form-control" autocomplete="off">
                        </div>

                </div>
                <div class="card-footer d-flex">
                        <button type="submit" class="btn btn-primary">Izmjeni</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection