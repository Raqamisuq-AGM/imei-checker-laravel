@extends('layout.dashboard.admin.dashboard')
@section('title')
    Contact Messages
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="pagetitle">
        <h1>Contact Messages</h1>
        <nav>
            <ol class="breadcrumb" style="background-color: transparent">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact Messages</li>
            </ol>
        </nav>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="section dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-sortable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>
                                                <a href="#" style="margin-right: 15px; color: #0c4b36;"
                                                    data-toggle="modal" data-target="#viewModal"
                                                    data-name="{{ $item->name }}" data-email="{{ $item->email }}"
                                                    data-subject="{{ $item->subject }}" data-message="{{ $item->message }}">
                                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No message found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if ($items->lastPage() > 1)
                                <!-- Render pagination with page numbers -->
                                <div class="pagination-wrap mt-40">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination list-wrap" style="float: right;">
                                            <!-- Previous Page Link -->
                                            @if ($items->onFirstPage())
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">@lang('lang.previous')</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $items->previousPageUrl() }}"
                                                        rel="prev">@lang('lang.previous')</a>
                                                </li>
                                            @endif

                                            <!-- Page links -->
                                            @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                                                @if ($page == $items->currentPage())
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">{{ $page }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            <!-- Next Page Link -->
                                            @if ($items->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $items->nextPageUrl() }}"
                                                        rel="next">@lang('lang.next')</a>
                                                </li>
                                            @else
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">@lang('lang.next')</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Contact Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <span id="modalName"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Subject:</strong> <span id="modalSubject"></span></p>
                    <p><strong>Message:</strong>
                    <p id="modalMessage"></p>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#viewModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var name = button.data('name')
                var email = button.data('email')
                var subject = button.data('subject')
                var message = button.data('message')

                var modal = $(this)
                modal.find('#modalName').text(name)
                modal.find('#modalEmail').text(email)
                modal.find('#modalSubject').text(subject)
                modal.find('#modalMessage').text(message)
            })
        })
    </script>
@endsection
