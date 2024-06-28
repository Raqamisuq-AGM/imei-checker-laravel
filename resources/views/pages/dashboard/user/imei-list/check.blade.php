@extends('layout.dashboard.user.dashboard')
@section('title')
    IMEI Checker
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">IMEI Checker</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('imei.checking') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control mob-select custom-select" placeholder="Select Services"
                                        name="service_id" required>
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
                                <div class="form-group">
                                    <label for="imei">IMEI</label>
                                    <input type="text" class="form-control" id="imei" name="imei"
                                        placeholder="IMEI No" value="{{ old('imei') }}" required />
                                    @if ($errors->has('imei'))
                                        <span class="text-danger">{{ $errors->first('imei') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('script')
    <!-- jQuery -->
    <script src="{{ asset('asset/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset/dashboard/dist/js/adminlte.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('asset/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset('asset/dashboard/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('asset/dashboard/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('asset/dashboard/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('asset/dashboard/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <script src="{{ asset('asset/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('asset/dashboard/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
