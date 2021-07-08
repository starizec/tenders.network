@extends('adminlte::page')

@section('title', 'Dodaj datoteku')

@section('content_header')
    <h1>Dodavanje datoteka</h1>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dodaj datoteku</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-media') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="media_file" id="tender_file">
                                <label class="custom-file-label" for="tender_file">Dodaj datoteku</label>
                            </div>
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