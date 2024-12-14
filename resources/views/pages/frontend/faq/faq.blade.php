@extends('layout.frontend.frontend')
@section('title')
    FAQ | Check IMEI Pro
@endsection

@section('content')
    <section class="blog-listing gray-bg">
        <div class="container-lg">
            <center>
                <h2 style="font-size: 50px; font-weight: bold;">FAQ</h2>
            </center>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        # What is an IMEI number?
                        <span class="arrow open">▶</span>
                    </div>
                    <div class="faq-answer open">
                        An IMEI (International Mobile Equipment Identity) number is a unique 15-digit code assigned to each
                        mobile phone. It serves as an identifier for mobile devices, similar to an Electronic Serial Number
                        (ESN). By using the IMEI number, you can access various details about your smartphone, including its
                        blacklist status.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        #Where can I find my device's IMEI number?
                        <span class="arrow">▶</span>
                    </div>
                    <div class="faq-answer">
                        To locate your device's IMEI, ESN, or serial number, you can use these methods:

                        Dial *#06# on your phone, and the IMEI number will appear on the screen.
                        The IMEI number is typically printed on the original packaging of your phone.
                        It can also be found on the back case, SIM card tray, or inside the battery compartment of your
                        device.

                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        #What information can I check on icheckimeipro.info?
                        <span class="arrow">▶</span>
                    </div>
                    <div class="faq-answer">
                        Our IMEI checker is compatible with all phone models and manufacturers. The primary feature of our
                        service is checking the global IMEI blacklist. Additionally, you can access other critical details
                        about your device, such as Find My iPhone and iCloud status for Apple devices.

                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        #Why should I check the IMEI number in the blacklist?
                        <span class="arrow">▶</span>
                    </div>
                    <div class="faq-answer">
                        We highly recommend using our IMEI checker when purchasing a used smartphone to avoid complications
                        with devices that have been reported lost or stolen. A phone with a blacklisted IMEI is blocked by
                        mobile operators, rendering it unusable. Additionally, if you're buying an iPhone, don't forget to
                        verify the iCloud and Find My iPhone statuses.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        #What does it mean if the IMEI number is blacklisted?
                        <span class="arrow">▶</span>
                    </div>
                    <div class="faq-answer">
                        If a phone's IMEI is blacklisted, it indicates that the device was reported as lost or stolen and
                        its IMEI has been added to the international blacklist. Phones with blacklisted IMEIs are often
                        blocked by most mobile carriers and cannot be used. Always check the IMEI before purchasing a used
                        device to avoid buying a phone with a barred IMEI or ESN.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        #What should I do if my phone was lost or stolen?
                        <span class="arrow">▶</span>
                    </div>
                    <div class="faq-answer">
                        If your phone has been lost or stolen, take the following actions immediately:
                        <ul>
                            <li>Report the theft to your mobile provider.
                                Your carrier will block the stolen SIM card to suspend all phone services such as calls,
                                internet, and text messaging.
                            </li>
                            <li>File a report with the police.
                                Law enforcement may ask for proof of purchase and the IMEI or serial number of the phone.
                            </li>
                            <li>Submit a claim to IMEIpro to blacklist your IMEI.
                                By submitting your phone’s details, you can report it as lost or stolen in the IMEIpro
                                global blacklist database.
                            </li>
                            <li>Additionally, attempt to locate your phone and erase any personal data using the
                                manufacturer's "Find My Phone" tool (e.g., Find My iPhone for Apple devices or Android
                                Device Manager for Android phones).</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        .faq-container {
            width: 100%;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .faq-item {
            border-bottom: 1px solid #e9ecef;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            padding: 20px;
            font-size: 16px;
            font-weight: 500;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            background-color: #f1f3f5;
            transition: background-color 0.3s ease;
        }

        .faq-question:hover {
            background-color: #e9ecef;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            padding: 0 20px;
            background-color: #ffffff;
            color: #6c757d;
            font-size: 14px;
            line-height: 1.6;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-answer.open {
            max-height: 200px;
            /* Adjust for longer answers */
            padding: 15px 20px;
        }

        .arrow {
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .arrow.open {
            transform: rotate(90deg);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .faq-question {
                font-size: 14px;
                padding: 15px;
            }

            .faq-answer {
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .faq-container {
                max-width: 90%;
            }
        }
    </style>
@endsection

@section('script')
    <script>
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');
            const arrow = item.querySelector('.arrow');

            question.addEventListener('click', () => {
                const isOpen = answer.classList.contains('open');

                // Close all open answers
                document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
                document.querySelectorAll('.arrow').forEach(a => a.classList.remove('open'));

                // Toggle current item
                if (!isOpen) {
                    answer.classList.add('open');
                    arrow.classList.add('open');
                }
            });
        });
    </script>
@endsection
