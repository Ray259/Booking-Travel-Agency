@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">All Cities</h5>
                    <a href="{{ route('admin.dashboard.cities.createView') }}"
                        class="btn btn-info mb-4 text-center float-right">Create Cities</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Country</th>
                                <th scope="col">Days Trip</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <th scope="row">{{ $city->id }}</th>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->country_id }}</td>
                                    <td>{{ $city->nbDays }}</td>
                                    <td>${{ $city->price }}</td>
                                    <td>{{ $city->description }}</td>
                                    <td><img src="{{ asset('assets/images/' . $city->image) }}" alt="{{ $city->name }}"
                                            style="height: 100px;"></td>
                                    <td>
                                        <form action="{{ route('admin.dashboard.cities.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $city->id }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
