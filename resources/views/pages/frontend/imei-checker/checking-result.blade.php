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
                    @if (isset($data['object']['image']))
                        <div class="image">
                            {!! $data['object']['image'] !!}
                        </div>
                    @endif
                    <p><strong>IMEI:</strong> {{ $data['imei'] }}</p>
                    @foreach ($data['object'] as $key => $value)
                        @if ($key != 'image')
                            <p>
                                <strong>{{ ucfirst($key) }}:</strong>
                                @if (is_bool($value))
                                    {{ $value ? 'Yes' : 'No' }}
                                @elseif (is_null($value) || $value === '')
                                    Not found
                                @else
                                    {{ $value }}
                                @endif
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>
                        Check again
                    </strong>
                </p>
                <form action="{{ route('imei.checking') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <select class="form-control mob-select custom-select" placeholder="Select Services" name="service_id"
                            required>
                            <option value="">Please select an Service</option>
                            <option value="39">APPLE FULL INFO [+Carrier] A</option>
                            <option value="19">Apple FULL INFO [+Carrier] B</option>
                            <option value="22">Apple BASIC INFO (PRO) - new</option>
                            <option value="46">MDM Status On/Off (IMEI/SN)- new - working</option>
                            <option value="47">Apple FULL + MDM + GSMA PRO</option>
                            <option value="23">Apple Carrier Check (S2)</option>
                            <option value="20">Apple SimLock Check</option>
                            <option value="4">iCloud Clean/Lost Check</option>
                            <option value="3">Apple FULL INFO [No Carrier]</option>
                            <option value="1">Find My iPhone [ FMI ] (ON/OFF)</option>
                            <option value="2">Warranty + Activation - PRO [IMEI/SN]</option>
                            <option value="6">Blacklist Pro Check (GSMA)</option>
                            <option value="5">Blacklist Status (GSMA)</option>
                            <option value="9">SOLD BY [instant]</option>
                            <option value="13">Model + Color + Storage + FMI</option>
                            <option value="12">GSX Next Tether + iOS (GSX Carrier)</option>
                            <option value="33">Replacement Status (Active Device)</option>
                            <option value="34">Replaced Status (Original Device)</option>
                            <option value="18">iMac FMI Status On/Off</option>
                            <option value="10">IMEI to Model [all brands][IMEI/SN]</option>
                            <option value="11">IMEI to Brand/Model/Name</option>
                            <option value="16">Verizon (ESN) Clean/Lost Status</option>
                            <option value="8">Samsung Info (S1) (IMEI)</option>
                            <option value="37">Samsung Info &amp; KNOX STATUS (S1)</option>
                            <option value="36">Samsung Info (S1) + Blacklist</option>
                            <option value="21">SAMSUNG INFO &amp; KNOX STATUS (S2)</option>
                            <option value="25">XIAOMI MI LOCK &amp; INFO</option>
                            <option value="17">Huawei IMEI Info</option>
                            <option value="15">T-mobile (ESN) PRO Check</option>
                            <option value="27">ONEPLUS IMEI INFO</option>
                            <option value="42">LG IMEI INFO</option>
                            <option value="40">APPLE GSX CASES INFO</option>
                            <option value="43">Apple GSX FULL - INSTANT</option>
                            <option value="44">MDM Status + Config (Pro) Apple All</option>
                            <option value="14">IMEI to SN (Full Convertor)</option>
                            <option value="7">Apple Carrier + SimLock - back-up</option>
                            <option value="50">Apple SERIAL Info(model,size,color)</option>
                            <option value="51">Warranty + Activation [SN ONLY]</option>
                            <option value="52">Model Description (Any Apple SN/IMEI)</option>
                            <option value="54">SOLD BY+ MAC (only iPad/ iWatch)</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter IMEI or Serial"
                            aria-label="IMEI or Serial" name="imei" required />
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit" style="height: 52px;">Check</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
