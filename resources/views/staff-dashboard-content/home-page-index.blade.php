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

      <form action="/change-username-of-staff-account" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Reason</label>
          <div class="col-sm-8">

            <textarea class="form-control" name="reason" id="reason" placeholder="Enter the reason"></textarea>

          </div>
        </div>

        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Date of Birth</label>
          <div class="col-sm-4">
              <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
        </div>

        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-success col-md-2 col-sm-12" value="Change" id="button" type="submit">
          </div>
        </div>

      </form>

    </div>
</div>

<br>

@endsection

<script>

    window.onload=function(){

      $(".nav-item:eq(0)").addClass("active");

    }

</script>
