@extends('adminlte::page')

@section('title', 'Izmjeni oznaku natječaja')

@section('content_header')
    <h1>{{ $tag->tag_name }}</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izmjeni oznaku natječaja</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-tag') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                        <input type="hidden" name="tag_id" value="{{ $tag->id }}">

                        <div class="form-group">
                            <label>Naziv oznake natječaja</label>
                            <input type="text" name="tag_name" class="form-control" value="{{ $tag->tag_name }}" autocomplete="off">
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