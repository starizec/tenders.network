@extends('adminlte::page')

@section('title', 'Dodaj partnera')

@section('content_header')
    <h1>Dodavanje partnera</h1>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dodaj partnera</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-partner') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Naziv partnera</label>
                            <input type="text" name="partner_name" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>URL partner stranice</label>
                            <input type="text" name="partner_url" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Ime i prezime vlasnika</label>
                            <input type="text" name="partner_owner" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Kontakt email</label>
                            <input type="text" name="partner_email" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Odaberi državu</label>
                            <select name="country_id" class="custom-select rounded-0 s2-countries" id="select_country">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Napomene partnera</label>
                                <textarea id="summernote" name="partner_notes"></textarea>
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
        $('.s2-countries').select2();
    });

    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection