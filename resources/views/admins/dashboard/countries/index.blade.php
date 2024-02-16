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
                    <h5 class="card-title mb-4 d-inline">All Countries</h5>
                    <a href="{{ route('admin.dashboard.countries.createView') }}"
                        class="btn btn-info mb-4 text-center float-right">Create Countries</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Continent</th>
                                <th scope="col">Population</th>
                                <th scope="col">Territory</th>
                                <th scope="col">Average Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <th scope="row">{{ $country->id }}</th>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->continent }}</td>
                                    <td>{{ $country->population }}</td>
                                    <td>{{ $country->territory }}</td>
                                    <td>${{ $country->avg_price }}</td>
                                    <td>{{ $country->description }}</td>
                                    <td><img src="{{ asset('assets/images/' . $country->image) }}" alt="{{ $country->name }}"
                                            style="height: 100px;"></td>
                                    <td>
                                        <form action="{{ route('admin.dashboard.countries.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $country->id }}">
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
