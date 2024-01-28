<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark p-1" style="background-color: rgba(0, 0, 0, 0.7); backdrop-filter: blur(4px);">
        <div class="container-fluid">
          <a class="navbar-brand p-3 " href="#">
            <img src="./images/logo.png">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0 p-3">
              <li class="nav-item mr-4 mt-md-2 mt-lg-0 ">
                <a class="nav-link active" aria-current="page" href="{{route('donor.index')}}">Home</a>
              </li>
              <li class="nav-item mr-4 mt-md-2 mt-lg-0">
                <a class="nav-link" href="{{route('donor.index')}}">About</a>
              </li>
              <li class="nav-item  mr-4 mt-md-2 mt-lg-0">
                <a class="nav-link" href="{{route('donor.create')}}">Want to Donate Blood</a>
              </li>
              <li class="nav-item mr-4 mt-md-2 mt-lg-0">
                <a class="nav-link " href="{{route('donor.search')}}" >Looking for Blood</a>
              </li>
              <li class="nav-item mr-4 mt-md-2 mt-lg-0">
                <a class="nav-link " href="{{route('donor.login')}}" >Login</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      @yield('content')
</body>
</html>
