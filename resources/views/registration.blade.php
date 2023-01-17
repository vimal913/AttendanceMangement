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
            <div class="login-body margin-auto row" style="width:70%;margin:auto;margin-top: 14% !important;padding:34px">
                <div class="image col-6" style="background-color:white">
                    <img src="{{url('images/register.jpg')}}" alt="" width="100%" height="100%">
                </div>
                <div class="form-content col-6">
                    <form action="{{ route('auth.validate_registration') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name"/>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="email" class="form-control" placeholder="Email"/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <select id="role" class="form-control @error('states') error  @enderror" name="role">
                                <option value="">Choose Role...</option>
                                <option value="1">Admin</option>
                                <option value="2">Teacher</option>
                                <option value="3">Student</option>
                              </select>
                            @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="d-grid mx-auto mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <a href="{{url('login')}}">Already member</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>