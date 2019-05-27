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
                                <th>Name</th>
                                <th>Middle name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Tasks</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($workers as $worker)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$worker->user->name}}</td>
                                    <td>{{$worker->user->user_mid_name}}</td>
                                    <td>{{$worker->user->tel_user}}</td>
                                    <td>{{$worker->user->email}}</td>
                                    <td>{{$worker->worker_category}}</td>
                                    <td>{{$worker->worker_status}}</td>
                                    <td>
                                        @if($worker->exeTasks->isNotEmpty())
                                            <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tasks
                                            </button>
                                            <div class="dropdown-menu text-center info">
                                                @foreach($worker->exeTasks as $exeTask)
                                                <a class="dropdown-item text-center" href="{{route('admin.exetask.show', ['task'=> $exeTask->exe_task_id])}}">{{$exeTask->exe_task_id}}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.user.edit', ['id'=>$worker->worker_id])}}" class="col-6"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.user.destroy', ['id'=>$worker->worker_id])}}" class="col-6"><i class="fa fa-remove"></i></a>
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