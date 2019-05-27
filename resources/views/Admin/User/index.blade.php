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
                                <th>Name</th>
                                <th>Middle name</th>
                                <th>Last name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src='{{asset("source/".$user->images->first()->image_url)}}' height="100px"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->user_mid_name}}</td>
                                    <td>{{$user->user_last_name}}</td>
                                    <td>{{$user->tel_user}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('admin.user.edit', ['id'=>$user->id])}}" class="col-6"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.user.destroy', ['id'=>$user->id])}}" class="col-6"><i class="fa fa-remove"></i></a>
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Middle name</th>
                                <th>Last name</th>
                                <th>Phone</th>
                                <th>Email</th>
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