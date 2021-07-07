@extends('adminlte::page')

@section('title', 'Izmjeni natječaj')

@section('content_header')
    <h1>{{ $tender->tender_title }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izmjeni natječaj</h3>
                </div>
                <div class="card-body row">
                    <!-- tender info -->
                    <div class="col-lg-4">
                    <form action="{{ route('update-tender') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="country_id" value="{{ Session::get('country_id') }}">
                        <input type="hidden" name="tender_id" value="{{ $tender->id }}">

                        <div class="form-group">
                            <label>Naslov natječaja</label>
                            <input value="{{ $tender->tender_title }}" type="text" name="tender_title" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Poveznica na natječaj</label>
                            <input value="{{ $tender->tender_url }}" type="text" name="tender_url" id="tender_url" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Vrijednost natječaja</label>
                            <input value="{{ $tender->tender_value }}" type="text" name="tender_value" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Lokacija natječaja</label>
                            <select name="location_id" class="custom-select rounded-0 s2-locations">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}"
                                        @if($tender->location_id == $location->id)
                                            selected
                                        @endif
                                        >{{ $location->location_name }} - {{ $location->location_url }}</option>
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
                                    <input class="form-check-input" type="checkbox" id="tender_type_{{ $type->id }}" name="tender_types[]" value="{{ $type->id }}"
                                        @foreach($tender->types as $tender_type)
                                            {{ $tender_type->id ===  $type->id ? 'checked' : ''}}
                                        @endforeach
                                    >
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
                                    <input class="form-check-input" type="checkbox" id="tender_category_{{ $category->id }}" name="tender_categories[]" value="{{ $category->id }}" 
                                        @foreach($tender->categories as $tender_category)
                                            {{ $tender_category->id ===  $category->id ? 'checked' : ''}}
                                        @endforeach
                                    >
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
                                    <input class="form-check-input" type="checkbox" id="tender_tag_{{ $tag->id }}" name="tender_tags[]" value="{{ $tag->id }}" 
                                        @foreach($tender->tags as $tender_tag)
                                            {{ $tender_tag->id ===  $tag->id ? 'checked' : ''}}
                                        @endforeach
                                    >
                                    <label class="form-check-label" for="tender_tag_{{ $tag->id }}">{{ $tag->tag_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /tender tag -->
                </div>
                <div class="card-footer d-flex">
                        <button type="submit" class="btn btn-primary">Izmjeni</button>
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