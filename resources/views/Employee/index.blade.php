@extends('layouts.employee')

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
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Room number</span>
              <span class="info-box-number">{{ $data['room']->room_num }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Order duration</span>
                <span class="info-box-number">{{$data['order']['order_length'] - $data['interval']}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{ $data['interval'] / $data['order']['order_length'] * 100 }}%"></div>
              </div>
                  <span class="progress-description">
                    {{ $data['interval'] / $data['order']['order_length'] * 100 }}% From {{$data['order']['order_length']}} Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Payment</span>
            <span class="info-box-number">{{ $data['order']['order_paid']}}</span>

              <div class="progress">
              <div class="progress-bar" style="width: {{$data['order']['order_paid'] / $data['cost'] * 100}}%"></div>
              </div>
                  <span class="progress-description">
                    {{ round($data['order']['order_paid'] / $data['cost'] * 100,2)}}% From {{$data['cost']}} $
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-star"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rating room</span>
              <span class="info-box-number">{{ $data['room']->room_rating }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->
    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Used services</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Services</th>
                  <th>Price</th>
                  <th style="width: 40px">Status</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><b>Room: </b>{{$data['room']->room_category}}</td>
                    <td>
                        {{$data['room']->room_price}}
                    </td>
                    <td>
                        <span class="badge bg-green">Done</span></td>
                    </td>
                </tr>
                @foreach($data['exeServ'] as $eServ)
                    <tr>
                    <td>{{($loop->index + 2)}}</td>
                    <td>{{$data['descServices'][$eServ->service_id]}}</td>
                    <td>
                        {{$data['priceServices'][$eServ->service_id]}}
                    </td>
                    <td>
                        @if ($eServ->exe_service_status == 'inprocces')
                            <span class="badge bg-yellow">Used</span></td>
                        @elseif ($eServ->exe_service_status == 'fulfilled')
                            <span class="badge bg-green">Done</span></td>
                        @else
                            <span class="badge bg-red">Problem</span></td>
                        @endif
                    </tr>
                @endforeach
                    <tr>
                    <td></td>
                    <td><b>In sum</b></td>
                    <td>
                        <b>{{$data['cost']}}</b>
                    </td>
                    <td></td>
                    </tr>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->


      <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Services list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Services</th>
                  <th>Price</th>
                  <th style="width: 40px">Action</th>
                </tr>
                @foreach($data['serv'] as $serv)
                    <tr>
                    <td>{{$serv->service_id}}</td>
                    <td>{{$serv->service_desc}}</td>
                    <td>
                        {{$serv->service_price}}
                    </td>
                    <td>
                        <a id="choiseServ" href="{{route('employee.createSevr', ['id' => $serv->service_id])}}" class="btn btn-block btn-info">Take</a>
                        <!-- !!!-->
                    </td>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
  </section>
  <!-- Modal -->
<div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <a id="createServ" type="button" class="btn btn-outline" >Save changes</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <!-- / modal -->
  <!-- / MODALS -->

  {{-- <script>
    function send_message($elemId) {
            console.log(elemId);
            var elemId = "#" + elemId;
            console.log(elemId);
            var url =  $(elemId).dataset.link;
            console.log(url);
            var msg = '';
            var modal = $('#modal-info');
            $('#createServ').attr('href', url);
            $(modal).modal("toggle");
        }
  </script> --}}

@endsection
