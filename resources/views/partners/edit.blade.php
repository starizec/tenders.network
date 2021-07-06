@extends('adminlte::page')

@section('title', 'Izmjena partnera')

@section('content_header')
    <h1>{{ $partner->partner_name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izmjena partnera</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-partner') }}" method="POST">
                        @csrf

                        <input type="hidden" value="{{ $partner->id }}" name="partner_id">

                        <div class="form-group">
                            <label>Naziv partnera</label>
                            <input value="{{ $partner->partner_name }}" type="text" name="partner_name" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Ime i prezime vlasnika</label>
                            <input value="{{ $partner->partner_owner }}" type="text" name="partner_owner" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Kontakt email</label>
                            <input value="{{ $partner->partner_email }}" type="text" name="partner_email" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Odaberi državu</label>
                            <select name="country_id" class="custom-select rounded-0 s2-countries" id="select_country">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}"
                                        @if($partner->country_id == $country->id)
                                            selected
                                        @endif>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Napomene partnera</label>
                                <textarea id="summernote" name="partner_notes">
                                    {{ $partner->partner_notes }}
                                </textarea>
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

@section('js')
<script>
    $(document).ready(function() {
        $('.s2-countries').select2();
    });

    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection