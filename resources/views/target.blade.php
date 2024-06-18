@extends('layouts.app')

@section('content')
<div class="compute-div container">
    <div class="top">
        <ion-icon name="home"></ion-icon>
        <h1><a href="{{url('/')}}">Home</a><span> > </span> <a href="{{url('/manage')}}">Manage</a><span> >
            </span>Add Target GWA</h1>
    </div>
    <div class=" container">
        <div class="add-gwa-button">
            <a href="/addgwa" class="btn">ADD TARGET GWA</a>
        </div>
        <div class="add-gwa-container">
            <table class="add-traget-gwa-table table table-bordered">
                <thead>
                </thead>
                @if(isset($data[1]))
                <tbody>
                    <tr>
                        <th class="hidden" colspan="2">1ST YEAR</th>
                        <th class="block">1ST YEAR</th>
                        <th class="text-center">GWA</th>
                        <th colspan="2">EDIT</th>
                    </tr>
                    @foreach($data[1] as $targetData)
                    <tr>
                        <td class="hidden">
                            @if($targetData->year == 1)
                            {{$targetData->year}}st Year
                            @elseif($targetData->year == 2)
                            {{$targetData->year}}nd Year
                            @elseif($targetData->year == 3)
                            {{$targetData->year}}rd Year
                            @endif
                        </td>
                        <td>
                            @if($targetData->term == 1)
                            {{$targetData->term}}st Term
                            @elseif($targetData->term == 2)
                            {{$targetData->term}}nd Term
                            @elseif($targetData->term == 3)
                            {{$targetData->term}}rd Term
                            @endif
                        </td>
                        <td>
                            {{ $targetData->gwa }}
                        </td>
                        <td>

                            <a class="btn edit" href="editgwa/{{$targetData->id}}">EDIT</a>

                        </td>
                        <td>
                            <form action="{{route('targetdelete')}}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="id" value="{{$targetData->id}}">
                                <button class="btn delete">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif

                @if(isset($data[2]))
                <tbody>
                    <tr>
                        <th class="hidden" colspan="2">1ST YEAR</th>
                        <th class="block">1ST YEAR</th>
                        <th class="text-center">GWA</th>
                        <th colspan="2">EDIT</th>
                    </tr>
                    @foreach($data[2] as $targetData)
                    <tr>
                        <td class="hidden">
                            @if($targetData->year == 1)
                            {{$targetData->year}}st Year
                            @elseif($targetData->year == 2)
                            {{$targetData->year}}nd Year
                            @elseif($targetData->year == 3)
                            {{$targetData->year}}rd Year
                            @endif
                        </td>
                        <td>
                            @if($targetData->term == 1)
                            {{$targetData->term}}st Term
                            @elseif($targetData->term == 2)
                            {{$targetData->term}}nd Term
                            @elseif($targetData->term == 3)
                            {{$targetData->term}}rd Term
                            @endif
                        </td>
                        <td>
                            {{ $targetData->gwa }}
                        </td>
                        <td>
                            <form action="">
                                <button class="btn edit">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <button class="btn delete">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif

                @if(isset($data[3]))
                <tbody>
                    <tr>
                        <th class="hidden" colspan="2">1ST YEAR</th>
                        <th class="block">1ST YEAR</th>
                        <th class="text-center">GWA</th>
                        <th colspan="2">EDIT</th>
                    </tr>
                    @foreach($data[3] as $targetData)
                    <tr>
                        <td class="hidden">
                            @if($targetData->year == 1)
                            {{$targetData->year}}st Year
                            @elseif($targetData->year == 2)
                            {{$targetData->year}}nd Year
                            @elseif($targetData->year == 3)
                            {{$targetData->year}}rd Year
                            @endif
                        </td>
                        <td>
                            @if($targetData->term == 1)
                            {{$targetData->term}}st Term
                            @elseif($targetData->term == 2)
                            {{$targetData->term}}nd Term
                            @elseif($targetData->term == 3)
                            {{$targetData->term}}rd Term
                            @endif
                        </td>
                        <td>
                            {{ $targetData->gwa }}
                        </td>
                        <td>
                            <form action="">
                                <button class="btn edit">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <button class="btn delete">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif


                @if(isset($data[4]))
                <tbody>
                    <tr>
                        <th class="hidden" colspan="2">1ST YEAR</th>
                        <th class="block">1ST YEAR</th>
                        <th class="text-center">GWA</th>
                        <th colspan="2">EDIT</th>
                    </tr>
                    @foreach($data[4] as $targetData)
                    <tr>
                        <td class="hidden">
                            @if($targetData->year == 1)
                            {{$targetData->year}}st Year
                            @elseif($targetData->year == 2)
                            {{$targetData->year}}nd Year
                            @elseif($targetData->year == 3)
                            {{$targetData->year}}rd Year
                            @endif
                        </td>
                        <td>
                            @if($targetData->term == 1)
                            {{$targetData->term}}st Term
                            @elseif($targetData->term == 2)
                            {{$targetData->term}}nd Term
                            @elseif($targetData->term == 3)
                            {{$targetData->term}}rd Term
                            @endif
                        </td>
                        <td>
                            {{ $targetData->gwa }}
                        </td>
                        <td>
                            <form action="">
                                <button class="btn edit">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <button class="btn delete">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif

            </table>
        </div>
    </div>


</div>
@endsection