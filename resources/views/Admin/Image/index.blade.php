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
                                <th>Image</th>
                                <th>Url</th>
                                <th>imageable_id</th>
                                <th>imageable_type</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($images as $image)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset("source/$image->image_url")}}" height="100px"></td>
                                    <td>{{$image->image_url}}</td>
                                    <td>{{$image->imageable_id}}</td>
                                    <td>{{$image->imageable_type}}</td>
                                    <td>
                                        <div class="">
                                        <div class="col"><a href="{{route('admin.image.edit', $image->image_id)}}" class="btn btn-default">Edit</a></div>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.image.destroy', $image->image_id],'onsubmit' => 'return confirm("Are you sure?")', 'class'=> 'col']) !!}
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
                            <th>Image</th>
                            <th>Url</th>
                            <th>imageable_id</th>
                            <th>imageable_type</th>
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