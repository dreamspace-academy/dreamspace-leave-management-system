@extends('admin-dashboard-layout.dashboard-template')

@section('dashboard-admin-content')


<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">Change Username</h3>
      <br>

      <form action="/insert-staff-data" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="username" value="{{$admin_data[0]->username}}" name="username" placeholder="Username" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="password" placeholder="Password" required>
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

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">Change Password</h3>
      <br>

      <form action="/insert-staff-data" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="current_password" name="current_password" placeholder="Current Password" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
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
      $(".nav-item:eq(4)").addClass("active");
    }
</script>
