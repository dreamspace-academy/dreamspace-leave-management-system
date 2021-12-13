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
      <h3 class="panel-title" style="text-align:center;">Requesting for leave</h3>
      <br>

      <form action="/insert-leave-data-of-staff-account" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="type_of_leave" class="col-sm-2 col-form-label">Type of Leave</label>
          <div class="col-sm-8">
            <select class="form-control" name = "type_of_leave" id="type_of_leave" aria-label="Default select example" required>
              <option selected>Select a staff</option>
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
        </div>

        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-8">

            <textarea class="form-control" name="description" id="description" placeholder="Enter the description" required></textarea>

          </div>
        </div>

        <div class="form-group row">
          <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave</label>
          <div class="col-sm-4">
              <input type="date" class="form-control" id="date_of_leave" name="date_of_leave" required>
          </div>
        </div>

        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-success col-md-2 col-sm-12" value="Submit" id="button" type="submit">
          </div>
        </div>

      </form>

    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">My Pending Requests</h3>
      <br>

      <div class="card text-white bg-dark mb-3">
        <div class="card-header bg-dark ">
          <strong>2021-12-02</strong>
          <i class="float-right" style="font-size:85%;">Request sent on :- 2021-12-13 19:08:59</i>
        </div>
        <div class="card-body">
          <h5 class="card-title">Sick Leave</h5>
          <p class="card-text">Hi Sir, I am having fever, therefore, I want to have a leave.</p>
          <a class="btn btn-danger float-right">Delete Request</a>
        </div>
      </div>

    </div>
</div>



@endsection

<script>

    window.onload=function(){

      $(".nav-item:eq(0)").addClass("active");

    }

</script>
