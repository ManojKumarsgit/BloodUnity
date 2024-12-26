@extends('layouts.app')
@section('content')
  <div class="container outer" style="margin-top:70px;">
  <div class="container-fluid">
    <form action="{{route('donor.store')}}" method="POST">
      @csrf
      <h3 class="text-center">DONOR REGISTER FORM</h3>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name" id="name" placeholder="Name"  required value="{{old('name')}}">
            @if($errors->has('name'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('name')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" id="email" placeholder="Email"  required value="{{old('email')}}">
            @if($errors->has('email'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('email')}}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-row">
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
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="mobile">Phone Number</label>
            <input type="text" class="form-control {{$errors->has('phone')?'is-invalid':''}}" name="phone" id="mobile" placeholder="Phone No."  required value="{{old('phone')}}">
            @if($errors->has('phone'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('phone')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-8">
            <label for="inputAddress">Address</label>
           <input type="text" class="form-control {{$errors->has('address')?'is-invalid':''}}" name="address" id="inputAddress" placeholder="Address.."  required value="{{old('address')}}">
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
            <select id="country-dd" name="country" class="form-control {{$errors->has('country')?'is-invalid':''}}"  required value="">
              <option value="{{old('country')}}">Select Country</option>
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
            <select id="state-dd" name="state" class="form-control {{$errors->has('state')?'is-invalid':''}}"  required value="{{old('state')}}"></select>
            @if($errors->has('state'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('state')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">City</label>
            <select id="city-dd" name="city" class="form-control {{$errors->has('state')?'is-invalid':''}}"  required value="{{old('city')}}">
              <!-- <option>Choose...</option> -->
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
              <option>Select BloodGroup</option>
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
                <option>Available</option>
                <option>Unavailable</option>
              </select>
              @if($errors->has('is_avail'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('is_avail')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label for="last_don">Last Donated</label>
           <input type="date" class="form-control {{$errors->has('last_donated')?'is-invalid':''}}" name="last_donated" id="last_don" placeholder="Address.." value="{{old('last_donated')}}">
           
          </div>
        </div>
         <p class="text-center"><button type="submit" class="btn btn-primary ">Register</button></p>
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
    @endsection
<!-- </body>
</html> -->
