<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png">
  </head>
  
  <body>
    <div class="container-scroller d-flex">
      <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="../../images/logo-dark.svg" alt="logo">
                </div>
                @if (Session::get('message'))
                <div class="alert alert-success">
              {{Session::get('message')}}
          </div>
        @endif
               
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action="{{ route('user.login')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg"name="username" placeholder="Username">
                     @error('username')
                      <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                   @enderror
                  </div>
                  <div class="mt-3 d-flex justify-content-center">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                  </div>
                  {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Keep me signed in
                      <i class="input-helper"></i></label>
                    </div>
                     <a href="#" class="auth-link text-black">Forgot password?</a> 
                  </div> --}}
                  <div class="text-center mt-4 font-weight-light">
                    Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <!-- endinject -->
  
  
  
  </body></html>