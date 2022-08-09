@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kitchen Panel</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Order Listings</h3>
                        </div>
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <table id="dishes" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Dish Name</th>
                                        <th>Table Number</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->dish->name}}</td>
                                            <td>{{$order->table_id}}</td>
                                            <td>{{$status[$order->status]}}</td>
                                            <td>
                                                <a href="/order/{{$order->id}}/approve" class="btn btn-warning">Approve</a>
                                                <a href="/order/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a>
                                                <a href="/order/{{$order->id}}/ready" class="btn btn-success">Ready</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script>
$(function() {
    $('#dishes').DataTable({
        "paging": true,
        "searching": false,
        "pageLength": 10,
        "lengthChange": false,
        "ordering": true,
        "info": true,
        "autoWidth": true
    })
});
</script>
