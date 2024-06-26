@extends('layout.dashboard.user.dashboard')
@section('title')
    Change Password
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
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('dashboard.setting.update-password') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password"
                                        placeholder="Old-password" required />
                                    @if ($errors->has('old_password'))
                                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        placeholder="New-password" required />
                                    @if ($errors->has('new_password'))
                                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                        name="new_password_confirmation" placeholder="Confirm-password" required />
                                    @if ($errors->has('new_password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
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
