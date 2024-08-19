@extends('layout.dashboard.user.dashboard')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $checked }}</h3>

                            <p>IMEI Checked</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-th"></i>
                        </div>
                        <a href="{{ route('dashboard.imei.all') }}" class="small-box-footer">view <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>${{ $credit }}</h3>

                            <p>Funds</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-user"></i>
                        </div>
                        <a href="{{ route('buy.credit') }}" class="small-box-footer">Buy more <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                {{-- <div class="col-lg-4 col-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $limit }}</h3>

                            <p>Daily Limits</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-th"></i>
                        </div>
                        <a href="#" class="small-box-footer">view <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> --}}
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="d-flex justify-content-between mb-3">
                <h3>Latest IMEI results</h3>
                <a href="{{ route('dashboard.imei.all') }}" class="btn btn-primary">See all</a>
            </div>

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
