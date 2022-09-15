{{-- @extends('layout') --}}
{{-- @section('head') --}}
    {{-- <title>Login</title>  --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    {{-- <link rel="stylesheet" href="css/login.css"> --}}
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/login.css') }}"> --}}
{{-- @endsection  --}}
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="files/favico.png">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{-- End Bootstrap --}}
    
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/login.css') }}">

</head>
    
<body style="background-color: #020f4c;">
{{-- @section('body')  --}}

    <div class="login-wrap">
        <div class="login-html">
            
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                <label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">
                <label for="tab-2" class="tab">Sign Up</label>

            <div class="login-form">
                {{-- Login Form --}}
                <form action="{{ route('api.login') }}" accept="application/json" method="POST">
                    @csrf
                    {{-- {{ csrf_field() }} --}}
                    {{-- {!! csrf_field() !!} --}}
                    <div class="sign-in-htm">
                        {{-- E-mail --}}
                        <div class="group">
                            <label for="user" class="label">E-mail</label>
                            <input id="user" name="email" type="email" class="input" required>
                        </div>
                        {{-- Password --}}
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" name="password" type="password" class="input" data-type="password" required minlength="8">
                        </div>
                        {{-- Keep me Signed in --}}
                        <div class="group">
                            <input id="check" type="checkbox" class="check" {{-- checked --}}>
                            <label for="check">
                                <span class="icon"></span> 
                                <span class="check-text">Keep me Signed in</span>
                            </label>
                        </div>
                        {{-- Sign in btn --}}
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div> 
                        
                        {{-- footer --}}
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-2">Are you new ?</a>
                            </div>
                            <div class="foot-lnk">
                                <a href="#forgot">Forgot Password?</a>
                            </div>
                            <br>
                            
                            {{-- Error message --}}
                            
                            @isset($message)
                            @if ( $message != '' )
                            <div class="alert alert-danger" role="alert"> {{ $message  }}</div>
                            @endif
                            @endisset
                            
                        </div>
                        {{-- @if (session()->has('message'))
                            <div class="alert alert-danger" role="alert"> {{ session()->get('message')  }}</div>                       
                        @endif --}}

                        </form>

                {{-- Register Form --}}
                <form action="{{ route('api.register') }}" accept="application/json" method="POST">
                    @csrf
                    <div class="sign-up-htm">

                        {{-- FirstName --}}
                        <div class="group">
                            <label for="FirstName" class="label">First name</label>
                            <input id="FirstName" name="FirstName" type="text" class="input">
                        </div>

                        {{-- LastName --}}
                        <div class="group">
                            <label for="LastName" class="label">Last Name</label>
                            <input id="LastName" name="LastName" type="text" class="input">
                        </div>

                        {{-- E-mail --}}
                        <div class="group">
                            <label for="email" class="label">Email Address</label>
                            <input id="email" name="email" type="text" class="input">
                        </div>

                        {{-- Password --}}
                        <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" name="password" type="password" class="input" data-type="password">
                        </div>

                        {{-- Password Confirmation --}}
                        <div class="group">
                            <label for="password_confirmation" class="label">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="input"
                                data-type="password">
                        </div>

                        {{-- Sign-up button --}}
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>

                        {{-- Footer --}}
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                        <div class="group"><br></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- <script src="{{ asset('/resources/js/login.js') }}"></script> --}}
{{-- @endsection  --}}
    
</body>
</html>