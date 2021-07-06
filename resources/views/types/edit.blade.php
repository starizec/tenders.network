@extends('adminlte::page')

@section('title', 'Izmjeni vrstu natječaja')

@section('content_header')
    <h1>{{ $type->type_name }}</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izmjeni vrstu natječaja</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-type') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                        <input type="hidden" name="type_id" value="{{ $type->id }}">

                        <div class="form-group">
                            <label>Naziv vrste natječaja</label>
                            <input type="text" name="type_name" class="form-control" value="{{ $type->type_name }}" autocomplete="off">
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