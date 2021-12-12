@extends('admin-dashboard-layout.dashboard-template')

@section('dashboard-admin-content')


{{$admin_data[0]->password}}

@endsection

<script>

    window.onload=function(){
      $(".nav-item:eq(4)").addClass("active");
    }
</script>
