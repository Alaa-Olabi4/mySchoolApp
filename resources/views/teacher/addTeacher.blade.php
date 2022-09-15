@extends('layout')

@section('head')
    <title>Add Teacher</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">

    <style>
        span {
            color: rgb(255, 170, 255);
        }

        a{
            text-decoration-line: none;
        }

        p a,
        .dropbtn {
            display: inline-block;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        p.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: inline-block;
            position: absolute;
            /* background-color: #020f4c; */
            background-color: rgb(255, 170, 255);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            /* color: black; */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            color: #020f4c;
        }

        .dropdown-content a:hover {
            background-color: #333;
            color: rgb(255, 170, 255);
        }

        .dropdown:hover .dropdown-content {
            overflow: auto;
            display: block;
        }
    </style>
@endsection 

@section('body') 

<form action="/api/teachers" method="post" class="form">
    @csrf
        <div class="container">

            {{-- FirstName --}}
            <p>
                <label for="FirstName">First name : </label><br>
                <input type="text" name="FirstName" id="FirstName" placeholder="FirstName" required="required">
            </p>
            <br>

            {{-- LastName --}}
            <p>
                <label for="LastName">Last name : </label><br>
                <input type="text" name="LastName" id="LastName" placeholder="LastName" required="required">
            </p>
            <br>

            {{-- E-mail --}}
            <p>
                <label for="email">E-mail : </label><br>
                <input type="text" name="email" id="email" placeholder="email" required="required">
            </p>
            <br>
            
            {{-- Password --}}
            <p>
                <label for="password">Password : </label><br>
                <input type="password" name="password" id="password" placeholder="password" required="required">
            </p>
            <br>
            
            {{-- Subject --}}
            <label for="subject_id">Subject : </label><br>
            <select id="subject_id" name="subject_id" required>
                @foreach ($subjects as $subject)
                   <option class="opt"value={{ $subject->id }}>{{ $subject->name }}</option>
                @endforeach
            </select>
            <br>
            
            <br>
            
            {{-- send Button --}}
            <input class="btn myBtn" type="submit" value="Send">
            
            <br>
        </div>        
    </form>
@endsection 