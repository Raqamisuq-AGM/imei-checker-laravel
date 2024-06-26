@extends('layout.dashboard.admin.dashboard')
@section('title')
    Change Email
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
                            <h3 class="card-title">Change Email</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.setting.update-email') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="new_email">New Email</label>
                                    <input type="text" class="form-control" id="new_email" name="new_email"
                                        placeholder="New Email" value="{{ old('new_email') }}" required />
                                    @if ($errors->has('new_email'))
                                        <span class="text-danger">{{ $errors->first('new_email') }}</span>
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
