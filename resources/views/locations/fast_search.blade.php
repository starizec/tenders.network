@extends('adminlte::page')

@section('title', 'Lokacije')

@section('content_header')
    <h1>Lokacije</h1>
@stop

@section('content')
    
    @include('inc.select_country')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pretraživanje</h3>
                </div>
                <div class="card-body">               
                    <input type="text" name="location_name" class="form-control" placeholder="Lokacija" onkeyup="search_location()" id="location" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sve lokacije</h3>
                </div>
                <div class="card-body">
                    <table class="table" id="locations">
                        <thead>
                        <tr>
                            <th>Naziv</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <td><b>{{ $location->location_name }}</b> <br> 
                                        <small>{{ $location->location_url }}</small></td>
                                    <td><a href="/locations/{{ $location->id }}/edit"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>
@endsection

@section('js')
    <script>
        function search_location() {
        
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("location");
        filter = input.value.toUpperCase();
        table = document.getElementById("locations");
        tr = table.getElementsByTagName("tr");
        
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            } 
        }
        }
    </script>
@endsection