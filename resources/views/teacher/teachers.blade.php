@extends('layout')

@section('head')
    <title>Teachers</title>    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">
@endsection 


@section('body') 

    <table >
        <tr>
            <th>id</th>
            <th>name</th>
            <th>subject</th>
        </tr>
        @foreach ($teachers as $t)
        
        <tr>
            <td>{{ $t['id'] }}</td>
            <td>{{ $t['FirstName'] }}  {{ $t['LastName'] }} </td>
            <td>{{ $t['subject'] }} </td>
        </tr>
        
        @endforeach
    </table>

@endsection 