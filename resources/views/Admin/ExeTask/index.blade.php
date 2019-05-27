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
                    <a href="{{route('admin.index')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Created task</a>
                </div>
                    <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTB" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task</th>
                                <th>Exe. service</th>
                                <th>Worker</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($exeTasks as $exeTask)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('admin.task.show',['service'=>$exeTask->task->task_id])}}">{{$exeTask->task->task_id}}</a></td>
                                    <td><a href="{{route('admin.exe-service.show',['service'=>$exeTask->exeService->exe_service_id])}}">{{$exeTask->exeService->service->service_name}}</a></td>
                                    <td><a href="{{route('admin.worker.show',['service'=>$exeTask->worker->worker_id])}}">{{$exeTask->worker->user->name}}</a></td>
                                    <td>{{$exeTask->exe_task_status}}
                                    <td>
                                        <a href="{{route('admin.exe-task.edit', ['id'=>$exeTask->exe_task_id])}}" class="col-6"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.exe-task.destroy', ['id' =>$exeTask->exe_task_id])}}" class="col-6"><i class="fa fa-remove"></i></a>
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
                            <th>Task</th>
                            <th>Exe. service</th>
                            <th>Worker</th>
                            <th>Status</th>
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