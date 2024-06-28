@extends('layout.frontend.frontend')
@section('title')
    IMIE Checker
@endsection
@section('content')
    <div class="container ">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh">
            <div class="col-md-8">
                <h1>You are out of credits, Please buy credit</h1>
                <section class="pricing py-5" id="pricing-sec" style="background: transparent;">
                    <div class="container">
                        <div class="row">
                            <!-- Free Tier -->
                            <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <hr />
                                        <ul class="fa-ul">
                                            <li>10 Credits / $1</li>
                                        </ul>
                                        <div class="d-grid">
                                            <a href="{{ route('checkout', ['type' => 'advanced']) }}"
                                                class="btn btn-primary text-uppercase">Buy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Plus Tier -->
                            <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <hr />
                                        <ul class="fa-ul">
                                            <li>30 Credits / $3</li>
                                        </ul>
                                        <div class="d-grid">
                                            <a href="{{ route('checkout', ['type' => 'advanced']) }}"
                                                class="btn btn-primary text-uppercase">Buy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pro Tier -->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <hr />
                                        <ul class="fa-ul">
                                            <li>50 Credits / $5</li>
                                        </ul>
                                        <div class="d-grid">
                                            <a href="{{ route('checkout', ['type' => 'advanced']) }}"
                                                class="btn btn-primary text-uppercase">Buy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
