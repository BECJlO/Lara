@extends('layouts.employee')
@extends('layouts.sitebar')

@section('content')
  <div class="content-wrapper">
    @component('components.breadcrumbs')
        @slot('titlePage')
        {{ $data['titlePage']}}
        @endslot
        @slot('addTitlePage')
        {{ $data['addTitlePage']}}
        @endslot
    @endcomponent

        <!-- Main content -->
    <section class="content">
              <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>User</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @foreach($data['tasks'] as $task)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$task['user']}}</td>
                    <td>{{$task['desc']}}</td>
                    <td>{{$task['date']}}</td>
                    <td>
                        @if($task['status'] == 'new')
                            <span class="label label-primary">New</span>
                        @elseif($task['status'] == 'inprocces')
                            <span class="label label-warning">In process</span>
                        @elseif($task['status'] == 'success')
                            <span class="label label-success">Success</span>
                        @elseif($task['status'] == 'problem')
                            <span class="label label-danger">Problen</span>
                        @endif

                    </td>
                    <td>{{$task['id']}}</td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
@endsection