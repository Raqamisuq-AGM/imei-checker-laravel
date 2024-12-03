@extends('layout.frontend.frontend')
@section('title')
    ICHECKIMEIPRO - Free IMEI Number Checker Online
@endsection
@section('content')
    <!-- Hero Section -->
    <div class="py-md-32 position-relative">
        <div class="container-lg max-w-screen-xl">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 ms-auto d-none d-lg-block">
                    <div class="mb-5 mb-lg-0 w-11/10 position-relative">
                        <!-- Illustration -->
                        <div class="svg-fluid position-relative overlap-10">
                            <svg id="ab47acfe-844d-4101-aa7b-df38aa50dbe4" data-name="Layer 1"
                                xmlns="http://www.w3.org/2000/svg" width="971.0518" height="628.38145"
                                viewBox="0 0 971.0518 628.38145" style="width: 100%">
                                <path
                                    d="M847.93141,636.215h0a249.62642,249.62642,0,0,1-2.09461-54.11121l2.09461-29.88879h0c-11.54175,22.96552-8.93335,53.1922,0,83.99994Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#cacaca" />
                                <path
                                    d="M856.93141,641.215h0a183.49726,183.49726,0,0,1-1.00781-32.209l1.00781-17.791h0C851.37831,604.885,852.63331,622.877,856.93141,641.215Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#cacaca" />
                                <path
                                    d="M896.93606,663.21738v10a3.01557,3.01557,0,0,1-3,3h-5a.99647.99647,0,0,0-1,1v82a3.01557,3.01557,0,0,1-3,3h-61a3.0023,3.0023,0,0,1-3-3v-82a1.003,1.003,0,0,0-1-1h-6a3.0023,3.0023,0,0,1-3-3v-10a2.99585,2.99585,0,0,1,3-3h80A3.009,3.009,0,0,1,896.93606,663.21738Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#f2f2f2" />
                                <rect x="706.5518" y="542.50808" width="67" height="3" fill="#e6e6e6" />
                                <path
                                    d="M887.93606,722.46217c-22.41974,9.27794-45.084,9.38019-68,0V701.327a106.78989,106.78989,0,0,1,68,0Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#e6e6e6" />
                                <circle cx="451.48125" cy="213.98538" r="36.39575" fill="#2f2e41" />
                                <path
                                    d="M576.09529,314.40075a36.40078,36.40078,0,0,1,32.03936,53.66882,36.38707,36.38707,0,1,0-60.4544-39.98248A36.306,36.306,0,0,1,576.09529,314.40075Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#2f2e41" />
                                <circle cx="383.4705" cy="106.99576" r="106.91249" fill="#2f2e41" />
                                <path
                                    d="M414.03572,176.47092A106.89327,106.89327,0,0,1,562.20289,165.261c-.87427-.83106-1.73926-1.66886-2.6477-2.47643a106.91251,106.91251,0,0,0-142.0661,159.80724c.90844.80758,1.84179,1.56848,2.76953,2.33935A106.89336,106.89336,0,0,1,414.03572,176.47092Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#2f2e41" />
                                <circle cx="382.5645" cy="144.14332" r="68.85889" fill="#ffb8b8" />
                                <path
                                    d="M532.21437,367.50466l-73.68847,3.31269s6.15038,38.10812-33.71528,41.73229-76.10721-7.24829-90.60382,19.93283-8.24829,123.96607-8.24829,123.96607,27.18115,97.85211,48.92605,112.34875,212.01291-5.43622,212.01291-5.43622L666.5259,562.81735l-2.697-77.53951c-1.40839-40.49105-38.37693-70.89154-78.1935-63.39829q-1.17287.22073-2.36205.47539s-8.74743-6.53759-32.74743-18.53759C535.8492,396.479,532.21437,367.50466,532.21437,367.50466Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#cacaca" />
                                <path
                                    d="M372.26039,410.73757s17.5138,31.77787,10.26551,77.07978,23.164,141.11428,23.164,141.11428l21.74494-5.43622s-14.49662-94.228-10.87244-115.9729,4.62414-85.91251-13.49661-96.78494S372.26039,410.73757,372.26039,410.73757Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#2f2e41" />
                                <path
                                    d="M581.99873,427.39977l7.61682,200.62579,14.49658,9.06037s20.83887-220.16727,9.96643-220.16727H591.95607a9.97041,9.97041,0,0,0-9.9704,9.97043Q581.98567,427.14457,581.99873,427.39977Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#2f2e41" />
                                <circle cx="301.18217" cy="479.53178" r="9.06039" fill="#6c63ff" />
                                <circle cx="482.38982" cy="488.59217" r="9.06038" fill="#6c63ff" />
                                <polygon
                                    points="323.672 58.069 323.672 126.928 339.619 126.928 359.914 105.183 357.196 126.928 427.685 126.928 423.336 105.183 432.034 126.928 443.269 126.928 443.269 58.069 323.672 58.069"
                                    fill="#2f2e41" />
                                <ellipse cx="312.79955" cy="129.6467" rx="5.43622" ry="9.96642" fill="#ffb8b8" />
                                <ellipse cx="452.32945" cy="129.6467" rx="5.43622" ry="9.96642" fill="#ffb8b8" />
                                <path
                                    d="M717.62587,744.25542v6.07a13.34036,13.34036,0,0,1-.91,4.87,13.68347,13.68347,0,0,1-.97,2,13.4372,13.4372,0,0,1-11.55,6.56h-446.55a13.43737,13.43737,0,0,1-11.55-6.56,13.68965,13.68965,0,0,1-.97-2,13.34125,13.34125,0,0,1-.91-4.87v-6.07a13.42638,13.42638,0,0,1,13.42282-13.43h25.74717v-2.83a.55906.55906,0,0,1,.55816-.56h13.43183a.5591.5591,0,0,1,.56.55817v2.83185h8.39v-2.83a.55906.55906,0,0,1,.55816-.56h13.43183a.5591.5591,0,0,1,.56.55817v2.83185h8.4v-2.83a.55906.55906,0,0,1,.55817-.56h13.43182a.5591.5591,0,0,1,.56.55817v2.83185h8.39v-2.83a.55906.55906,0,0,1,.55817-.56h13.43182a.5591.5591,0,0,1,.56.55817v2.83185h8.39v-2.83a.55907.55907,0,0,1,.55817-.56h13.43182a.5591.5591,0,0,1,.56.55817v2.83185h8.4v-2.83a.55906.55906,0,0,1,.55816-.56h13.43183a.5591.5591,0,0,1,.56.55817v2.83185h8.39v-2.83a.55908.55908,0,0,1,.55817-.56H526.80586a.55908.55908,0,0,1,.56.55817v2.83185h8.4v-2.83a.55908.55908,0,0,1,.55817-.56h13.43182a.5655.5655,0,0,1,.56.56v2.83h8.39v-2.83a.55908.55908,0,0,1,.55817-.56h13.43182a.55908.55908,0,0,1,.56.55817v2.83185h8.39v-2.83a.55908.55908,0,0,1,.55816-.56h13.43183a.55908.55908,0,0,1,.56.55817v2.83185h8.4v-2.83a.55908.55908,0,0,1,.55816-.56h13.43183a.557.557,0,0,1,.55.56v2.83h8.4v-2.83a.55908.55908,0,0,1,.55817-.56h13.43182a.55908.55908,0,0,1,.56.55817v2.83185h8.39v-2.83a.55908.55908,0,0,1,.55817-.56h13.43182a.55908.55908,0,0,1,.56.55817v2.83185h39.17a13.42639,13.42639,0,0,1,13.43,13.42273Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#3f3d56" />
                                <rect y="626.38145" width="971.0518" height="2" fill="#3f3d56" />
                                <path
                                    d="M681.66835,488.62124H272.6248a11.2586,11.2586,0,0,0-11.25861,11.2586V727.79131A11.25867,11.25867,0,0,0,272.62477,739.05H681.66835a11.25866,11.25866,0,0,0,11.2586-11.25867V499.87984a11.2586,11.2586,0,0,0-11.2586-11.2586Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#3f3d56" />
                                <circle cx="362.99998" cy="432.38142" r="25" fill="#6c63ff" />
                                <polygon
                                    points="517.763 267.219 643.969 140.016 703.552 140.016 703.552 138.016 643.134 138.016 642.841 138.313 516.341 265.813 517.763 267.219"
                                    fill="#3f3d56" />
                                <rect x="776.32793" y="87.79227" width="146.22388" height="13.02985" fill="#6c63ff" />
                                <path
                                    d="M872.981,244.87035H842.02589V213.91478H872.981Zm-28.95508-2H870.981V215.91478H844.02589Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#3f3d56" />
                                <rect x="776.32793" y="131.2251" width="146.22388" height="13.02985" fill="#6c63ff" />
                                <path
                                    d="M872.981,288.303H842.02589V257.34789H872.981Zm-28.95508-2H870.981V259.34789H844.02589Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#3f3d56" />
                                <rect x="776.32793" y="174.65794" width="146.22388" height="13.02985" fill="#6c63ff" />
                                <path
                                    d="M872.981,331.73558H842.02589V300.78051H872.981Zm-28.95508-2H870.981V302.78051H844.02589Z"
                                    transform="translate(-114.4741 -135.80928)" fill="#3f3d56" />
                            </svg>
                        </div>
                        <!-- Decorations -->
                        <div
                            class="position-absolute bottom-0 start-72 h-64 w-64 mt-n4 transform translate-y-n1/2 translate-x-n1/2 gradient-bottom-right start-purple-400 end-cyan-500 filter blur-100 rounded-4 p-5">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-md-0">
                    <!-- Surtitle -->
                    <h5 class="h5 mb-5 text-uppercase text-warning mb-5">
                        IMEI Check Services
                    </h5>
                    <!-- Text -->
                    <p class="lead mb-10">
                        Check IMEI Pro offers a variety of IMEI Check Services providing
                        all the information about your device, fast and accessible!
                    </p>
                    <!-- Buttons -->
                    <div class="mx-n2">
                        <a href="{{ route('imei-check') }}" class="btn btn-lg btn-primary shadow-sm mx-2 px-lg-8">
                            Check IMEI
                        </a>
                        {{-- <a href="#pricing-sec" class="btn btn-lg btn-neutral mx-2 px-lg-8">
                            Pricing
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Universal Imei Check Section --}}
    <section>
        <div class="container-xl">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12">
                    <p style="font-size: 25px; font-weight: 600;">
                        Universal Model Check Free
                    </p>
                    <form id="imeiForm" action="{{ route('imei-check-uni') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Show
                            Example</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Section -->
    <section id="counter" class="sec-padding">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-3">
                    <div class="count">
                        <span class="fa fa-smile-o"></span>
                        <p class="number">{{ $counts['total'] }}</p>
                        <h4>Checked Total</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="count">
                        <span class="fa fa-smile-o"></span>
                        <p class="number">{{ $counts['this_month'] }}</p>
                        <h4>Checked this month</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="count">
                        <span class="fa fa-smile-o"></span>
                        <p class="number">{{ $counts['this_week'] }}</p>
                        <h4>Checked this week</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="count">
                        <span class="fa fa-smile-o"></span>
                        <p class="number">{{ $counts['today'] }}</p>
                        <h4>Checked today</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section -->
    {{-- <div class="bg-light py-5 service-1">
        <div class="container">
            <!-- Row  -->
            <div class="row">
                <!-- Column -->
                <div class="col-md-4 wrap-service1-box">
                    <div class="card border-0 card-shadow mb-4">
                        <div class="card-body text-center">
                            <div class="my-3">
                                <img src="https://imeicheck.com/front/images/php-icon1.svg" alt="wrapkit" />
                            </div>
                            <h6 class="font-weight-medium">DHRU and PHP APIs</h6>
                            <p class="mt-3">
                                We offer two different APIs for DHRU Fusion and for PHP
                                JSON, allowing businesses to easy integrate our services
                                into their offerings.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-4 wrap-service1-box">
                    <div class="card border-0 card-shadow mb-4">
                        <div class="card-body text-center">
                            <div class="my-3">
                                <img src="https://imeicheck.com/front/images/php-icon1.svg" alt="wrapkit" />
                            </div>
                            <h6 class="font-weight-medium">Instant Check Services</h6>
                            <p class="mt-3">
                                All or our IMEI Check Services are delivered instantly, so
                                you get the information you need in only a FEW SECONDS.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-4 wrap-service1-box">
                    <div class="card border-0 card-shadow mb-4">
                        <div class="card-body text-center">
                            <div class="my-3">
                                <img src="https://imeicheck.com/front/images/php-icon3.svg" alt="wrapkit" />
                            </div>
                            <h6 class="font-weight-medium">Absolutely Safe!</h6>
                            <p class="mt-3">
                                Our services are completely safe, so there's no risk of
                                damaging your phone, as they don't involve downloading any
                                software.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Pricing Section -->
    {{-- <section class="pricing py-5" id="pricing-sec">
        <div class="container">
            <div class="row">
                <!-- Free Tier -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">
                                GENERIC CHECK SERVICES
                            </h5>
                            <hr />
                            <ul class="fa-ul">
                                <li>Samsung IMEI Check $0.05</li>
                                <li>Huawei IMEI Check $0.05</li>
                                <li>Blacklist PRO (GSMA) (all brands) $0.05</li>
                            </ul>
                            <div class="d-grid">
                                <a href="#" class="btn btn-primary text-uppercase">Button</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Plus Tier -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">
                                APPLE CHECK SERVICES
                            </h5>
                            <hr />
                            <ul class="fa-ul">
                                <li>Samsung IMEI Check $0.05</li>
                                <li>Huawei IMEI Check $0.05</li>
                                <li>Blacklist PRO (GSMA) (all brands) $0.05</li>
                            </ul>
                            <div class="d-grid">
                                <a href="#" class="btn btn-primary text-uppercase">Button</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pro Tier -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">
                                UNLOCK IMEI SERVICES
                            </h5>
                            <hr />
                            <ul class="fa-ul">
                                <li>Samsung IMEI Check $0.05</li>
                                <li>Huawei IMEI Check $0.05</li>
                                <li>Blacklist PRO (GSMA) (all brands) $0.05</li>
                            </ul>
                            <div class="d-grid">
                                <a href="#" class="btn btn-primary text-uppercase">Button</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- Tags Section --}}
    <section class="ftco-section" style="padding: 2.5rem">
        <div class="container-xl">
            <p style="font-weight: 600; font-size: 18px;">
                Check IMEI Number and Verify the authenticity of your devices with our Premium IMEI Checker. Get instant and
                real-time information of your device's Status ! All Brands & Devices are supported, including Apple | iPhone
                | Samsung | OnePlus | Xiaomi and many more !
            </p>

            <p>
                <a href="https://icheckimeipro.info/imei-check">Check imei</a>,
                <a href="https://icheckimeipro.info/imei-check">Check IMEI for FREE</a>,
                <a href="https://icheckimeipro.info/imei-check">Check FMI</a>,
                <a href="https://icheckimeipro.info/imei-check">Check IMEI Number</a>,
                <a href="https://icheckimeipro.info/imei-check">Check hardware specification</a>,
                <a href="https://icheckimeipro.info/imei-check">Check warranty</a>,
                <a href="https://icheckimeipro.info/imei-check">Check BLACKLIST status</a>,
                <a href="https://icheckimeipro.info/imei-check">Check SimLock</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Model</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Specs</a>,
                <a href="https://icheckimeipro.info/imei-check">Check IMEI</a>,
                <a href="https://icheckimeipro.info/imei-check">Check MEID</a>,
                <a href="https://icheckimeipro.info/imei-check">Check SERIAL Number</a>,
                <a href="https://icheckimeipro.info/imei-check">Check ESN Number</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Free IMEI/Serial Numbers for all Apple devices</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Capacity</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Colour</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Serial Number</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Replaced Status</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Warranty Coverage</a>,
                <a href="https://icheckimeipro.info/imei-check">Check Find My iPhone Status</a>,
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="ftco-section" id="contact-us" style="padding: 2.5rem">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Contact Us</h2>
                </div>
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
                                                    <input type="submit" value="Send Message" class="btn btn-primary" />
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
                                                <a href="mailto:contact@icheckimeipro.info">contact@icheckimeipro.info</a>
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
    <!-- Blog Section -->
    <section class="blog-listing gray-bg">
        <div class="container-xl">
            <div class="row align-items-start">
                <div class="col-lg-12 m-15px-tb">
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-sm-4">
                                <div class="blog-grid">
                                    <div class="blog-img">
                                        <div class="date">
                                            <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</span>
                                            <label>{{ \Carbon\Carbon::parse($item->created_at)->format('M') }}</label>
                                        </div>
                                        <a href="#">
                                            <img src="{{ asset($item->thumb) }}" title="{{ $item->title }}"
                                                alt="{{ $item->title }}" />
                                        </a>
                                    </div>
                                    <div class="blog-info">
                                        <h5>
                                            <a
                                                href="{{ route('blog.detail', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                        </h5>
                                        {{-- <p class="blog-desc-short">
                                            {!! $item->description !!}</p> --}}
                                        <div class="btn-bar">
                                            <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}"
                                                class="px-btn-arrow">
                                                <span>Read More</span>
                                                <i class="arrow"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

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
@endsection


@section('script')
    <style>
        .blog-desc-short {
            font-size: 1.4rem;
            line-height: 2rem;
            font-weight: 500;
            overflow: hidden;
            display: block;
            max-height: 4rem;
            -webkit-line-clamp: 2;
            display: box;
            display:
                -webkit-box;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            white-space:
                normal;
        }
    </style>

    <!-- Optional: Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
    </script>
@endsection
