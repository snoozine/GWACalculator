@extends('layouts.app')

@section('content')

<div class="profile-body">
    <div class="profile-container container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                @if(!$profile)
                <img class="profile-image mx-auto" src="{{url('image/avatar.webp')}}" />
                @else
                <img class="profile-image mx-auto" src="{{ Storage::url($profile->image) }}" />
                @endif
                <div style="padding: 10px"></div>
            </div>
            <div class="name-div col-lg-8 col-md-8 col-sm-12">
                <h2>{{ Auth::user()->name }}</h2>
                @if($profile)
                <p>
                    Course: {{$profile->program}}
                </p>
                <p style="margin-top:-15px">
                    Year Level: {{$profile->year}}
                </p>
                <a href="/editprofile/{{Auth::user()->id}}" class="btn edit-profile-btn">
                    <ion-icon name="cog"></ion-icon> Edit Profile
                </a>
                @else
                <p>
                    Course:
                </p>
                <p style="margin-top:-15px">
                    Year Level:
                </p>
                @endif
            </div>
        </div>

        <hr />
    </div>
    @if($profile)
    <div class="info-container container">
        <h3 style="font-weight: 400; color:#3a3150;" class="text-center">Basic Information</h3>
        <hr />
        <div class="inner row shadow-sm">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">Last Name:</div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <input value="{{$profile->lname}}" readonly class="form-control" />
                        <div style="padding: 10px"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">First Name:</div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <input value="{{$profile->fname}}" readonly class="form-control" />
                        <div style="padding: 10px"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">Birth Date:</div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <input value="{{$profile->bday}}" readonly class="form-control" />
                        <div style="padding: 10px"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">Gender:</div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <input value="{{$profile->gender}}" readonly class="form-control" />
                        <div style="padding: 10px"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">Nationality:</div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <input value="{{$profile->nationality}}" readonly class="form-control" />
                        <div style="padding: 10px"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">Civil Status:</div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <input value="{{$profile->status}}" readonly class="form-control" />
                        <div style="padding: 10px"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">Email:</div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <input value="{{$profile->email}}" readonly class="form-control" />
                        <div style="padding: 10px"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">Address:</div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <input value="{{$profile->address}}" readonly class="form-control" />
                        <div style="padding: 10px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="deactivate-account-btn  text-center p-5">
        <button class=" btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">DEACTIVATE
            ACCOUNT</button>
    </div>
    @else
    <div class="container text-center p-5">

        <img src="{{url('/image/setup.svg')}}" width="320px">
        <h1 class="p-3">SETUP YOUR PROFILE FRIST!</h1>
        <a class="btn text-white" href="{{route('setupProfile')}}" style="background-color: #3a3150;">SET UP PROFILE</a>

    </div>
    @endif
</div>

@include('layouts.modals.profiledelete')
@endsection