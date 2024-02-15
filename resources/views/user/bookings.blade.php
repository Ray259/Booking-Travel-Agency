@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Bookings</h2>
                </div>
            </div>
        </div>
    </div>
    <table class="table" style="margin: 100px">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Destination</th>
                <th scope="col">Phone number</th>
                <th scope="col">Number of Guests</th>
                <th scope="col">Checkin Date</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $booking->destination }}</td>
                <td>{{ $booking->phone }}</td>
                <td>{{ $booking->nbGuests }}</td>
                <td>{{ $booking->checkin_date }}</td>
                <td>{{ $booking->price }} $</td>
                <td>{{ $booking->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
