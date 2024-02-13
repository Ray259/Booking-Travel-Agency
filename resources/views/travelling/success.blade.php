@extends('layouts.app')

@section('content')

<div class="about-main-content"
style="margin: -10px; background-image: url({{ asset('assets/images/' . Session::get('cityimg')) }})">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="content">
                <div class="blur-bg" style="background-image: url({{ asset('assets/images/' . Session::get('cityimg')) }})">
                </div>
                <h4>Thanks for booking</h4>
                <div class="line-dec"></div>
                <h2>Your reservation to {{ Session::get('cityname') }} has been made.</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
