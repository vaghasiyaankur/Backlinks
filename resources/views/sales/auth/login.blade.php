
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('template/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('template/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('template/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('template/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('template/images/impulsion_seo.png') }}" />
  <style>
    .invalid-feedback {
        display: block;
    }

    @keyframes spin {
        from {
            transform: rotate(0);
        }
        to{
            transform: rotate(359deg);
        }
    }

    @keyframes rotateY-anim {
        0% {
            transform: rotateY(0deg);
        }

        100% {
            transform: rotateY(360deg);
        }
    }

    /* GRID STYLING */

    * {
        box-sizing: border-box;
    }
    .spining-content {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
    }

    .spinner-box {
        width: 300px;
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: transparent;
    }

    .loader{
        position: relative;
    }

    .logo-spin img {
        width: 150px;
        height: 150px;
        animation: spin 2.5s linear 0s infinite;
    }

    .logo-text{
        position: absolute;
        top: 46px;
        right: 45px;
    }

    .logo-text img{
        width: 60px;
        height: 60px;
        animation: rotateY-anim 2s linear infinite;
    }
</style>
</head>

<body>
  <div class="container-scroller d-none">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
                @if (session()->has('msg'))
                    <div class="alert alert-danger"> {{ session('msg') }} </div>
                @endif
              <div class="brand-logo">
                {{-- <img src="{{ asset('template/images/logo.svg') }}" alt="logo"> --}}
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form id="loginForm" method="POST" action="{{ route('sales.login') }}" class="pt-3">
                @csrf
                <div class="form-group">
                    <input type="email" id="login" class="inputClass fadeIn second form-control form-control-lg" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="password" id="password" class="inputClass fadeIn second form-control form-control-lg" name="password" placeholder="password">
                </div>

                <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <label class="form-check-label text-md-left" for="remember">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                        </label>
                    </div>
                    <a href="{{route('sales.forget.password.get')}}" class="auth-link text-black">Forgot password?</a>
                  </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __('Login') }}
                        </button>
                </div>

                <div class="text-center mt-4 font-weight-light">
              Don't have an account? <a href="{{ route('sales.register.show') }}" class="text-primary">Create</a>
            </div>
            </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end"></p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <div class="spining-content">
    <div class="spinner-box">
      <div class="loader">
          <div class="logo-spin">
              <img src="{{ asset('template/images/impulsion_border.png') }}" alt="">
          </div>
          <div class="logo-text">
              <img src="{{ asset('template/images/impulsion_text.png') }}" alt="">
          </div>
      </div>
    </div>
</div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('template/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script>
    $(document).ready(function(){
        setTimeout(() => {
            $('.container-scroller').removeClass('d-none');
            $('.spining-content').addClass('d-none');
        }, 3000);
    });
  </script>
  <script src="{{ asset('template/js/off-canvas.js') }}"></script>
  <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('template/js/template.js') }}"></script>
  <script src="{{ asset('template/js/settings.js') }}"></script>
  <script src="{{ asset('template/js/todolist.js') }}"></script>
  <!-- endinject -->
</body>

</html>
