@extends('adminlte::page')

@section('title', 'Scrape')

@section('content_header')
    <h1>Scrape</h1>
@stop

@section('content')

  @include('inc.select_country')
  
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Scrape podaci</h3>
            </div>
            <div class="card-body">
              <table class="table">
                  <thead>
                    <tr>
                      <th>Datum</th>
                      <th>Broj lokacija</th>
                      <th>Broj linkova</th>
                      <th>Broj novih linkova</th>
                      <th>Trajanje scrape-a</th>
                      <th>404</th>
                     {{--  <th>5xx</th> --}}
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($scrapes as $scrape)
                          <tr>
                              <td>{{ date('d.m.Y', strtotime($scrape->created_at)) }}</td>
                              <td>{{ number_format($scrape->scrape_locations_count) }}</td>
                              <td>{{ number_format($scrape->scrape_all_links_count) }}</td>
                              <td>{{ number_format($scrape->scrape_new_links_count) }}</td>
                              <td>{{ gmdate("H:i:s", round($scrape->scrape_time, 2)) }}</td>
                              <td><a href="/scrapes/locations/404/{{ urlencode($scrape->started_at) }}/{{ urlencode($scrape->ended_at) }}"><span class="badge bg-danger">{{ $scrape->scrape_404_count }}</span></a></td>
                              {{-- <td><a href="/scrapes/locations/5xx/{{ urlencode($scrape->started_at) }}/{{ urlencode($scrape->ended_at) }}"><span class="badge bg-warning">{{ $scrape->scrape_5xx_count }}</span></a></td> --}}
                              <td>
                                <form action="{{ route('download-scrape') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="start" value="{{ $scrape->started_at }}">
                                  <input type="hidden" name="end" value="{{ $scrape->ended_at }}">

                                  <button><i class="fas fa-download"></i></button>
                                </form>
                              </td>
                              <td><a href="/scrapes/locations/200/{{ urlencode($scrape->started_at) }}/{{ urlencode($scrape->ended_at) }}"><i class="fas fa-search"></i></a></td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
        </div>
  </div>
@stop