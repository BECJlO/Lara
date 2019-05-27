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
                    <h3 class="box-title">Data Table {{ $titlePage}}</h3>
                    <a href="{{route('admin.exe-service.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Created task</a>
                </div>
                    <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTB" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Number</th>
                                <th>Price</th>
                                <th>Amount room</th>
                                <th>Category</th>
                                <th>Floor</th>
                                <th>Info</th>
                                <th>Ratinfg</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($rooms as $room)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src='{{asset("source/".$room->images->first()->image_url)}}' height="100px"></td>
                                    <td>{{$room->room_num}}</td>
                                    <td>{{$room->room_price}}</td>
                                    <td>{{$room->room_amountRoom}}</td>
                                    <td>{{$room->room_category}}</td>
                                    <td>{{$room->room_floor}}</td>
                                    <td>{{$room->room_info}}</td>
                                    <td>{{$room->room_rating}}</td>
                                    <td>{{$room->room_status}}</td>
                                    <td>
                                        <a href="{{route('admin.room.edit', ['id'=>$room->room_id])}}" class="col-6"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.room.destroy', ['id' =>$room->room_id])}}" class="col-6"><i class="fa fa-remove"></i></a>
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
                                <th>Service</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>ExeTask</th>
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