@extends('layout.frontend.frontend')

@section('title', 'Check IMEI Pro')

@section('content')
    <div class="container hex-background py-4">
        <div class="row">
            <div class="col-md-8">
                <h3 class="mb-4">IMEI Check Result</h3>
                @if (!empty($data))
                    <div>
                        <p><strong>IMEI:</strong> {{ $data['imei'] ?? 'N/A' }}</p>
                        <p><strong>Brand:</strong> {{ $data['brand'] ?? 'N/A' }}</p>
                        <p><strong>Model:</strong> {{ $data['model'] ?? 'N/A' }}</p>
                        <p><strong>Model Name:</strong> {{ $data['modelName'] ?? 'N/A' }}</p>
                        <p><strong>Manufacturer:</strong> {{ $data['manufacturer'] ?? 'N/A' }}</p>
                    </div>
                @else
                    <p class="text-danger">No result available.</p>
                @endif
                <div class="mt-4">
                    <a class="btn btn-danger" href="{{ route('imei-check') }}">Check Another IMEI</a>
                </div>
            </div>
        </div>
    </div>
@endsection
