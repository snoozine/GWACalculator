@extends('layouts.app')

@section('content')
<div class="compute-div container">
    <div class="top">
        <ion-icon name="home"></ion-icon>
        <h1><a href="{{url('/')}}">Home</a><span> > </span> Calculator</h1>
    </div>


    @if(isset($data[1]))
    <h2>1st Year</h2>
    <div class="flex-box">
        @foreach($data[1] as $yearRecord)
        <a class="box text-center shadow-sm" href="computation/{{$yearRecord->id}}">
            <img src="{{url('/image/1st.svg')}}" alt="">
            <h6>TERM {{ $yearRecord->term }}</h6>
        </a>
        @endforeach
    </div>
    @endif

    @if(isset($data[2]))
    <h2>2nd Year</h2>
    <div class="flex-box">
        @foreach($data[2] as $yearRecord)
        <a class="box text-center shadow-sm" href="computation/{{$yearRecord->id}}">
            <img src="{{url('/image/2nd.svg')}}" alt="">
            <h6>TERM {{ $yearRecord->term }}</h6>
        </a>
        @endforeach
    </div>
    @endif

    @if(isset($data[3]))
    <h2>3rd Year</h2>
    <div class="flex-box">
        @foreach($data[3] as $yearRecord)
        <a class="box text-center shadow-sm" href="computation/{{$yearRecord->id}}">
            <img src="{{url('/image/3rd.svg')}}" alt="">
            <h6>TERM {{ $yearRecord->term }}</h6>
        </a>
        @endforeach
    </div>
    @endif

    @if(isset($data[4]))
    <h2>4th Year</h2>
    <div class="flex-box">
        @foreach($data[4] as $yearRecord)
        <a class="box text-center shadow-sm" href="computation/{{$yearRecord->id}}">
            <img src="{{url('/image/4th.svg')}}" alt="">
            <h6>TERM {{ $yearRecord->term }}</h6>
        </a>
        @endforeach
    </div>
    @endif
</div>
@endsection