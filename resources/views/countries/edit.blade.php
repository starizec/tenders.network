@extends('adminlte::page')

@section('title', 'Izmjena države')

@section('content_header')
    <h1>{{ $country->country_name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izmjena podataka države</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-country') }}" method="POST">
                        @csrf
                        <input type="hidden" name="country_id" value="{{ $country->id }}">

                        <div class="form-group">
                            <label>Naziv države</label>
                            <input type="text" name="country_name" class="form-control" value="{{ $country->country_name }}" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Jezik države</label>
                            <input type="text" name="country_language" class="form-control" maxlength="2" value="{{ $country->country_language }}" autocomplete="off">
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