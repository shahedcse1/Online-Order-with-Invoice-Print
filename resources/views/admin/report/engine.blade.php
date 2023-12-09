@extends('layouts.admin.master')
@section('style')
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
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
      <div class="col-md-6 mb-3">
        <select class="form-control select2" style="width: 100%;">
          <option selected="selected">HMT_RNP_0041 — HMT2254</option>
          <option>HMT_RNP_0041 — HMT2254</option>
          <option>HMT_RNP_0041 — HMT2254</option>
          <option>HMT_RNP_0041 — HMT2254</option>
          <option>HMT_RNP_0041 — HMT2254</option>
        </select>
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
        <button type="button" class="btn btn-primary">OPEN</button>
      </div>
      {{-- col --}}
    </div>
    {{-- row --}}
  </form>

  {{-- report --}}
  <div class="mt-1">
    {{-- card --}}
    <div class="card p-4">
      <div class="header">
        <h4 class="title">PG Running Report &nbsp; - &nbsp; HMT_RNP_0041 (HMT2254)</h4>
        <p class="mt-3 text-muted">
          Find your PG's engine status (On/Off) with real time
          run period. You can find out how long the engine was On / Idle / Off at a particular day including run time.
        </p>
      </div>

      <div class="content">
        <label>Report Scheduling : 12:00:00AM - 11:59:59PM</label><br>
        <br>

        <table border="1" width="720" class="ver11" cellspacing="0" cellpadding="0" style="border-collapse: collapse"
          bordercolor="#000000">
          <tbody>
            <tr align="right">
              <td width="60" class="bor">00:30</td>
              <td width="60" class="bor">01:00</td>
              <td width="60" class="bor">01:30</td>
              <td width="60" class="bor">02:00</td>
              <td width="60" class="bor">02:30</td>
              <td width="60" class="bor">03:00</td>
              <td width="60" class="bor">03:30</td>
              <td width="60" class="bor">04:00</td>
              <td width="60" class="bor">04:30</td>
              <td width="60" class="bor">05:00</td>
              <td width="60" class="bor">05:30</td>
              <td width="60" class="bor">06:00</td>
            </tr>
          </tbody>
        </table><br>
        <table border="1" width="720" class="ver11" cellspacing="0" cellpadding="0"
          style="margin-top:5px; border-collapse: collapse" bordercolor="#000000">
          <tbody>
            <tr align="right">
              <td width="60" class="bor">06:30</td>
              <td width="60" class="bor">07:00</td>
              <td width="60" class="bor">07:30</td>
              <td width="60" class="bor">08:00</td>
              <td width="60" class="bor">08:30</td>
              <td width="60" class="bor">09:00</td>
              <td width="60" class="bor">09:30</td>
              <td width="60" class="bor">10:00</td>
              <td width="60" class="bor">10:30</td>
              <td width="60" class="bor">11:00</td>
              <td width="60" class="bor">11:30</td>
              <td width="60" class="bor">12:00</td>
            </tr>
          </tbody>
        </table><br>
        <table border="1" width="720" class="ver11" cellspacing="0" cellpadding="0"
          style="margin-top:5px; border-collapse: collapse" bordercolor="#000000">
          <tbody>
            <tr align="right">
              <td width="60" class="bor">00:30</td>
              <td width="60" class="bor">01:00</td>
              <td width="60" class="bor">01:30</td>
              <td width="60" class="bor">02:00</td>
              <td width="60" class="bor">02:30</td>
              <td width="60" class="bor">03:00</td>
              <td width="60" class="bor">03:30</td>
              <td width="60" class="bor">04:00</td>
              <td width="60" class="bor">04:30</td>
              <td width="60" class="bor">05:00</td>
              <td width="60" class="bor">05:30</td>
              <td width="60" class="bor">06:00</td>
            </tr>
          </tbody>
        </table><br>
        <table border="1" width="720" class="ver11" cellspacing="0" cellpadding="0"
          style="margin-top:5px; border-collapse: collapse" bordercolor="#000000">
          <tbody>
            <tr align="right">
              <td width="60" class="bor">06:30</td>
              <td width="60" class="bor">07:00</td>
              <td width="60" class="bor">07:30</td>
              <td width="60" class="bor">08:00</td>
              <td width="60" class="bor">08:30</td>
              <td width="60" class="bor">09:00</td>
              <td width="60" class="bor">09:30</td>
              <td width="60" class="bor">10:00</td>
              <td width="60" class="bor">10:30</td>
              <td width="60" class="bor">11:00</td>
              <td width="60" class="bor">11:30</td>
              <td width="60" class="bor">12:00</td>
            </tr>
          </tbody>
        </table><br>
        <table class="table">
          <thead>
            <tr>
              <th>SL</th>
              <th>START TIME &nbsp;/&nbsp; END TIME</th>
              <th>Duration</th>
              <th>Location (Near By)</th>
              <th>MAP</th>
              <th>Site ID</th>
              <th>New Site ID</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#</td>
              <td><b>TOTAL Running Time</b></td>
              <td><b>00:00:00</b></td>
              <td colspan="5">&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    {{-- card --}}
  </div>
  {{-- report --}}
</section>
@endsection
