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
                    <h3 class="box-title">Data Table Services</h3>
                    <a href="{{route('admin.index')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Created task</a>
                </div>
                    <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTB" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Taks</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($services as $service)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$service->service_name}}</td>
                                    <td>{{$service->service_desc}}</td>
                                    <td>{{$service->service_category}}</td>
                                    <td>{{$service->service_price}}</td>
                                    <td>
                                        @if($service->tasks->isNotEmpty())
                                            <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tasks
                                            </button>
                                            <div class="dropdown-menu text-center info">
                                                @foreach($service->tasks as $task)
                                                <a class="dropdown-item text-center" href="{{route('admin.task.show', ['task'=> $task->task_id])}}">{{$task->task_id}}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                        <div class="col"><a href="{{route('admin.service.edit', $service->service_id)}}" class="btn btn-default">Edit</a></div>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.service.destroy', $service->service_id],'onsubmit' => 'return confirm("Are you sure?")', 'class'=> 'col']) !!}
                                        {!! Form::submit('Delete',array('class' => 'btn btn-danger')) !!}
                                        {!! Form::close() !!}
                                        </div>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Taks</th>
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