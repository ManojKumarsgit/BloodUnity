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

                <a class="nav-link text-primary " href="{{route('donor.login')}}" >Logout</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>

      @if(session()->has('updateSuccess'))
<div class="alert alert-success">
     {{session()->get('updateSuccess')}}
</div>
@endif


      <div class="container outer" style="margin-top:70px;">
  <div class="container-fluid">
    <form action="{{route('donor.profile.update',$donor->id)}}" method="POST">
        @method('PUT')    
        @csrf
      <h3 class="text-center">Edit Details</h3>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name" id="name" placeholder="Name"  required value="{{$donor->name}}">
            @if($errors->has('name'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('name')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" id="email" placeholder="Email"  required value="{{$donor->email}}">
            @if($errors->has('email'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('email')}}</strong>
            </span>
            @endif
          </div>
        </div>
        <!-- <div class="form-row">
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" name="password" id="password" placeholder="Password" />
              @if($errors->has('password'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('password')}}</strong>
            </span>
            @endif
            </div>
            <div class="form-group col-md-6">
              <label for="password2">Re-Type Password</label>
              <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" name="password_confirmation" id="password2" placeholder="Password">
              @if($errors->has('password'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('password')}}</strong>
            </span>
            @endif
            </div>
        </div> -->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="mobile">Phone Number</label>
            <input type="text" class="form-control {{$errors->has('phone')?'is-invalid':''}}" name="phone" id="mobile" placeholder="Phone No."  required value="{{$donor->phone}}">
            @if($errors->has('phone'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('phone')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-8">
            <label for="inputAddress">Address</label>
           <input type="text" class="form-control {{$errors->has('address')?'is-invalid':''}}" name="address" id="inputAddress" placeholder="Address.."  required value="{{$donor->address}}">
           @if($errors->has('address'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('address')}}</strong>
            </span>
            @endif
          </div>
       </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCountry">Country</label>
            <select id="country-dd" name="country" class="form-control {{$errors->has('country')?'is-invalid':''}}"  required value="{{$donor->country}}">
              <option value="{{$donor->country}}">{{$donor->country}}</option>
              @foreach($countries as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
              @endforeach
            </select>
            @if($errors->has('country'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('country')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="state-dd" name="state" class="form-control {{$errors->has('state')?'is-invalid':''}}"  required value="{{old('state')}}">
                <option value="{{$donor->state}}">{{$donor->state}}</option>
            </select>
            @if($errors->has('state'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('state')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">City</label>
            <select id="city-dd" name="city" class="form-control {{$errors->has('state')?'is-invalid':''}}"  required value="{{old('city')}}">
            <option value="{{$donor->city}}">{{$donor->city}}</option>
            </select>
            @if($errors->has('city'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('city')}}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="btStatus">Blood Group</label>
            <select id="bStatus" name="bgroup" class="form-control {{$errors->has('bgroup')?'is-invalid':''}}"  required value="{{old('bgroup')}}">
            <option value="{{$donor->bgroup}}">{{$donor->bgroup}}</option>
              @foreach ($bloodGroups as $bloodGroup)
              <option value="{{$bloodGroup->id}}"> {{$bloodGroup->group}}</option>
              @endforeach
            </select>
            @if($errors->has('bgroup'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('bgroup')}}</strong>
            </span>
            @endif
        </div>
          <div class="form-group col-md-4">
              <label for="inputStatus">Confirm your availability to donate blood</label>
              <select id="inputStatus" name="is_avail" class="form-control {{$errors->has('is_avail')?'is-invalid':''}}"  required value="{{old('is_avail')}}">
                @if($donor->is_avail == 'Available')
                    <option>{{$donor->is_avail}}</option>
                    <option>Unavailable</option>
                @else
                 <option>{{$donor->is_avail}}</option>
                  <option>Available</option>
                @endif
              </select>
              @if($errors->has('is_avail'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('is_avail')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-4">
              <label for="last_don">Last Donated</label>
            
           <input type="date" class="form-control {{$errors->has('last_donated')?'is-invalid':''}}" name="last_donated" id="last_don" placeholder="Address.." value="{{$donor->last_donated}}">
           
          </div>
        </div>
         <p class="text-center"><button type="submit" class="btn btn-primary ">Update</button></p>
      </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#country-dd').change(function(event) {
            var idCountry = this.value;
            $('#state-dd').html('');
 
            $.ajax({
            url: "/api/fetch-state",
            type: 'POST',
            dataType: 'json',
            data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#state-dd').html('<option value="">Select State</option>');
                $.each(response.states,function(index, val){
                $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
                $('#city-dd').html('<option value="">Select City</option>');
            }
            })
        });
        $('#state-dd').change(function(event) {
            var idState = this.value;
            $('#city-dd').html('');
            $.ajax({
            url: "/api/fetch-cities",
            type: 'POST',
            dataType: 'json',
            data: {state_id: idState,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#city-dd').html('<option value="">Select State</option>');
                $.each(response.cities,function(index, val){
                $('#city-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
            }
            })
        });
        });
    </script>
    </script>
      </body>
</html>