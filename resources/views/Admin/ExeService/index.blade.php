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
                                <th>Service</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>ExeTask</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($exeServices as $exeServ)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('admin.service.show',['service'=>$exeServ->service->service_id])}}">{{$exeServ->service->service_name}}</a></td>
                                    <td><a href="{{route('admin.order.show',['order'=>$exeServ->order->order_id])}}">{{$exeServ->order->order_id}}</a></td>
                                    <td>{{$exeServ->exe_service_status}}</td>
                                    <td>
                                        @if($exeServ->exeTasks->isNotEmpty())
                                            <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tasks
                                            </button>
                                            <div class="dropdown-menu text-center info">
                                                @foreach($exeServ->exeTasks as $exeTask)
                                                <li class="dropdown-item text-center">
                                                    <a href="{{route('admin.exe-task.show', ['task'=> $exeTask->exe_task_id])}}">{{$exeTask->exe_task_id}}</a>
                                                </li>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row" style="max-width:150px;">
                                        <div class="col-md-5"><a href="{{route('admin.exe-service.edit', $exeServ->exe_service_id)}}" class="btn btn-default">Edit</a></div>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.exe-service.destroy', $exeServ->exe_service_id],'onsubmit' => 'return confirm("Are you sure?")', 'class'=> 'col-md-7']) !!}
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