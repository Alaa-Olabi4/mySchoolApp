@extends('layout')
@section('head')
    <title>Add Subject</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">

    <style>
        span{
            color:rgb(255, 170, 255);
        }
    </style>
@endsection 

@section('body') 

    <form action="/api/subjects" method="POST" class="form">
        @csrf
        <br>
        <div class="container">
        
            {{-- Name --}}
            <p>
                <label for="name">Name : </label><br>
                <input type="text" name="name" id="name" placeholder="name">
            </p>
            
            <br>
            
            {{-- send button --}}
            <input class="btn myBtn" name="insert" type="submit" value="Send">
            <br>

        </div>
    </form>    
@endsection 
