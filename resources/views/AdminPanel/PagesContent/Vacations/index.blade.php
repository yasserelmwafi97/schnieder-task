@extends('AdminPanel.layouts.main')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Home</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @include('AdminPanel.layouts.messages')
    <div class="card">

        <div class="card-body">

            <h3 class="card-title float-right">
                <a class="btn btn-warning" href="{{route('createVacation')}}">Create New Request</a>
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            @if(count($vacations) > 0)
                <table id="vacationsTable"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Type</th>
                        <th>Number Of Days</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vacations as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->start_date}}</td>
                            <td>{{$row->end_date}}</td>
                            <td>{{$row->type}}</td>
                            <td>{{$row->number_of_days}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Type</th>
                        <th>Number Of Days</th>
                    </tr>
                    </tfoot>
                </table>
            @else
                <h1 class="text-center">لا يوجد بيانات</h1>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
@endsection
