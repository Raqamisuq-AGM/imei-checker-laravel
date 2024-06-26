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
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter IMEI or Serial" aria-label="IMEI or Serial" />
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button" style="height: 52px;">Check</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
