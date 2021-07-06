@extends('adminlte::page')

@section('title', 'Dodaj državu')

@section('content_header')
    <h1>Dodavanje države</h1>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dodaj državu</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-country') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label>Naziv države</label>
                            <input type="text" name="country_name" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Jezik države</label>
                            <input type="text" name="country_language" class="form-control" maxlength="2" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Naziv valute</label>
                            <input type="text" name="currency_name" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>ISO 4217 valute</label>
                            <input type="text" name="currency_iso" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Oznaka valute</label>
                            <input type="text" name="currency_symbol" class="form-control" autocomplete="off">
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