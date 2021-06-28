@extends('adminlte::page')

@section('title', 'Dodaj mjesto')

@section('content_header')
    <h1>Dodavanje mjesta</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dodaj mjesto</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-place') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">

                        <div class="form-group">
                            <label>Naziv mjesta</label>
                            <input type="text" name="place_name" class="form-control" autocomplete="off">
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