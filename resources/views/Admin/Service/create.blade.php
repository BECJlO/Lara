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
            <h3 class="box-title">Create {{ $titlePage}}</h3>
            </div>
            <!-- /.box-header -->
            {{ Html::ul($errors->all()) }}
            <!-- form start -->
            {{ Form::open(array('url' => 'admin/service', 'role'=>'form')) }}
              <div class="box-body">
                <div class="form-group">
                    {{ Form::label('service_name', 'Service name') }}
                    {{ Form::text('service_name', Input::old('service_name'), array('class' => 'form-control','required'=>'required')) }}                
                </div>
                <div class="form-group">
                    {{ Form::label('service_desc', 'Service description') }}
                    {{ Form::text('service_desc', Input::old('service_desc'), array('class' => 'form-control','required'=>'required')) }}                
                </div>
                <div class="form-group">
                    {{ Form::label('service_category', 'Service category') }}
                    {{ Form::text('service_category', Input::old('service_category'), array('class' => 'form-control','required'=>'required')) }}                
                </div>
                <div class="form-group">
                    {{ Form::label('service_price', 'Service price') }}
                    {{ Form::Number('service_price', Input::old('service_price'), array('class' => 'form-control','required'=>'required')) }}                
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
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