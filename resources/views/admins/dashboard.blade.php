@extends('layouts.admin')

@section('content')
    <div class="row">


        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Countries</h5>
                    <p class="card-text">number of countries: {{ $cntCountry }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cities</h5>
                    <p class="card-text">number of countries: {{ $cntCity }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text">number of admins: {{ $cntAdmin }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
