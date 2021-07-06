@extends('adminlte::page')

@section('title', 'Izmjeni kategoriju natječaja')

@section('content_header')
    <h1>{{ $category->category_name }}</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izmjeni kategoriju natječaja</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-category') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                        <input type="hidden" name="category_id" value="{{ $category->id }}">

                        <div class="form-group">
                            <label>Naziv kategorije natječaja</label>
                            <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" autocomplete="off">
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