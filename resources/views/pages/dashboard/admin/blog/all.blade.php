@extends('layout.dashboard.admin.dashboard')
@section('title')
    Blogs
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Blogs</h1>
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
                                        <th>Thumb</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @if (!empty($item->thumb))
                                                    <img src="{{ asset($item->thumb) }}" alt="{{ $item->title }}"
                                                        style="width: 80px; height: 50px;">
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                <a href="{{ route('admin.blog.edit', ['id' => $item->id]) }}"
                                                    style="margin-right: 15px; color: #0c4b36;">
                                                    <i class="fas fa-pen" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.blog.delete', ['id' => $item->id]) }}"
                                                    style="color: #0c4b36;">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No blogs found</td>
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
