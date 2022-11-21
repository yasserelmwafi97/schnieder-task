@extends('AdminPanel.layouts.main')
@section('content')

    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @include('AdminPanel.layouts.messages')
                    <table class="table table-hover table-striped">
                        <tbody>
                        <tr>
                            <th>name</th>
                            <td>{{$user->name}}</td>
                        </tr>

                        <tr>
                            <th>email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>balance</th>
                            <td>{{$user->balance}}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
