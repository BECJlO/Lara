@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    @component('components.breadcrumbs')
            @slot('titlePage')
            {{ $titlePage}}
            @endslot
            @slot('addTitlePage')
            {{ $addTitlePage}}
            @endslot
    @endcomponent

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table Orders</h3>
                    <a href="{{route('admin.index')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Created task</a>
                </div>
                    <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTB" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Room</th>
                                <th>Length</th>
                                <th>Paid</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('admin.user.show', ['user'=>$order->user->id])}}">{{$order->user->name}}</a></td>
                                    <td><a href="{{route('admin.room.show', ['room'=>$order->room->room_id])}}">{{$order->room->room_num}}</a></td>
                                    <td>{{$order->order_length}}</td>
                                    <td>{{$order->order_paid}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.order.edit', ['id'=>$order->order_id])}}" class="col-6"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.order.destroy', ['id' =>$order->order_id])}}" class="col-6"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                <td colspan="5" class="text-center"><h2>Empty</h2></td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Room</th>
                            <th>Length</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                    <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
<section>
</div>
</div>
@endsection