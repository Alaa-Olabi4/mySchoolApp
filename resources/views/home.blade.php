@extends('layout')

@section('head')
  <title>Home</title>
  <style>
        body{
        overflow: hidden;
    }

    h1 {
      display: inline-block;
      color: rgb(255, 170, 255);
      font-size: 86px;
      left: 0;
      line-height: 100px;
      margin-top: -100px;
      position: absolute;
      text-align: center;
      top: 50%;
      width: 100%;
      z-index: -1;
    }
  </style>

@endsection

@section('body')
    
<div>
  @if ($message)
  <h1 class="center" id="title">Welcome {{ $message }}</h1>
  @else   
  <h1 class="center" id="title">Welcome to mySchool App</h1>
  @endif
</div>

@endsection
