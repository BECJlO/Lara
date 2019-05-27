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
            {{ Form::open(array('url' => 'admin/image', 'role'=>'form')) }}
              <div class="box-body">
                <div class="form-group">
                    {{ Form::label('image_url', 'Image url') }}
                    {{ Form::text('image_url', Input::old('image_url'), array('class' => 'form-control','required'=>'required')) }}                
                </div>
                <div class="form-group">
                    {{ Form::label('imageable_id', 'imageable_id') }}
                    {{ Form::number('imageable_id', Input::old('imageable_id'), array('class' => 'form-control','required'=>'required')) }}                
                </div>
                <div class="form-group">
                    {{ Form::label('imageable_type', 'imageable_type') }}
                    {{ Form::text('imageable_type', Input::old('imageable_type'), array('class' => 'form-control','required'=>'required')) }}                
                </div>
                <div class="form-group">
                    {{ Form::label('load file', 'file') }}
                    {{ Form::File('file', Input::old('file'), array('class' => 'form-control','required'=>'required')) }}
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