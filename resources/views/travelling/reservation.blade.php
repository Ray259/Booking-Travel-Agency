@extends('layouts.app')

@section('content')
    <div class="second-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Book Prefered Deal Here</h4>
                    <h2>Make Your Reservation</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi
                        labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
                    <div class="main-button"><a href="about.html">Discover More</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info reservation-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="info-item">
                        <i class="fa fa-phone"></i>
                        <h4>Make a Phone Call</h4>
                        <a href="#">+123 456 789 (0)</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="info-item">
                        <i class="fa fa-envelope"></i>
                        <h4>Contact Us via Email</h4>
                        <a href="#">company@email.com</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="info-item">
                        <i class="fa fa-map-marker"></i>
                        <h4>Visit Our Offices</h4>
                        <a href="#">24th Street North Avenue London, UK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="reservation-form">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <form id="reservation-form" name="gs" method="POST" role="search" action="{{ route('travelling.reservation.store', $city->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="Name" class="form-label">Your Name</label>
                                    <input type="text" name="name" class="Name" placeholder="Ex. John Smithee"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="Number" class="form-label">Your Phone Number</label>
                                    <input type="text" name="phone" class="Number" placeholder="Ex. +xxx xxx xxx"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="chooseGuests" class="form-label">Number Of Guests</label>
                                    <select name="nbGuests" class="form-select" aria-label="Default select example"
                                        id="chooseGuests" onChange="this.form.click()">
                                        <option selected>ex. 3 or 4 or 5</option>
                                        <option type="checkbox" name="option1" value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4+">4+</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="Number" class="form-label">Check In Date</label>
                                    <input type="date" name="checkin_date" class="date" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="chooseDestination" class="form-label">Choose Your Destination</label>
                                    <input type="hidden" value={{ $city->name }} name="destination" class="Name" required>
                                    <input disabled type="text" value={{ $city->name }} class="Name" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" class="main-button">Make Your Reservation Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection