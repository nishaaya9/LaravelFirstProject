<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('aboutus')}}">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contactus')}}">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('gallery')}}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('create')}}">Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('registration')}}">Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <br>
    <center>
        <h1>Welcome {{$employee['name'] ?? ''}}</h1>
    </center>

</body>

</html>