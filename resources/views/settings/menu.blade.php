@extends('adminlte::page')

@section('title', 'Menu partnera')

@section('content_header')
    <h1>Menu partnera</h1>
@stop

@section('content')
<div class="row">
    <div class="col col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menu</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update-menu') }}" method="post">
                @csrf

                <input type="hidden" name="partner_id" value="{{ $partner_id }}">
                <input type="hidden" name="setting_name" value="menu">

                    <div class="form-group">
                        <textarea class="form-control" id="menu" rows="16" name="setting_values"
                        >@foreach(json_decode($menu->setting_values) as $item)
                                @foreach($item as $element)
                                    {{ $element }}{{ $loop->last ? '' : ',' }}
                                @endforeach
                                    {{ $loop->last ? '' : '-' }}
                            @endforeach
                        </textarea>
                    </div>
                
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Primjeni">
                </form>
            </div>
        </div>
    </div>

    <div class="col col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Primjena</h3>
            </div>
            <div class="card-body">
                <p>
                    <b>Primjer:</b><br>
                    link,<br>
                    text,<br>
                    icon<br>
                    -<br>
                    link1,<br>
                    text1,<br>
                    icon1<br>
                    -<br>
                    link2,<br>
                    text2,<br>
                    icon2<br>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        let menu_values = document.getElementById("menu").innerHTML
        menu_values = menu_values.replace(/^\s*[\r\n]/gm, "")
        menu_values = menu_values.replace(/\s*-/gm, "\n-")
        document.getElementById("menu").innerHTML = menu_values.trim()
    </script>
@endsection