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
                <form action="{{route('submiteditgwa')}}" method="POST">
                    @csrf
                    @method('POST')
                    <label for="">Year: </label>
                    <select class="form-control" name="year" id="" disabled>
                        @if($gwa->year == 1)
                        <option>{{$gwa->year}}st Year</option>
                        @elseif($gwa->year == 2)
                        <option>{{$gwa->year}}nd Year</option>
                        @elseif($gwa->year == 3)
                        <option>{{$gwa->year}}rd Year</option>
                        @else
                        <option>{{$gwa->year}}th Year</option>
                        @endif
                    </select>
                    <label for="">Term: </label>
                    <select class="form-control" name="term" id="" disabled>
                        @if($gwa->term == 1)
                        <option>{{$gwa->term}}st Term</option>
                        @elseif($gwa->term == 2)
                        <option>{{$gwa->term}}nd Term</option>
                        @elseif($gwa->term == 3)
                        <option>{{$gwa->term}}rd Term</option>
                        @else
                        <option>{{$gwa->term}}th Term</option>
                        @endif

                    </select>
                    <label for="">Target GWA: </label>
                    <input class="form-control" type="number" name="gwa" step="0.01" value="{{$gwa->gwa}}">
                    <input type="hidden" name="id" value="{{$gwa->id}}">
                    <div class="text-center">
                        <button class="btn btn-dark w-50 m-5" type="submit">EDIT TARGET
                            GWA</button>
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