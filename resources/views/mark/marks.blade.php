@extends('layout')
@section('head')
    <title>Marks</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">
@endsection 
    
@section('body') 
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>student</th>
                <th>value</th>
                <th>teacher</th>
                <th>subject</th>
            </tr>    
        </thead>
        <tbody>
            @foreach ($marks as $m)
            <tr>
                <td>{{ $m['id'] }}</td>
                <td> <a href="/marksStudent/{{ $m['student_id'] }}"> {{ $m['student'] }} </a></td>
                <td>{{ $m['value'] }} </td>
                <td>{{ $m['teacher'] }} </td>
                <td>{{ $m['subject'] }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection     
