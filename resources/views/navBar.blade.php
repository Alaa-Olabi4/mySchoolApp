<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{-- End Bootstrap --}}
    
    <title>navbar</title>
    <style>
        a {
            color: rgb(255, 170, 255);
        }
        
        .Login {
            border: 2px solid #020f4c;
            color: #020f4c;
            background-color: rgb(255, 170, 255);
            border-radius: 14px;
            font-size: 24px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            /* overflow: visible; */
            /* background-color: #333; */
            /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
        }
        
        li a,
        .dropbtn {
            display: inline-block;
            text-align: center;
            padding: 14px 16px;
            /* text-decoration: underline; */
        }
        
        li.dropdown {
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
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
        
        .dropdown:hover .dropdown-content{
            overflow: auto;
            display: block;
        }
        .myBtn:hover {
            background-color: #333;
            border-color: rgb(255, 170, 255);
            color: rgb(255, 170, 255);
        }
        
    </style>
    
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="width: 100%">
        <p class="navbar-brand" style="color: rgb(255, 170, 255);font-size:28px;">mySchool</p>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item" id="home">
                    <a class="dropdown" style="color: rgb(255, 170, 255);display: inline-block; font-size: 1.2em" href="/home">Home</a>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Mark</a>
                    <div class="dropdown-content">
                        <a id="marks" href="/marks">Marks</a>
                        <a id="add-mark" href="/marks/create">Add Mark</a>
                    </div>
                </li>

                <li class="dropdown nav-item">
                    <a href="javascript:void(0)" class="dropbtn">Student</a>
                    <div class="dropdown-content">
                        <a href="/students">Students</a>
                        <a href="/students/create">Add Student</a>
                    </div>
                </li>

                <li class="dropdown nav-item">
                    <a href="javascript:void(0)" class="dropbtn">Subject</a>
                    <div class="dropdown-content">
                        <a href="/subjects">Subjects</a>
                        <a href="/subjects/create">Add Subject</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Teacher</a>
                    <div class="dropdown-content">
                        <a id="teacher" href="/teachers">Teachers</a>
                        <a id="add-teacher" href="/teachers/create">Add Teacher</a>
                    </div>
                </li>
            </ul>

            @if (Route::has('login'))
            <ul class="navbar-nav">
                <li class="nav-item" id="logout">
                    <a class="nav-link" href="/api/service/logout"><button class="Login myBtn" type="submit">Logout</button></a>
                </li>
            </ul> 
                
            @else
            <ul class="navbar-nav">
                <li class="nav-item" id="login">
                    <a class="nav-link" href="/login"><button class="Login myBtn" type="submit">Login</button></a>
                </li>
            </ul>
                   
            @endif

        </div>
    </nav>

</body>
</html>