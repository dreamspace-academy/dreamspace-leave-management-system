<!doctype html>
<html lang="en">
   <head>
      <title>DreamSpace Leave Management</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{asset('login-template')}}/css/style.css">
   </head>
   <body>
      <section class="ftco-section">
         <div class="container">
            <div class="row justify-content-center">

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

               <div class="col-md-6 col-lg-4">
                  <div class="login-wrap py-5" style="background-color: #FE6500;">
                     <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset('login-template')}}/images/logo.png);"></div>
                     <h3 class="text-center mb-0">Welcome to</h3>
                     <h5 class="text-center mb-0" style="color: white;">DreamSpace Academy</h5>
                     <br/>

                     <form action="handle-login" method="POST" class="login-form">

                        {{ csrf_field() }}

                        <div class="form-group">
                           <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                           <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                           <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                           <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div style="text-align: center;">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="login_type" id="login_type_admin" value="option1">
                              <label class="form-check-label" for="inlineRadio1" style="color:white; font-size:18px;">Admin Login</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="login_type" id="login_type_staff" value="option2">
                              <label class="form-check-label" for="inlineRadio2" style="color:white; font-size:18px;">Staff Login</label>
                           </div>
                        </div>
                        <hr>
                        <div class="form-group">
                           <input type="submit" value="Login" class="btn form-control btn-primary rounded submit px-3">
                        </div>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="{{asset('login-template')}}/js/jquery.min.js"></script>
      <script src="{{asset('login-template')}}/js/popper.js"></script>
      <script src="{{asset('login-template')}}/js/bootstrap.min.js"></script>
      <script src="{{asset('login-template')}}/js/main.js"></script>
   </body>
</html>
