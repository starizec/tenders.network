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
                    <form action="{{ route('update-place') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                        <input type="hidden" name="place_id" value="{{ $place->id }}">

                        <div class="form-group">
                            <label>Naziv mjesta</label>
                            <input value="{{ $place->place_name }}" type="text" name="place_name" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Županija</label>
                            <select name="county_id" class="custom-select rounded-0">
                                @foreach($counties as $county)
                                    <option value="{{ $county->id }}"
                                        @if($county->id == $place->county_id)
                                            selected
                                        @endif
                                        >{{ $county->county_name }}</option>
                                @endforeach
                            </select>
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