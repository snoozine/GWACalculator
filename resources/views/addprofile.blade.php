@extends('layouts.app')

@section('content')
<form action="{{route('submitprofile')}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('POST')
    <input type="hidden" name="email" id="" value="{{Auth::user()->email}}">
    <div class="setup-div container">
        <div class="profile-container container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <img class="profile-image mx-auto" src="{{url('image/avatar.webp')}}" required />
                </div>
                <div class="name-div col-lg-8 col-md-8 col-sm-12">
                    <h2>{{ Auth::user()->name }}</h2>
                    <input type="file" name="image" class="form-control" required>
                </div>
            </div>
            <hr />
        </div>
        <div class="info-container container">
            <h3 style="font-weight: 400" class="text-center">Basic Information</h3>
            <hr />
            <div class="inner row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">Program:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="program" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">Last Name:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="lname" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">First Name:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="fname" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">Birth Date:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="bday" type="date" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">Gender:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="gender" id="" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">Year:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <select name="year" id="" class="form-control" required>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                            <div style="padding: 10px"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">Nationality:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="nationality" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">Civil Status:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="status" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">Address:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="address" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">Age:</div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <input name="age" class="form-control" required />
                            <div style="padding: 10px"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center py-5">
            <button type="submit" class="btn btn-dark w-50">SUBMIT</button>
        </div>
    </div>
</form>
@endsection