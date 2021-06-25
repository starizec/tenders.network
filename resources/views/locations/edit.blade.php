@extends('adminlte::page')

@section('title', 'Lokacije')

@section('content_header')
    <h1>Lokacije</h1>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izmjena lokacije: {{ $location->location_name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-location') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label>Naziv lokacije</label>
                            <input type="text" name="location_name" value="{{ $location->location_name }}" class="form-control" placeholder="Naziv lokacije" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>URL lokacije</label>
                            <input type="text" name="location_url" value="{{ $location->location_url }}" class="form-control" placeholder="URL lokacije" autocomplete="off">
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

        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Podaci scrape-a lokacije</h3>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Ukupan broj linkova</th>
                            <td></td>
                        <tr>
                        <tr>
                            <th>Broj linkova - 30 dana</th>
                            <td></td>
                        <tr>
                        <tr>
                            <th>Broj linkova - 60 dana</th>
                            <td></td>
                        <tr>
                        <tr>
                            <th>Broj linkova - 1 godina</th>
                            <td></td>
                        <tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection