@extends('layout.frontend.frontend')
@section('title')
    IMIE Checker
@endsection
@section('content')
    <div class="container hex-background">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh">
            <div class="col-md-8">
                <h1>IMEI Check</h1>
                <p>
                    Check IMEI/SN. Verify the authenticity of your device with our IMEI
                    Checker. Get instant info on your device's Status, Blacklist,
                    SimLock, Model, Specs, Warranty and more IMEI Info for FREE. Protect
                    yourself from buying or using stolen or blacklisted devices! All
                    Brands / Devices supported, including Apple, iPhone and Samsung.
                </p>
                <form action="{{ route('imei.checking') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter IMEI or Serial"
                            aria-label="IMEI or Serial" name="imei" />
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit" style="height: 52px;">Check</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
