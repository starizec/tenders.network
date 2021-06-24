@extends('adminlte::page')

@section('title', 'Scrape lokacije')

@section('content_header')
    <h1>Scrape lokacije</h1>
@stop

@section('content')
    @include('inc.card.card_start', ['card_title' => 'Podaci scrape lokacija'])
    <table class="table">
        <thead>
          <tr>
            <th>Datum</th>
            <th>Id lokacije</th>
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
                    <td>{{ $scrape_location->location_id }}</td>
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
                    <td><i class="fas fa-search"></i></td>
              </tr>
            @endforeach
        </tbody>
      </table>
    @include('inc.card.card_end')

    {{ $scrape_locations->links() }}
@endsection