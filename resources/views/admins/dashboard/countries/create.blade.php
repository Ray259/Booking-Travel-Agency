@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Countries</h5>
                    <form method="POST" action="{{ route('admin.dashboard.countries.create') }}"
                        enctype="multipart/form-data">
                        <!-- Name input -->
                        @csrf
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="Name" />
                        </div>

                        <!-- Continent input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="continent" id="form2Example1" class="form-control"
                                placeholder="Continent" />
                        </div>

                        <!-- Population input -->
                        <div class="form-outline mb-4">
                            <input type="number" name="population" id="form2Example1" class="form-control"
                                placeholder="Population" />
                        </div>

                        <!-- Territory input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="territory" id="form2Example1" class="form-control"
                                placeholder="Territory" />
                        </div>

                        <!-- Average Price input -->
                        <div class="form-outline mb-4">
                            <input type="number" name="avg_price" id="form2Example1" class="form-control"
                                placeholder="Average Price" />
                        </div>

                        {{-- Descrition input --}}
                        <div>
                            <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea2"
                                style="height: 100px; margin-bottom: 20px;"></textarea>
                        </div>

                        {{-- Image input --}}
                        <div class="form-outline mb-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" placeholder="Image"
                                accept="image/*" />
                        </div>



                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-info  mb-4 text-center">create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
