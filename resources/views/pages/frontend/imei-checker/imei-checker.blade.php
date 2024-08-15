@extends('layout.frontend.frontend')
@section('title')
    Check IMEI Pro
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
                        <select class="form-control mob-select custom-select" id="serviceSelect" name="service_id" required>
                            <option value="">Please select a Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">
                                    ${{ $service->price }} - {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div id="paidServiceMessage" style="color: red; display: none;">
                            This is a paid service
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter IMEI or Serial"
                            aria-label="IMEI or Serial" name="imei" required />
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit" style="height: 52px;">Check</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


{{-- @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const serviceSelect = document.getElementById('serviceSelect');
            const paidServiceMessage = document.getElementById('paidServiceMessage');

            serviceSelect.addEventListener('change', function() {
                const selectedValue = parseInt(serviceSelect.value);
                const paidServiceIds = [4, 5, 14, 16, 19];

                if (paidServiceIds.includes(selectedValue)) {
                    paidServiceMessage.style.display = 'block';
                } else {
                    paidServiceMessage.style.display = 'none';
                }
            });
        });
    </script>
@endsection --}}
