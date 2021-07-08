<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="{{ asset('assets/img/logo.png') }}" alt="bootstraper logo">
                    </div>
                    <h6 class="mb-4 text-muted">Đăng nhập</h6>
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="text-align:left">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group text-left">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Nhập Email..." required>
                        </div>
                        <div class="form-group text-left">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." required>
                        </div>
                        <div class="form-group text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Ghi nhớ tôi</label>
                            </div>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
