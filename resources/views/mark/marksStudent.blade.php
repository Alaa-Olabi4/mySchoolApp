@extends('layout')

@section('head')
    <title>Marks of Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">
    <style>
        .Btn {
            border: 2px solid #020f4c;
            color: #020f4c;
            background-color: rgb(255, 170, 255);
            border-radius: 14px;
            font-size: 24px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.6);
        }
    </style>    
@endsection 

@section('body') 

    <table>
        <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>id</th>
                <th>student</th>
                <th>value</th>
                <th>teacher</th>
                <th>subject</th>
            </tr>
        </thead>
        
        <tbody>
            {{-- @php$count=0;@endphp --}}
            @foreach ($marks as $m)
            <tr>
                {{-- <td>{{ ++$count }}</td> --}}
                <td>{{ $m['id'] }}</td>
                <td>{{ $m['student'] }} </td>
                <td>{{ $m['value'] }} </td>
                <td>{{ $m['teacher'] }} </td>
                <td>{{ $m['subject'] }} </td>
            </tr>
            @endforeach    
        </tbody>
    </table>
    
    <br>

    <button class="Btn myBtn" onclick="history.back ()"style="position:fixed;left: 50%;display:inline-block;"> < Back</button> 
            
@endsection 
