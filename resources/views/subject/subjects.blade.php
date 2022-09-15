@extends('layout') 

@section('head')
    <title>Subjects</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css"> 
@endsection 
    
@section('body')

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
            </tr>
        </thead>

        <tbody> 
            @foreach ($subjects as $s) 
            <tr>
                <td>{{ $s['id'] }}</td>
                <td>{{ $s['name'] }}</td>
            </tr> 
            @endforeach 
        </tbody>
    </table>

@endsection