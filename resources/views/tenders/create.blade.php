@extends('adminlte::page')

@section('title', 'Dodaj natječaj')

@section('content_header')
    <h1>Dodavanje natječaja</h1>
@stop

@section('content')

    @include('inc.select_country')

    <div class="row">
        <div class="col col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dodaj natječaj</h3>
                </div>
                <div class="card-body row">
                    <!-- tender info -->
                    <div class="col-lg-4">
                    <form action="{{ route('store-tender') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">

                        <div class="form-group">
                            <label>Naslov natječaja</label>
                            <input type="text" name="tender_title" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Poveznica na natječaj</label>
                            <input type="text" name="tender_url" id="tender_url" class="form-control" autocomplete="off">
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
                    <!-- /tender info -->

                    <!-- tender type -->
                    <div class="col-lg-4 p4">
                        <div class="form-group">
                            <label>Vrsta natječaja</label>
                            @foreach($types as $type)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tender_type_{{ $type->id }}" name="tender_types[]" value="{{ $type->id }}" checked>
                                    <label class="form-check-label" for="tender_type_{{ $type->id }}">{{ $type->type_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    <!-- /tender type -->

                    <!-- tender category -->
                        <div class="form-group">
                            <label>Kategorija natječaja</label>
                            @foreach($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tender_category_{{ $category->id }}" name="tender_categories[]" value="{{ $category->id }}" checked>
                                    <label class="form-check-label" for="tender_category_{{ $category->id }}">{{ $category->category_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /tender category -->

                    <!-- tender tag -->
                    <div class="col-lg-4 p4">
                        <div class="form-group">
                            <label>Vrsta natječaja</label>
                            @foreach($tags as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tender_tag_{{ $tag->id }}" name="tender_tags[]" value="{{ $tag->id }}" checked>
                                    <label class="form-check-label" for="tender_tag_{{ $tag->id }}">{{ $tag->tag_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /tender tag -->
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

        document.getElementById("tender_url").onkeyup = function(){
        let url_input = document.getElementById("tender_url")
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
    </script>
@endsection