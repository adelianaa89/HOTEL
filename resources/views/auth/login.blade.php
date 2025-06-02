<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('template/login/css/style.css') }}">

    <style>
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.5);
            color: #fff;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border-left: 4px solid #dc3545;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Login</h3>
                                </div>
                            </div>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        Invalid username or password. Please try again.
                                    </div>
                                @endif
                                <div class="form-group mt-3 mb-3">
                                    <input type="text" class="form-control" required autofocus placeholder="Username"
                                        name="username" value="{{ old('username') }}">

                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" required
                                        placeholder="Password" name="password">
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                                <p class="text-center mb-0">Don't have an Account? <a
                                        href="{{ route('register') }}">Sign
                                        Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('template/login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/login/js/popper.js') }}"></script>
    <script src="{{ asset('template/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/login/js/main.js') }}"></script>

</body>

</html>
