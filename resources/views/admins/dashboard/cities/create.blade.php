@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Cities</h5>
                    <form method="POST" action="{{ route('admin.dashboard.cities.create') }}"
                        enctype="multipart/form-data">
                        <!-- Name input -->
                        @csrf
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="Name" />
                        </div>

                        <!-- Country input -->
                        <div class="form-outline mb-4">
                            {{-- <select name="selectCountry" id="form2Example1" class="form-control">
                                <option value="" disabled selected>Pick country...</option>
                                @foreach ($countries as $country )
                                    <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                @endforeach
                            </select> --}}
                            <fieldset>
                                <label for="selectCountry" class="form-label">Number Of Guests</label>
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



                        <!-- Days Trip input -->
                        <div class="form-outline mb-4">
                            <input type="number" name="nbDays" id="form2Example1" class="form-control"
                                placeholder="Days Trip" />
                        </div>

                        <!-- Price input -->
                        <div class="form-outline mb-4">
                            <input type="number" name="price" id="form2Example1" class="form-control"
                                placeholder="Price" />
                        </div>

                        <!-- Description input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="description" id="form2Example1" class="form-control"
                                placeholder="Description" />
                        </div>

                        <!-- Image input -->
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
