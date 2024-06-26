@extends('layout.frontend.frontend')
@section('title')
    IMIE Checker
@endsection
@section('content')
    <div class="container-fluid hex-background mb-2">
        Your credits end, please buy
        <section class="pricing py-5" id="pricing-sec">
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
                                    <a href="#" class="btn btn-primary text-uppercase">Buy</a>
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
                                    <a href="#" class="btn btn-primary text-uppercase">Buy</a>
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
                                    <a href="#" class="btn btn-primary text-uppercase">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
