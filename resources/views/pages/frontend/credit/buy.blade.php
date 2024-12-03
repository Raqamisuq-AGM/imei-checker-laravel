@extends('layout.frontend.frontend')
@section('title')
    Check IMEI Pro
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh">
            <div class="col-md-8">
                <h1>Add fund</h1>

                <section class="pricing" id="pricing-sec" style="background: transparent;">
                    <div class="container">
                        <form id="fund-form" action="{{ route('buy.credit.fund') }}" method="post">
                            @csrf
                            <label for="fund-amount">Enter amount $3 - $500</label>
                            <input type="text" name="fund-amount" id="fund-amount" class="form-control" required>
                            <div id="error-message" style="color: red; display: none;">Please enter an amount between $3 and
                                $500.</div>
                        </form>

                        <div class="accordion mt-5" id="accordionPayment">
                            <!-- Credit card -->
                            <div class="accordion-item mb-3">
                                <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                    <div class="form-check w-100 collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseCC" aria-expanded="false">
                                        <input class="form-check-input" type="radio" name="payment" id="payment1"
                                            checked>
                                        <label class="form-check-label pt-1" for="payment1">
                                            Credit Card
                                        </label>
                                    </div>
                                    <span>
                                        <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                            <!-- SVG icon -->
                                        </svg>
                                    </span>
                                </h2>
                                <div id="collapseCC" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionPayment" style="">
                                    <div class="accordion-body">
                                        <form role="form" action="{{ route('stripe.post') }}" method="post"
                                            class="require-validation" id="payment-form">
                                            @csrf
                                            <input type="hidden" name="stripe_amount" id="stripe_amount">
                                            <button class="btn btn-primary w-100 mt-2 submit-button" id="stripe-pay"
                                                disabled>Add Fund</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- PayPal -->
                            {{-- <div class="accordion-item mb-3 border">
                                <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                    <div class="form-check w-100 collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapsePP" aria-expanded="false">
                                        <input class="form-check-input" type="radio" name="payment" id="payment2">
                                        <label class="form-check-label pt-1" for="payment2">
                                            PayPal
                                        </label>
                                    </div>
                                    <span>
                                        <svg width="103" height="25" xmlns="http://www.w3.org/2000/svg">
                                            <!-- SVG icon -->
                                        </svg>
                                    </span>
                                </h2>
                                <div id="collapsePP" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionPayment">
                                    <div class="accordion-body">
                                        <form role="form" action="{{ route('paypal.post') }}" method="post"
                                            class="require-validation" id="paypal-form">
                                            @csrf
                                            <input type="hidden" name="paypal_amount">
                                            <button class="btn btn-primary w-100 mt-2 submit-button" id="paypal-pay" disabled>Add Fund</button>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        // Get references to the input field and buttons
        const fundAmountInput = document.getElementById('fund-amount');
        const stripe_amount = document.getElementById('stripe_amount');
        const paypal_amount = document.getElementById('paypal_amount');
        const stripeButton = document.getElementById('stripe-pay');
        // const paypalButton = document.getElementById('paypal-pay');
        const errorMessage = document.getElementById('error-message');

        // Function to check the fund amount
        function checkFundAmount() {
            const amount = parseFloat(fundAmountInput.value);

            // Check if the fund amount is valid and within range
            if (amount >= 3 && amount <= 500) {
                // Enable buttons and set the amounts for Stripe and PayPal
                stripeButton.disabled = false;
                // paypalButton.disabled = false;
                stripe_amount.value = amount;
                // paypal_amount.value = amount;
                errorMessage.style.display = 'none'; // Hide error message
            } else {
                // Disable buttons and show error message if invalid
                stripeButton.disabled = true;
                // paypalButton.disabled = true;
                errorMessage.style.display = 'block';
            }
        }

        // Add event listener to input field to trigger the function on input change
        fundAmountInput.addEventListener('input', checkFundAmount);
    </script>
@endsection
