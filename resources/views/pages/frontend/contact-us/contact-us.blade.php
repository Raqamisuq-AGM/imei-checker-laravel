@extends('layout.frontend.frontend')
@section('title')
    About Us | Check IMEI Pro
@endsection

@section('content')
    <section class="blog-listing gray-bg">
        <div class="container-lg">
            <center>
                <h2 style="font-size: 50px; font-weight: bold;">Contact Us</h2>
            </center>

            <p style="font-size: 20px;">
                Thank you for using our service! The icheckimeipro.info team is always here to assist you. If you have any
                questions or encounter issues with our website, please don’t hesitate to reach out. We welcome all your
                suggestions and feedback.
            </p>

            <p style="font-size: 20px;">
                Feel free to contact us if you’d like to share your expertise, tips, or tricks about mobile technology. Your
                input is invaluable in helping us enhance our IMEI check service.
            </p>

            <section class="ftco-section" id="contact-us" style="padding: 2.5rem; margin-top: 80px">
                <div class="container-xl">
                    <div class="row justify-content-center">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12">
                            <div class="wrapper">
                                <div class="row no-gutters">
                                    <div class="col-md-7 d-flex align-items-stretch">
                                        <div class="contact-wrap w-100 p-md-5 p-4">
                                            <h3 class="mb-4">Get in touch</h3>
                                            <div id="form-message-warning" class="mb-4"></div>
                                            <div id="form-message-success" class="mb-4">
                                                Your message was sent, thank you!
                                            </div>
                                            <form action="{{ route('contactUsSubmit') }}" method="post" id="contactForm"
                                                name="contactForm">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" placeholder="Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="subject"
                                                                id="subject" placeholder="Subject" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="submit" value="Send Message"
                                                                class="btn btn-primary" />
                                                            <div class="submitting"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-5 d-flex align-items-stretch">
                                        <div class="info-wrap bg-primary w-100 p-lg-5 p-4">
                                            <h3 class="mb-4 mt-md-4">Contact us</h3>
                                            {{-- <div class="dbox w-100 d-flex align-items-start">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-map-marker"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p>
                                                        <span>Address:</span> Carrer de marina 294, Barcelona spain
                                                    </p>
                                                </div>
                                            </div> --}}
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-paper-plane"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p>
                                                        <span>Email:</span>
                                                        <a
                                                            href="mailto:contact@icheckimeipro.info">contact@icheckimeipro.info</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-globe"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p>
                                                        <span>Website</span> <a href="#">icheckimeipro.info</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <h2 style="margin-top: 45px;">Thank you for your message! We’ll respond to you as soon as possible.</h2>
        </div>
    </section>
@endsection
