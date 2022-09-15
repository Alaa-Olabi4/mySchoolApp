@extends('layout')

@section('head')
    <title>Students</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">
@endsection 

@section('body') 

@if (session()->has('success'))
    <div class="alert alert-success" style="width: 75%;margin:15px auto;padding:10px;">{{ session()->get('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>    
    </thead>
    <tbody>
        @foreach ($students as $s)
        <tr>
            <td>{{ $s['id'] }}</td>
            <td><a href="/marksStudent/{{ $s['id'] }}"> {{ $s['FirstName'] }} {{ $s['LastName'] }} </a></td>
        </tr>
        @endforeach    
    </tbody>
</table>
@endsection 