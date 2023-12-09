@extends('layouts.admin.master')

<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">


@section('body')


<!-- Main content -->
<section class="content dashboard">
  <!-- /.row -->
  <div class="row">
    <div class="col-md-6">
      <h5 class="mb-3 text-uppercase">Logged Info</h5>
      <div class="card px-4 py-3">
        <div>
          <div class="font-weight-bold">User ID</div>
          <div>{{ Auth::user()->id }}</div>
          <hr>
          <div class="font-weight-bold my-1">User Name</div>
          <div>{{ Auth::user()->name }}</div>
          <hr>
          <div class="font-weight-bold">Email</div>
          <div>{{ Auth::user()->email }}</div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <h5 class="mb-3 text-uppercase">PG Feedback</h5>
      <div class="card px-4 py-3">
        <!-- form start -->
        <form class="mb-0" method="POST" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">PG List</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">PG One</option>
              <option>PG Two</option>
              <option>PG Three</option>
              <option>PG Four</option>
              <option>PG Five</option>
              <option>PG Six</option>
              <option>PG Seven</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Reason</label>
            <select id="s3" name="problem" class="form-control select2 select2-hidden-accessible" style="width:100%;"
              onchange="fnTextbox()" onclick="fnTextbox()" data-select2-id="s3" tabindex="-1" aria-hidden="true">
              <optgroup class="ver12" style="font-weight:bold; font-style:normal;" label="GPS">
                <option data-select2-id="4">Incorrect GPS location available</option>
              </optgroup>
              <optgroup class="ver12" style="font-weight:bold; font-style:normal;" label="SENSOR">
                <option>Incorrect SEAT Sensor Data</option>
              </optgroup>
              <optgroup class="ver12" style="font-weight:bold; font-style:normal;" label="GOOGLE EARTH">
                <option>Google EARTH Location is not available</option>
              </optgroup>
              <optgroup class="ver12" style="font-weight:bold; font-style:normal;" label="REPORT">
                <option>Incorrect Vehicle Route</option>
                <option>Incorrect Hourly Report</option>
                <option>Incorrect Location Report</option>
                <option>Incorrect Engine Ignition Report</option>
                <option>Incorrect Engine Oil Report</option>
                <option>Incorrect Trip Counter Report</option>
                <option>Incorrect Surveillance Report</option>
              </optgroup>
              <optgroup class="ver12" style="font-weight:bold; font-style:normal;" label="Setting Problem">
                <option>Incorrect Speed Report summery</option>
                <option>Secure Mode is not working properly</option>
              </optgroup>
              <optgroup class="ver12" style="font-weight:bold; font-style:normal;" label="GEOFENCE">
                <option>Problem with GEOFENCE Setup</option>
              </optgroup>
              <optgroup class="ver12" style="font-weight:bold; font-style:normal;" label="USER PROFILE">
                <option>Incorrect Vehicle Details</option>
                <option>Incorrect Vehicle Registration Detail</option>
                <option>Incorrect Driver Details</option>
              </optgroup>
              <optgroup class="ver12" style="font-weight:bold; font-style:normal;" label="Others">
                <option class="os15" value="other">Other Problem</option>
              </optgroup>
            </select>
          </div>

          <div class="my-2 py-2">
            <button type="submit" class="btn btn-primary w-100 text-center">Submit Feedback</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection
