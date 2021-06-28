@extends('adminlte::page')

@section('title', 'Izmjena lokacije')

@section('content_header')
    <h1>{{ $location->location_name }}</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izmjena podataka lokacije</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-location') }}" method="POST">
                        @csrf

                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                        
                        <div class="form-group">
                            <label>Naziv lokacije</label>
                            <input type="text" name="location_name" value="{{ $location->location_name }}" class="form-control" placeholder="Naziv lokacije" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>URL lokacije</label>
                            <input type="text" name="location_url" value="{{ $location->location_url }}" class="form-control" placeholder="URL lokacije" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Mjesto</label>
                            <select name="place_id" class="custom-select rounded-0 s2-places">
                                @foreach($places as $place)
                                    <option value="{{ $place->id }}"
                                        @if($place->id == $location->place_id)
                                            selected
                                        @endif
                                        >{{ $place->place_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status lokacije</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="location_status" 
                                {{ $location->location_status === 1 ? 'checked' : '' }}>
                                <label class="form-check-label">Aktivan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="location_status"
                                {{ $location->location_status === 0 ? 'checked' : '' }}>
                                <label class="form-check-label">Neaktivan</label>
                            </div>
                        </div>
                </div>
                <div class="card-footer d-flex">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Izmjeni</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">Trajno obriši</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.s2-places').select2();
    });
</script>
@endsection