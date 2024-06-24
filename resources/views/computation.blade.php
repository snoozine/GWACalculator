@extends('layouts.app')

@section('content')
<div class="computation-div container">
    <a href="/" class="home-button">
        <ion-icon name="home"></ion-icon> <span>>> Computation</span>
    </a>
    <hr>
    <h1 class="text-center">Grade Computation</h1>
    <hr>
    <div class="info row">
        <div class="col-lg-6 col-md-12 info-div">
            @if($profile)
            <div class="row">
                <div class="col-lg-2 col-sm-12">
                    <h3>Name:</h3>
                </div>
                <div class="col-lg-10 col-sm-12">
                    <h2>{{$profile->lname}}, {{$profile->fname}}</h2>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <h3>Program:</h3>
                </div>
                <div class="col-lg-10 col-sm-12">
                    <h2> {{$profile->program}}</h2>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <h3>Year:</h3>
                </div>
                <div class="col-lg-10 col-sm-12">
                    <h2> {{$profile->year}}</h2>
                </div>
            </div>
            @else
            <div class="setup-profile-btn container">
                <a href="/setupProfile">
                    <ion-icon name="person"></ion-icon>SETUP PROFILE
                </a>
            </div>
            @endif
        </div>
        <div class="computation-delete-btn col-lg-6 col-sm-12 ">
            <div class="buttons ">
                <form action="{{route('moduledelete')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="year_id" value="{{$module->id}}">
                    @if($computation)
                    <input type="hidden" name="computation_id" value="{{$computation->id}}">
                    @endif
                    <button class="btn delete-module-btn">
                        <ion-icon name="trash"></ion-icon>DELETE MODULE
                    </button>
                </form>
            </div>
        </div>
    </div>
    @if (!$computation)
    <div class="submitform">
        <h6>
            <ion-icon name="cloud-upload"></ion-icon>Midterm Grade Computation (Year: {{$module->year}}, Term:
            {{$module->term}})
        </h6>
        <form action="{{ route('submitComputation') }}" method="POST">
            @csrf
            <input type="hidden" name="year" id="name" required class="form-control" value="{{$module->year}}">
            <input type="hidden" name="term" id="name" required class="form-control" value="{{$module->term}}">
            <div class="row">
                @for ($i = 0; $i < $module->subjects; $i++) <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="subjects{{ $i }}">Subject {{ $i + 1 }}:</label>
                        <input class="form-control" type="text" id="subjects{{ $i }}" name="subjects[]" required
                            step="0.01">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <label for="grade_{{ $i }}">Grade {{ $i + 1 }}:</label>
                        <input class="form-control" type="number" id="grade_{{ $i }}" name="grades[]" step="0.01">
                    </div>
                    <div class="last-input col-lg-3 col-md-6 col-sm-12">
                        <label for="units{{ $i }}">Units:</label>
                        <input class="form-control" type="number" id="units{{ $i }}" name="units[]" required
                            step="0.01">
                    </div>
                    <br>
                    @endfor
            </div>
            <div class="add-grades-btn text-center">
                <button type="submit">
                    <div>
                        <span>
                            <p>ADD MODULE</p>
                        </span>
                    </div>
                    <div>
                        <span>
                            <p>SUBMIT</p>
                        </span>
                    </div>
                </button>
            </div>
        </form>
    </div>
    @else
    <div class="display-grades-div">
        <h4>
            <ion-icon name="cog"></ion-icon>EDIT GRADES
        </h4>
        <div class="edit-buttons">
            <button class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                <ion-icon name="library"></ion-icon>EDIT COURSES
            </button>
            <button class="btn" id="showFormBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                <ion-icon name="create"></ion-icon>EDIT GRADES
            </button>

            @if(!$finals) <button class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <ion-icon name="cloud-upload"></ion-icon>ADD FINAL GRADES
            </button>
            @endif
        </div>
        <div class="terms-year-div">
            <h5>Year:
                @if($computation->year == 1)
                {{$computation->year}}st Year
                @elseif($computation->year == 2)
                {{$computation->year}}nd Year
                @elseif($computation->year == 3)
                {{$computation->year}}rd Year
                @else
                {{$computation->year}}th Year
                @endif
            </h5>
            <h5>Term: @if($computation->term == 1)
                {{$computation->term}}st Term
                @elseif($computation->term == 2)
                {{$computation->term}}nd Term
                @elseif($computation->term == 3)
                {{$computation->term}}rd Term
                @endif</h5>
        </div>

        <table class="grades-table table table-bordered ">
            <thead>
                <tr>
                    <th>SUBJECTS</th>
                    <th>MIDTERMS</th>
                    <th>FINALS</th>
                    <th>UNITS</th>
                </tr>
            </thead>
            <tbody class="body1">
                @for ($i = 0; $i < count($subject); $i++) <tr>
                    <td>{{ $subject[$i] }}</td>
                    <td>{{ $midterms[$i] }}</td>
                    <td>@if (isset($finals[$i]))
                        {{ $finals[$i] }}
                        @endif</td>
                    <td>{{ $units[$i] }}</td>
                    </tr>

                    @endfor

            </tbody>
            <tbody class="body2">
                <tr>
                    <td colspan="3">Total Units</td>
                    <td>{{ $totalunits }}</td>
                </tr>
                <tr>
                    <td colspan="3">General Weighted Average (GWA)</td>
                    <td>{{$computation->total}}</td>
                </tr>
            </tbody>
        </table>
        @if($target)
        <table class="table reco-table grades-table table-bordered ">
            <tbody>
                <tr>
                    <td>TARGET GWA</td>
                    <td>{{$target->gwa}}</td>
                </tr>
                <tr>
                    <td>COMPUTED GWA</td>
                    <td>{{$computation->total}}</td>
                </tr>
                <tr>
                    <td>TARGET SUCCESS RATE:</td>
                    <td>
                        @if($target->percentage > 100)
                        <h5 class="text-success">100%</h5>

                        @elseif($target->percentage > 75)
                        <h5 class="text-success">{{$target->percentage}}%</h5>
                        @elseif($target->percentage >= 50)
                        <h5 class="text-warning">{{$target->percentage}}%</h5>
                        @else
                        <h5 class="text-danger">{{$target->percentage}}%</h5>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">

            @if($roundedGrade)
            <h5>Grade Recommendation</h5>
            <p>{{$roundedGrade}} {{$text}}</p>
            @else
            @if($target->percentage < 75 || $target->percentage == 0)
                <h2>KEEP WORKING HARD! YOU'LL GET THERE SOON! </h2>
                @else
                <h2>CONGRATULATIONS FOR PASSING!</h2>
                @endif
                @endif
        </div>
        @endif
    </div>
    <div class="text-center computation-back-btn">
        <button class="btn" onclick="history.back()">BACK</button>
    </div>
    <div class="p-3"></div>
    @endif
</div>

@if($computation)
@include('layouts.modals.editcomputation')
@endif
@endsection