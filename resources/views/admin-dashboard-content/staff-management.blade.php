@extends('admin-dashboard-layout.dashboard-template')

@section('dashboard-admin-content')


<div class="card">
      <div class="card-body">
        <h3 class="panel-title" style="text-align:center;">Register Staffs</h3>
        <br>

        <form>
          <div class="form-row">

            <div class="col-md-4 mb-3">
              <label for="staff_id">Staff ID</label>
              <input type="text" class="form-control" id="staff_id" name="staff_id" placeholder="Enter Staff ID" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="date_of_birth">Date of Birth</label>
              <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="phone_number">Phone Number</label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="position">Position</label>
              <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position/Role" required>
            </div>

          </div>
          <input class="btn btn-lg btn-primary float-right" value="Rigister" type="submit">
        </form>

      </div>
</div>





@endsection

<script>

    window.onload=function(){
      $(".nav-item:eq(1)").addClass("active");
    }

</script>
