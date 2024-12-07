@extends('layout.dashboard.admin.dashboard')
@section('title')
    Dashboard
@endsection
@section('content')

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-xxl-6 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">IMEI Checked</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-card-checklist"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $imeiCount }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $userCount }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section dashboard">
        <div class="container-fluid">
            <h4>Latest IMEI Results</h4>
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
                                        <th>User</th>
                                        <th>User IP</th>
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
                                                    @if ($item->userImeis->name == null)
                                                        Guest User
                                                    @else
                                                        {{ $item->userImeis->name }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->userImeis->ip }}</td>
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
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
