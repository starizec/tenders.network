<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Odabir države</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('select-country') }}" method="post">
                    @csrf
                    
                    @foreach($countries as $country)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="country_id" id="{{ $country->country_language }}" value="{{ $country->id }}"
                                @if(Session::get('country_id') == $country->id)
                                    checked
                                @endif>
                            <label class="form-check-label" for="{{ $country->country_language }}">{{ $country->country_name }}</label>
                        </div>
                    @endforeach
        
                    <input type="submit" class="btn btn-primary" value="Odaberi">
                </form>
            </div>
        </div>
    </div>
</div>