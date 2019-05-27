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

    <!-- main content -->

  </div>
@endsection
