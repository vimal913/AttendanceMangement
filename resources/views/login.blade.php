<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div>
                @if ($messages = Session::get('success'))
                <div class="alert alert-info" style="margin-top: 14% !important;">{{ $messages }}</div>
                @endif
                @if ($messages = Session::get('error'))
                <div class="alert alert-danger" style="margin-top: 14% !important;">{{ $messages }}</div>
                @endif
            </div>
            <div class="login-body margin-auto row" style="width:70%;margin:auto;margin-top: 1% !important;padding:34px">
                <div class="image col-6" style="background-color:white">
                    <img src="{{url('images/login1.jpg')}}" alt="" width="100%" height="100%">
                </div>
                <div class="form-content col-6 pt-4">
                    <form action="{{ route('auth.validate_login') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="email" class="form-control" placeholder="Email"/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            {{-- <div class="row"> --}}
                            <div class="form-check mb-3">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember"/>
                                <label for="remember">Remember me</label>
                            </div>
                            {{-- <div class="reset">
                                <a href="">Forgot Password</a>
                            </div> --}}
                        {{-- </div> --}}
                        </div>
                        
                        <div class="d-grid mx-auto mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        {{-- <a href="{{url('registration')}}">New Member</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>