@extends('adminlte::page')

@section('title', 'Dodaj natječaj')

@section('content_header')
    <h1>Dodavanje natječaja</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dodaj natječaj</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-tender') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">

                        <div class="form-group">
                            <label>Naslov natječaja</label>
                            <input type="text" name="tender_title" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Poveznica na natječaj</label>
                            <input type="text" name="tender_url" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Vrijednost natječaja</label>
                            <input type="text" name="tender_value" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Lokacija natječaja</label>
                            <select name="location_id" class="custom-select rounded-0 s2-locations">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->location_name }} - {{ $location->location_url }}</option>
                                @endforeach
                            </select>
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

@section('js')
    <script>
        $(document).ready(function() {
            $('.s2-locations').select2();
        });
    </script>
@endsection