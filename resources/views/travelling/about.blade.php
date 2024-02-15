@extends('layouts.app')

@section('content')
    <div class="about-main-content"
        style="margin: -10px; background-image: url({{ asset('assets/images/' . $country->image) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <div class="blur-bg" style="background-image: url({{ asset('assets/images/' . $country->image) }})">
                        </div>
                        <h4>EXPLORE OUR COUNTRY</h4>
                        <div class="line-dec"></div>
                        <h2>Welcome To {{ $country->name }}</h2>
                        <p>{{ $country->description }}</p>
                        <div class="main-button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <div class="cities-town">
        <div class="container">
            <div class="row">
                <div class="slider-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>{{ $country->name }}’s <em>Cities &amp; Towns</em></h2>
                        </div>
                        <div class="col-lg-12">
                            @foreach ($cities as $city)
                                <div class="visit-country">
                                    <div class="col-lg-12">
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-5">
                                                    <div class="image">
                                                        <a href="{{ route('travelling.about', $country->id) }}"><img
                                                                src="{{ asset('assets/images/' . $city->image) }}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-sm-7">
                                                    <div class="right-content">
                                                        <h2>{{ $city->name }}</h2>
                                                        <span style="margin-bottom: 20px">{{ $country->name }}</span>
                                                        <div class="main-button">
                                                            <a href="{{ route('travelling.reservation', $city->id) }}">Make
                                                                Reservation</a>
                                                        </div>
                                                        <ul class="info">
                                                            <li><i class="fa fa-user"></i> {{ $country->population }}</li>
                                                            <li><i class="fa fa-globe"></i> {{ $city->nbDays }} Days Trip
                                                            </li>
                                                            <li><i class="fa fa-user"></i> {{ $city->price }}$ / Person
                                                            </li>
                                                        </ul>
                                                        <h4 style="color: #22b3c1">About {{ $city->name }}</h4>
                                                        <p style="color: black">{{ $city->description }}</p>
                                                        <div class="text-button">
                                                            <a href="{{ route('travelling.about', $country->id) }}">Need
                                                                Directions ? <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <div class="weekly-offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Best Weekly Offers In Each City</h2>
                        <p>Discover exclusive weekly offers tailored just for you in every city. Whether you're seeking
                            culinary delights, thrilling adventures, or relaxing getaways, our handpicked deals ensure you
                            make the most of your time in each vibrant locale. Don't miss out on these incredible
                            opportunities to experience the best of each city at unbeatable prices.</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="owl-weekly-offers owl-carousel">
                <div class="row">
                    @foreach ($cities as $city)
                        <div class="col-lg-5">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('assets/images/' . $country->image) }}" alt="">
                                    <div class="text">
                                        <h4>{{ $city->name }}<br>
                                            {{-- <span><i class="fa fa-users"></i> 234 Check Ins</span> --}}
                                        </h4>
                                        <h6>${{ $city->price }}<br><span>/person</span></h6>
                                        <div class="line-dec"></div>
                                        <ul>
                                            <li>Deal Includes:</li>
                                            <li><i class="fa fa-taxi"></i> 5 Days Trip > Hotel Included</li>
                                            <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                                            <li><i class="fa fa-building"></i> Daily Places Visit</li>
                                        </ul>
                                        <div class="main-button">
                                            <a href="{{ route('travelling.reservation', $city->id) }}">Make a
                                                Reservation</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="more-about">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 align-self-center">
                                <div class="left-image">
                                    <img src="assets/images/about-left-image.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h2>Discover More About Our Country</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore.</p>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="info-item">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h4>12.560+</h4>
                                                    <span>Amazing Places</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h4>240.580+</h4>
                                                    <span>Different Check-ins Yearly</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
