<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Renaldy Prasetio | Login</title>
    <link rel="stylesheet" href="auth/vendors/feather/feather.css">
    <link rel="stylesheet" href="auth/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="auth/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="auth/css/vertical-layout-light/style.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="img/logo-full.png" alt="logo">
                            </div>
                            <h4>Welcome Back!</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="POST" action="/login">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                @endif
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email" name="email" value="{{ @old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        SIGNIN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
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
    <!-- plugins:js -->
    <script src="auth/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="auth/js/off-canvas.js"></script>
    <script src="auth/js/hoverable-collapse.js"></script>
    <script src="auth/js/template.js"></script>
    <script src="auth/js/settings.js"></script>
    <script src="auth/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
