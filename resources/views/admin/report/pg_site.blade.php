@extends('layouts.admin.master')
@section('style')
<link rel="stylesheet" href="{{ url('Application/public/css/datepicker.css') }}">
@endsection
@section('script')
<script src="{{ url('Application/public/js/bootstrap-datetimepicker.js') }}"></script>
<script>
  $('.datepicker').datetimepicker({
    format: 'DD-MMM-YYYY',
    icons: {
      time: "fa fa-clock-o",
      date: "fa fa-calendar",
      up: "fa fa-chevron-up",
      down: "fa fa-chevron-down",
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      today: 'fa fa-screenshot',
      clear: 'fa fa-trash',
      close: 'fa fa-remove'
    }
  });
</script>
@endsection

@section('body')


<!-- Main content -->
<section class="content dashboard">
  <form action="" method="post">
    @csrf
    {{-- row --}}
    <div class="row">
      {{-- col --}}
      <div class="col-md-2 mb-3">
        <div class="form-group">
          <input type="text" name="id" class="form-control" placeholder="Enter SITE ID here" required>
        </div>
      </div>
      {{-- col --}}
      {{-- col --}}
      <div class="col-md-2 mb-3">
        <div class="form-group">
          <input type="text" name="dtp1" class="form-control datepicker" style="cursor:pointer;" value="06-Dec-2021"
            placeholder="Date Picker Here" onkeydown="return false">
        </div>
      </div>
      {{-- col --}}
      {{-- col --}}
      <div class="col-md-2 mb-3">
        <div class="form-group">
          <input type="text" name="dtp1" class="form-control datepicker" style="cursor:pointer;" value="06-Dec-2021"
            placeholder="Date Picker Here" onkeydown="return false">
        </div>
      </div>
      {{-- col --}}
      {{-- col --}}
      <div class="col-md-1 mb-3">
        <button type="button" class="btn btn-primary">OPEN</button>
      </div>
      {{-- col --}}
    </div>
    {{-- row --}}
  </form>
</section>
@endsection
