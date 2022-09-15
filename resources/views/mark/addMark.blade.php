@extends('layout')
    @section('head')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">
        <title>Add Mark</title>
    @endsection 

    @section('body') 
    
        <form action="/api/marks" method="POST" class="form">
            @csrf
            <br>
            <div class="container">
                
                {{-- TeacherID --}}
                <label for="teacher_id">teacher : </label><br>
                <select id="teacher_id" name="teacher_id" required>
                    @for ($i = 0 ; $i <$ts ; $i++)
                    <option class="opt" value={{ $teachers[$i]['id'] }}>{{ $teachers[$i]['name'] }}</option>
                    @endfor
                </select>
                <br><br>
                
                
                {{-- StudentID --}}
                <label for="student_id">student : </label><br>
                <select id="student_id" name="student_id" required>
                    @for ($i = 0 ; $i <$ss ; $i++)
                    <option class="opt"value={{ $students[$i]['id']}}>{{ $students[$i]['name'] }}</option>
                    @endfor
                </select>
                <br><br>

                {{-- Value --}}
                <p>
                    <label for="value">value : </label><br>
                    <input type="number" name="value" id="value" placeholder="value" min="0" max="100">
                </p>

                {{-- Send Button --}}
                <br>
                <input class="btn myBtn" name="insert" type="submit" value="Send">
                <br>
            </div>

        </form>
    @endsection 
