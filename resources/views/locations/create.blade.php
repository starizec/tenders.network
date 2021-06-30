@extends('adminlte::page')

@section('title', 'Dodaj lokaciju')

@section('content_header')
    <h1>Dodavanje nove lokacije</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informacije o lokaciji</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-location') }}" method="POST">
                        @csrf

                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                        
                        <div class="form-group">
                            <label>Naziv lokacije</label>
                            <input type="text" name="location_name" id="location_name" class="form-control" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label>URL lokacije</label>
                            <input type="url" name="location_url" id="location_url" class="form-control" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label>Status lokacije</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="active-location" name="location_status" value="1" checked>
                                <label class="form-check-label" for="active-location">Aktivan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="deactive-location" name="location_status" value="0">
                                <label class="form-check-label" for="deactive-location">Neaktivan</label>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mjesto lokacije</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Odaberi mjesto</label>
                        <select name="place_id" class="custom-select rounded-0 s2-places" id="select_place">
                                <option value="0">-</option>
                            @foreach($places as $place)
                                <option value="{{ $place->id }}">{{ $place->place_name }} - {{ $place->county->county_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dodaj novo mjesto</label>
                        <input type="text" name="new_place" class="form-control" autocomplete="off" id="new_place">
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Županija lokacije</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Odaberi županiju</label>
                        <select name="county_id" class="custom-select rounded-0 s2-places" id="select_county">
                                <option value="0" selected>-</option>
                            @foreach($counties as $county)
                                <option value="{{ $county->id }}">{{ $county->county_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dodaj novu županiju</label>
                        <input type="text" name="new_county" class="form-control" id="new_county" autocomplete="off">
                    </div>

                </div>
            </div>
        </div>
        
        <div class="col col-lg-12">
            <div class="card">
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" id="submit-location" value="Spremi"> 
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

    document.getElementById("location_name").oninput = function(){
        let location_name_input = document.getElementById("location_name")
        let location_name_value = location_name_input.value

        if(Object.keys(location_name_value).length > 0){
            location_name_input.classList.remove("is-invalid")
            location_name_input.classList.add("is-valid")

            document.getElementById("submit-location").disabled = false
        }else{
            location_name_input.classList.remove("is-valid")
            location_name_input.classList.add("is-invalid")

            document.getElementById("submit-location").disabled = true
        }
    }

    document.getElementById("location_url").onkeyup = function(){
        let url_input = document.getElementById("location_url")
        let url_value = url_input.value

        if(url_value.substr(0, 4) === 'http'){
            url_input.classList.remove("is-invalid")
            url_input.classList.add("is-valid")

            document.getElementById("submit-location").disabled = false
        }else{
            url_input.classList.remove("is-valid")
            url_input.classList.add("is-invalid")

            document.getElementById("submit-location").disabled = true
        }
    }

    document.getElementById("select_place").onchange = function(){
        let select_place = document.getElementById("select_place")
        let select_place_value = select_place.selectedIndex

        if(select_place_value != 0){
            document.getElementById("new_place").disabled = true
            document.getElementById("new_county").disabled = true
            document.getElementById("select_county").disabled = true
            document.getElementById("select_county").selectedIndex = 0
        }else{
            document.getElementById("new_place").disabled = false
            document.getElementById("new_county").disabled = false
            document.getElementById("select_county").disabled = false
        }
    }

    document.getElementById("select_county").onchange = function(){
        let select_place = document.getElementById("select_county")
        let select_place_value = select_place.selectedIndex

        if(select_place_value != 0){
            document.getElementById("new_county").disabled = true
        }else{
            document.getElementById("new_county").disabled = false
        }
    }
</script>
@endsection