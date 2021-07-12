@extends('adminlte::page')

@section('title', 'Lokacije')

@section('content_header')
    <h1>Lokacije</h1>
@stop

@section('content')
    
    @include('inc.select_country')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dodaj nove natječaje</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('upload-tenders') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                    
                        <div class="form-group">
                            <label>Datum objave</label>
                            <input name="date" type="text" class="form-control" placeholder="GGGG-MM-DD HH:MM:SS" value="{{ date('Y-m-d H:i:s') }}">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input name="tenders_csv" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Dodaj natječaje .CSV</label>
                            </div>
                        </div>
    
                        <input type="submit" class="btn btn-primary" value="Spremi">
                    </form>
                </div>
              </div>
        </div>
    </div>
@endsection