@extends('layout.dashboard.user.dashboard')
@section('title')
    IMEI Results
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="pagetitle">
        <h1>IMEI Check Results</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item active">IMEI Results</li>
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
                                        <th>IMEI</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($items->isEmpty())
                                        <tr>
                                            <td colspan="3" class="text-center">No IMEI checked yet</td>
                                        </tr>
                                    @else
                                        @foreach ($items as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->imei }}</td>
                                                <td>
                                                    @php
                                                        $result = json_decode($item->result, true);
                                                    @endphp
                                                    @if (isset($result['image']))
                                                        <div class="image">
                                                            {!! $result['image'] !!}
                                                        </div>
                                                    @endif
                                                    @if (isset($result['thumbnail']))
                                                        <div class="image">
                                                            <img src="{!! $result['thumbnail'] !!}" alt=""
                                                                style="width: 300px;">
                                                        </div>
                                                    @endif
                                                    @if ($result)
                                                        @foreach ($result as $key => $value)
                                                            @if ($key != 'image' && $key != 'thumbnail')
                                                                <ul>
                                                                    <li>
                                                                        <strong>{{ ucfirst($key) }}:</strong>
                                                                        @if (is_bool($value))
                                                                            <span style="color: red;">
                                                                                {{ $value ? 'Yes' : 'No' }}
                                                                            </span>
                                                                        @elseif (is_null($value) || $value === '')
                                                                            <span style="color: red;">
                                                                                Not found
                                                                            </span>
                                                                        @else
                                                                            {{ $value }}
                                                                        @endif
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p>No additional details available.</p>
                                                    @endif
                                                </td>
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
                                                    <span class="page-link">prev</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $items->previousPageUrl() }}"
                                                        rel="prev">prev</a>
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
                                                        rel="next">next</a>
                                                </li>
                                            @else
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">next</span>
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
