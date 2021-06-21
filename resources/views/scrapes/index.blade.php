@extends('adminlte::page')

@section('title', 'Scrape')

@section('content_header')
    <h1>Scrape</h1>
@stop

@section('content')
    @include('inc.card.card_start', ['card_title' => 'Scrape podaci'])
    <table class="table">
        <thead>
          <tr>
            <th>Datum</th>
            <th>Broj lokacija</th>
            <th>Broj linkova</th>
            <th>Broj novih linkova</th>
            <th>Trajanje scrape-a</th>
            <th>404</th>
            <th>5xx</th>
          </tr>
        </thead>
        <tbody>
            @foreach($scrapes as $scrape)
                <tr>
                    <td>{{ date('d-m-Y', strtotime($scrape->created_at)) }}</td>
                    <td>{{ $scrape->scrape_locations_count }}</td>
                    <td>{{ $scrape->scrape_all_links_count }}</td>
                    <td>{{ $scrape->scrape_new_links_count }}</td>
                    <td>{{ gmdate("H:i:s", round($scrape->scrape_time, 2)) }}</td>
                    <td><span class="badge bg-danger">{{ $scrape->scrape_404_count }}</span></td>
                    <td><span class="badge bg-warning">{{ $scrape->scrape_5xx_count }}</span></td>
              </tr>
            @endforeach
        </tbody>
      </table>
    @include('inc.card.card_end')
@stop