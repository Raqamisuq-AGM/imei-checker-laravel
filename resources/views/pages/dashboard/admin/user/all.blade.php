@extends('layout.dashboard.admin.dashboard')
@section('title')
    Users
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
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
                                        <th>Phone</th>
                                        <th>IMEI Checked</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($items->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center">No data found</td>
                                        </tr>
                                    @else
                                        @foreach ($items as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->imeis_count }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
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
                                                @if ($page == $user->currentPage())
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
@endsection
