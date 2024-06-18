@extends('layouts.app')

@section('content')
<div class="compute-div container">
    <div class="top">
        <ion-icon name="home"></ion-icon>
        <h1><a href="{{url('/')}}">Home</a><span> > </span> <a href="{{url('/manage')}}">Manage</a><span> >
            </span>Add Target GWA</h1>
    </div>
    <div class="add-module-div">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('addtarget')}}" method="POST">
                    @csrf
                    @method('POST')
                    <label for="">Year: </label>
                    <select class="form-control" name="year" id="">
                        <option value="1">1st Year</option>
                        <option value="2">2ndYear</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>

                    <label for="">Term: </label>
                    <select class="form-control" name="term" id="">
                        <option value="1">1st term</option>
                        <option value="2">2nd term</option>
                        <option value="3">3rd term</option>
                    </select>
                    <label for="">Target GWA: </label>
                    <input class="form-control" type="number" name="gwa" step="0.01">

                    <div class="text-center">
                        <button class="btn btn-dark w-50 add-gwa-button" type="submit">ADD TARGET GWA</button>
                    </div>
                </form>
                @if (session('error'))
                <div class=" gwa-error-alert" role="alert">* {{ session('error') }}
                </div>
                @endif
            </div>
            <div class="col-lg-6 p-3 text-center">
                <img src="{{url('image/gwa.svg')}}" width="300px">
            </div>
        </div>
    </div>

</div>
@endsection