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
                    <p><strong style="color: #000;">IMEI:</strong> <span style="color: #000">{{ $data['imei'] }}</span></p>
                    @if (isset($data['object']) && is_array($data['object']))
                        @foreach ($data['object'] as $key => $value)
                            @if ($key != 'image' && $key != 'thumbnail')
                                <p>
                                    <strong style="color: #000;">{{ ucfirst($key) }}:</strong>
                                    @if (is_bool($value))
                                        <span style="color: red;">
                                            {{ $value ? 'Yes' : 'No' }}
                                        </span>
                                    @elseif (is_null($value) || $value === '')
                                        <span style="color: red;">
                                            Not found
                                        </span>
                                    @else
                                        <span style="color: #000">{{ $value }}</span>
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
                <form id="imeiForm" action="{{ route('imei.checking') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <select class="form-control mob-select custom-select" id="serviceSelect" name="service_id" required
                            style="font-size: 16px;">
                            <option value="">Please select a Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->service_id }}" data-price="{{ $service->price }}">
                                    @if ($service->price == '0')
                                        Free
                                    @else
                                        {{ $service->price }}
                                    @endif - {{ $service->title }}
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
                <div class="example-btn">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Show Example</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Example IMEI Check</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="imeiDetails">
                        <div><strong>PCB:</strong> 1822668E2B11165110000484</div>
                        <div><strong>Model:</strong> Realme 10 ProMY(8+256)</div>
                        <div><strong>IMEI:</strong> 865017060108659</div>
                        <div><strong>IMEI2:</strong> 865017060108642</div>
                        <div><strong>Material:</strong> 6054828</div>
                        <div><strong>Color:</strong> Nebula Blue</div>
                        <div><strong>Ram Capacity:</strong> 8GB</div>
                        <div><strong>Rom Capacity:</strong> 256GB</div>
                        <div><strong>Manufacture Date:</strong> 2022-11-21 06:43:00</div>
                        <div><strong>Product Version:</strong> VU.1</div>
                        <div><strong>Software Version:</strong> V2.0</div>
                        <div><strong>Battery SN:</strong> 9561583B416XAP983245221057688</div>
                        <div><strong>Adaptor SN:</strong> 5474178B791H122423BA1510252</div>
                        <div><strong>Brand:</strong> realme</div>
                        <div><strong>Project Code:</strong> 22668MY</div>
                        <div><strong>Purchase Country:</strong> Malaysia</div>
                        <div><strong>Warranty Status:</strong> Warranty Expired</div>
                        <div><strong>Warranty Start Date:</strong> 2023-02-19 06:43:00</div>
                        <div><strong>Warranty End Date:</strong> 2024-02-19 06:43:00</div>
                        <div><strong>Warranty Validity:</strong> 365 days</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="copyButton">Copy Result</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login/Signup Modal -->
    <div class="modal fade" id="loginSignupModal" tabindex="-1" role="dialog" aria-labelledby="loginSignupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginSignupModalLabel">IMEI Check Result:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>SERVICE:</strong> Not Free</p>
                    <p><strong>NEED:</strong> <a href="{{ route('signup') }}">Sign up</a> or <a
                            href="{{ route('login') }}">Log in</a></p>
                    <hr>
                    <p><strong>Example:</strong></p>
                    <p><strong>Manufacturer:</strong> Sony Mobile Communications</p>
                    <p><strong>IMEI:</strong> 354805060130212</p>
                    <p><strong>Warranty Status:</strong> Expired</p>
                    <p><strong>Warranty Start Date:</strong> 11 October 2015</p>
                    <p><strong>Device Age:</strong> 8 Years, 6 Months, 4 Days</p>
                    <p><strong>Boot Loader Code:</strong> 6EA1A4A60CCF0E21</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Toast Notification -->
    <div aria-live="polite" aria-atomic="true" style="position: relative;">
        <div class="toast" id="copyToast" style="position: fixed; top: 20px; right: 20px;" data-delay="3000">
            <div class="toast-header">
                <strong class="mr-auto">Notification</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body" id="toastMessage">
                <!-- Message will be set by JavaScript -->
            </div>
        </div>
    </div>

    <!-- JavaScript for Copying Text to Clipboard and Showing Toast -->
    <script>
        document.getElementById('copyButton').addEventListener('click', function() {
            // Select the text inside the <pre> tag
            var imeiDetails = document.getElementById('imeiDetails');
            var range = document.createRange();
            range.selectNodeContents(imeiDetails);
            var selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);

            // Copy the text to clipboard
            var success = false;
            try {
                success = document.execCommand('copy');
            } catch (err) {
                success = false;
            }

            // Deselect the text
            selection.removeAllRanges();

            // Show toast notification
            var toastMessage = document.getElementById('toastMessage');
            if (success) {
                toastMessage.textContent = 'IMEI details copied to clipboard!';
            } else {
                toastMessage.textContent = 'Failed to copy text';
            }

            $('#copyToast').toast('show');
        });

        // Check if the selected service is paid and the user is logged in
        document.getElementById('imeiForm').addEventListener('submit', function(event) {
            var serviceSelect = document.getElementById('serviceSelect');
            var selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
            var price = selectedOption.getAttribute('data-price');

            if (price !== '0') { // This means it's a paid service
                // Check if the user is logged in
                var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
                if (!isLoggedIn) {
                    event.preventDefault(); // Prevent form submission
                    $('#loginSignupModal').modal('show'); // Show login/signup modal
                }
            }
        });

        document.querySelectorAll('[data-dismiss="modal"]').forEach(button => {
            button.addEventListener('click', () => {
                $('#loginSignupModal').modal('hide');
            });
        });
    </script>
@endsection
