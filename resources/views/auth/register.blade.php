<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
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

        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
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
                                    <h3 class="mb-4">Register</h3>
                                </div>
                            </div>

                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group mt-3 mb-3">
                                    <input type="text" class="form-control" required autofocus
                                        placeholder="Full Name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <input type="text" class="form-control" required placeholder="Username"
                                        name="username" value="{{ old('username') }}">
                                    @error('username')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <input type="email" class="form-control" required placeholder="Email"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <input type="text" class="form-control" required placeholder="No HP"
                                        name="no_hp" value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <input type="text" class="form-control" required placeholder="Alamat"
                                        name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <input id="password-field" type="password" class="form-control" required
                                        placeholder="Password" name="password">
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    @error('password')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <input id="password-confirm-field" type="password" class="form-control" required
                                        placeholder="Confirm Password" name="password_confirmation">
                                    <span toggle="#password-confirm-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>

                                <input type="hidden" name="role" value="user">

                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                        Register
                                    </button>
                                </div>
                                <p class="text-center mb-0">Already have an account? <a
                                        href="{{ route('login') }}">Login</a></p>
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
