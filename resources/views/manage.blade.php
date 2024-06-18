@extends('layouts.app')

@section('content')
<div class="compute-div container">
    <div class="top">
        <ion-icon name="home"></ion-icon>
        <h1><a href="{{url('/')}}">Home</a><span> > </span> Manage</h1>
    </div>
    <div class="homemenu-row " style="justify-content: space-evenly">
        <a class="homemenu-box shadow-sm text-center" href="{{url('/target')}}">
            <img src="{{url('/image/upload.svg')}}" alt="">
            <h1>Add Target GWA</h1>
        </a>
        <a class="homemenu-box shadow-sm text-center" href="{{url('/addmodule')}}">
            <img src="{{url('/image/manage.svg')}}" alt="">
            <h1>Add Module</h1>
        </a>
    </div>
</div>
@endsection