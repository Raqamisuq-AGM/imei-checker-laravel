@extends('layout.frontend.frontend')
@section('title')
    Forget password | Check IMEI Pro
@endsection
@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('auth.forget.password.update') }}" method="post">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Forget Password</p>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter new password" name="password" value="{{ old('password') }}" />
                            {{-- <label class="form-label" for="form3Example3">Email address</label> --}}
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <!--New password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter confirm password" name="cnf_password" value="{{ old('cnf_password') }}" />
                            {{-- <label class="form-label" for="form3Example3">Email address</label> --}}
                            @if ($errors->has('cnf_password'))
                                <span class="text-danger">{{ $errors->first('cnf_password') }}</span>
                            @endif
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
@endsection
