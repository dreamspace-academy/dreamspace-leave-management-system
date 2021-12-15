@extends('staff-dashboard-layout.dashboard-template')

@section('dashboard-staff-content')


@if($errors->any())
  @foreach ($errors->all() as $error)
      <div style="background-color:#FE6500;" id="errorBox" style="text-align:center;margin-top:20px;" class="alert alert-danger col-md-12 alert-dismissible fade show" role="alert">
          <strong style="color:white;">{!!$error!!}</strong>
          <button type="button" style="color:white;" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:white;" >&times;</span>
          </button>
      </div>

      <script>

        window.onload=function(){

          $("#errorBox").delay(3000).fadeOut("slow");

        }

      </script>

  @endforeach
@endif


@if(session()->has('message'))

    <div id="successBox" style="text-align:center;margin-top:20px;" class="alert alert-success col-md-12 alert-dismissible fade show" role="alert">
        <strong> {{ session()->get('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>

        setTimeout(
        function()
        {
            $("#successBox").delay(3000).fadeOut("slow");

        }, 1000);

    </script>

@endif


<div class="card">
      <div class="card-body">

        <h3 class="panel-title" style="text-align:center;">Register Staffs</h3>
        <br>

        <form action="/insert-staff-data" method="POST">
          {{ csrf_field() }}
          <div class="form-row">

            <div class="col-md-4 mb-3">
              <label for="staff_id">Type of Leave</label>

              <select class="form-control" name = "type_of_leave" id="type_of_leave" aria-label="Default select example" required>
                <option selected disabled>Select a leave type</option>
                <option value="Sick leave">Sick leave</option>
                <option value="Casual leave">Casual leave</option>
                <option value="Duty Leave">Duty Leave</option>
                <option value="Maternity leave">Maternity leave</option>
                <option value="Paternity leave">Paternity leave</option>
                <option value="Bereavement leave">Bereavement leave</option>
                <option value="Compensatory leave">Compensatory leave</option>
                <option value="Sabbatical leave">Sabbatical leave</option>
                <option value="Unpaid Leave">Unpaid Leave</option>

              </select>
            </div>

            <div class="col-md-4 mb-3">
              <label for="year_month">Year & Month</label>
              <input type="month" class="form-control" id="year_month" name="year_month" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="email">Status</label>

              <select class="form-control" name = "status" id="status" aria-label="Default select example" required>
                <option selected disabled>Select a leave type</option>
                <option value="Sick leave">Accepted</option>
                <option value="Sick leave">Declined</option>
              </select>

            </div>
          </div>
          <input class="btn btn-primary float-right" value="Search" type="submit">
        </form>

      </div>
</div>

<br>

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">My Leave History</h3>

      <h4>Number of Leaves: <span style="text-weight:bold; color:blue;">{{count($leave_data)}}</span> </h4>

      <hr>

      <br>

      @foreach ($leave_data as $key => $data)

          <div class="card text-white bg-dark mb-3">
            @if($data->approval_status =="[ACCEPTED]")
              <div class="card-header bg-success">
                <strong>{{$data->date_of_leave}} (Accepted)</strong>
                <i class="float-right" style="font-size:85%;">Request sent on :- {{$data->date_of_request}}</i>
              </div>
            @elseif($data->approval_status =="[DECLINED]")
              <div class="card-header bg-danger">
                <strong>{{$data->date_of_leave}} (Declined)</strong>
                <i class="float-right" style="font-size:85%;">Request sent on :- {{$data->date_of_request}}</i>
              </div>
            @endif

            <div class="card-body">
              <h5 class="card-title">{{$data->type_of_leave}}</h5>
              <p class="card-text">{{$data->description}}</p>
            </div>
          </div>

      @endforeach



    </div>
</div>



@endsection

<script>

    window.onload=function(){

      $(".nav-item:eq(1)").addClass("active");

      $('.confirmation').on('click', function () {
          return confirm('Are you sure to delete?');
      });

    }

</script>
