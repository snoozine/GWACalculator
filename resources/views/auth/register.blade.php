@extends('auth.app')
@section('content')
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-2">
                        <div class="row justify-content-center">
                            <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Sign up</p>
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c"><i
                                                    class="bi bi-person-circle"></i> Your Name</label>
                                            <input type="text" id="form3Example1c"
                                                class="form-control form-control-lg py-3" name="name" autocomplete="off"
                                                placeholder="enter your name" style="border-radius:25px ;" />

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c"><i
                                                    class="bi bi-envelope-at-fill"></i> Your Email</label>
                                            <input type="email" id="form3Example3c"
                                                class="form-control form-control-lg py-3  @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="enter your email" style="border-radius:25px ;" required />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c"><i
                                                    class="bi bi-chat-left-dots-fill"></i>
                                                Password</label>
                                            <input type="password" id="form3Example4c"
                                                class="form-control form-control-lg py-3  @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password" autocomplete="off"
                                                placeholder="enter your password" style="border-radius:25px ;" />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c"><i
                                                    class="bi bi-chat-left-dots-fill"></i>Confirm Password</label>
                                            <input type="password" id="form3Example4c"
                                                class="form-control form-control-lg py-3" name="password_confirmation"
                                                required autocomplete="new-password" autocomplete="off"
                                                placeholder="enter your password" style="border-radius:25px ;" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" value="Register" name="register"
                                            class="btn btn-warning btn-lg text-light my-2 py-3"
                                            style="width:100% ; border-radius: 30px; font-weight:600;  background-color: #9682b9; border: 0;"
                                            style="border-radius:25px ;" b />

                                    </div>
                                </form>
                                <p class="text-center">Already have an account? <a href="{{ route('login') }}"
                                        style="font-weight:600; text-decoration:none; color: #9682b9;">Login</a>
                                </p>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 text-center align-items-center order-1 order-lg-2 ">
                                <img src="{{url('/image/register.svg')}}" class="img-fluid p-2" alt="Sample image"
                                    height="300px" width="500px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection