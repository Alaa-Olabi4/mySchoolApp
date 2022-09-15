@extends('layout')
    
@section('head')
    <title>Add Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">
    {{-- <meta name="_token" content="{{ csrf_token() }}" /> --}}
@endsection 
    
@section('body') 
    
    <form action="/api/students" method="POST" class="form">
        @csrf
        <br>
        <div class="container">
        
            {{-- FirstName --}}
            <p>
                <label for="FirstName">First name : </label><br>
                <input type="text" name="FirstName" id="FirstName" placeholder="First name">
            </p>
            <br>
            
            {{-- LastName --}}
            <p>
                <label for="LastName">Last name : </label><br>
                <input type="text" name="LastName" id="LastName" placeholder="Last name">
            </p>
            <br>
            
            {{-- E-mail --}}
            <p>
                <label for="email">E-mail : </label><br>
                <input type="email" name="email" id="email" placeholder="email">
            </p>
            <br>
            
            {{-- Password --}}
            <p>
                <label for="password">Password : </label><br>
                <input type="password" name="password" id="password" placeholder="password">
            </p>
            <br>

            {{-- send button --}}
            <input class="btn btn-primary myBtn" name="insert" type="submit" value="Send">            
            <br>
            
        </div>
        
    </form>
    
@endsection 
