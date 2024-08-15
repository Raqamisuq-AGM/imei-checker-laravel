@extends('layout.frontend.frontend')
@section('title')
    Check IMEI Pro
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh">
            <div class="col-md-8">
                <h1>You are out of credits, Please buy credit</h1>
                <section class="pricing" id="pricing-sec" style="background: transparent;">
                    <div class="container">
                        <form id="fund-form" action="{{ route('buy.credit.fund') }}" method="post">
                            @csrf
                            <label for="fund-amount">Enter amount $5 - $500</label>
                            <input type="text" name="fund-amount" id="fund-amount" class="form-control" required>
                            <div id="error-message" style="color: red; display: none;">Please enter an amount between $5 and
                                $500.</div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Add Fund</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        document.getElementById('fund-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const fundAmount = parseFloat(document.getElementById('fund-amount').value);
            const errorMessage = document.getElementById('error-message');

            if (fundAmount >= 5 && fundAmount <= 500) {
                errorMessage.style.display = 'none';
                this.submit(); // Submit the form if validation is successful
            } else {
                errorMessage.style.display = 'block';
            }
        });
    </script>
@endsection
