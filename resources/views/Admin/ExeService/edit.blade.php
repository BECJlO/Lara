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

       <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Edit {{ $titlePage}}</h3>
            </div>
            <!-- /.box-header -->
            {{ Html::ul($errors->all()) }}

            <!-- form start -->
            {{ Form::model($exeServ, array('route' => array('admin.exe-service.update', $exeServ->exe_service_id), 'method' => 'PUT')) }}
                <div class="box-body">
                <div class="form-group">
                    {{ Form::label('service_id', 'Service id') }}
                    {{ Form::select('service_id', $services, null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('order_id', 'Order id') }}
                    {{ Form::select('order_id', $orders, null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('exe_service_status', 'Status') }}
                    {{ Form::select('exe_service_status', array('fulfilled' => 'fulfilled', 'inprocces'=>'inprocces'), null, array('class' => 'form-control')) }}
                </div>
                    <!-- /.box-body -->
                <div class="box-footer">
                    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
                </div>
            </div>
            {{ Form::close() }}
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection