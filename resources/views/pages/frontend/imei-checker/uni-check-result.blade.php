@extends('layout.frontend.frontend')

@section('title', 'Check IMEI Pro')

@section('content')
    <div class="container hex-background py-4">
        <div class="row">
            <div class="col-md-8">
                <h3 class="mb-4">IMEI Check Result</h3>
                @if (!empty($data))
                    <div>
                        <p><strong style="color: #000">IMEI:</strong> <span
                                style="color: #000">{{ $data['imei'] ?? 'N/A' }}</span></p>
                        <p><strong style="color: #000">Brand:</strong> <span
                                style="color: #000">{{ $data['brand'] ?? 'N/A' }}</span></p>
                        <p><strong style="color: #000">Model:</strong> <span
                                style="color: #000">{{ $data['model'] ?? 'N/A' }}</span></p>
                        <p><strong style="color: #000">Model Name:</strong> <span
                                style="color: #000">{{ $data['modelName'] ?? 'N/A' }}</span></p>
                        <p><strong style="color: #000">Manufacturer:</strong> <span
                                style="color: #000">{{ $data['manufacturer'] ?? 'N/A' }}</span></p>
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
