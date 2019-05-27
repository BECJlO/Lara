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
                    <h3 class="box-title">Data Table Tasks</h3>
                    <a href="{{route('admin.index')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Created task</a>
                </div>
                    <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTB" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Worker category</th>
                                <th>Service</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($tasks as $task)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$task->task_desc}}</td>
                                    <td>{{$task->worker_category}}</td>
                                    <td>{{$task->service->service_name}}
                                    <td>
                                        <a href="{{route('admin.task.edit', ['id'=>$task->taks_id])}}" class="col-6"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.task.destroy', ['id' =>$task->taks_id])}}" class="col-6"><i class="fa fa-remove"></i></a>
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
                        <th>Description</th>
                        <th>Worker category</th>
                        <th>Service</th>
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