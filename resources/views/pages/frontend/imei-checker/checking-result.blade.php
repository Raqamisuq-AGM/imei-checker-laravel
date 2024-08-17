@extends('layout.frontend.frontend')
@section('title')
    Check IMEI Pro
@endsection
@section('content')
    <div class="container hex-background">
        {{-- <h1>Result</h1>
        <div>
            @if (isset($data))
                <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
            @else
                <p>No data available.</p>
            @endif
        </div> --}}
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h1>Result</h1>
                    @if (isset($data['object']) && is_array($data['object']))
                        @if (isset($data['object']['image']))
                            <div class="image">
                                {!! $data['object']['image'] !!}
                            </div>
                        @endif
                        @if (isset($data['object']['thumbnail']))
                            <div class="image">
                                <img src="{!! $data['object']['thumbnail'] !!}" alt="">
                            </div>
                        @endif
                    @endif
                    <p><strong>IMEI:</strong> {{ $data['imei'] }}</p>
                    @if (isset($data['object']) && is_array($data['object']))
                        @foreach ($data['object'] as $key => $value)
                            @if ($key != 'image' && $key != 'thumbnail')
                                <p>
                                    <strong>{{ ucfirst($key) }}:</strong>
                                    @if (is_bool($value))
                                        <span style="color: red;">
                                            {{ $value ? 'Yes' : 'No' }}
                                        </span>
                                    @elseif (is_null($value) || $value === '')
                                        <span style="color: red;">
                                            Not found
                                        </span>
                                    @else
                                        {{ $value }}
                                    @endif
                                </p>
                            @endif
                        @endforeach
                    @elseif ($data['object'] === false)
                        <p>No additional details available.</p>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <p>
                    <strong>
                        Check again
                    </strong>
                </p>
                <form action="{{ route('imei.checking') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <select class="form-control mob-select custom-select" id="serviceSelect" name="service_id" required>
                            <option value="">Please select a Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->service_id }}">
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
