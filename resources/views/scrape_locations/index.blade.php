@extends('adminlte::page')

@section('title', 'Scrape lokacije')

@section('content_header')
    <h1>Scrape lokacije</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Podaci scrape lokacija</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Naziv lokacije</th>
                            <th>Trajanje scrape-a</th>
                            <th>Status</th>
                            <th>Broj linkova</th>
                            <th>Broj novih linkova</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($scrape_locations as $scrape_location)
                                <tr>
                                    <td>{{ date('d.m.Y', strtotime($scrape_location->created_at)) }}</td>
                                    <td>{{ $scrape_location->location->location_name }}</td>
                                    <td>{{ gmdate("H:i:s", round($scrape_location->location_scrape_time, 2)) }}</td>
                                    <td>
                                        @if(substr($scrape_location->location_http_status_code, 0, 1) == 4)
                                            <span class="badge bg-danger">{{ $scrape_location->location_http_status_code }}</span>
                                        @elseif(substr($scrape_location->location_http_status_code, 0, 1) == 5)
                                            <span class="badge bg-warning">{{ $scrape_location->location_http_status_code }}</span>
                                        @else
                                            {{ $scrape_location->location_http_status_code }}
                                        @endif
                                    </td>
                                    <td>{{ $scrape_location->location_all_links_count  }}</td>
                                    <td>{{ $scrape_location->location_new_links_count  }}</td>
                                    <td><a href="/locations/{{ $scrape_location->location_id }}/edit"><i class="fas fa-search"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $scrape_locations->links() }}
@endsection