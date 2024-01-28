@extends('layouts.app')
@section('content')
<div class="container-fluid outer" style="margin-top:70px;">
  <div class="container-fluid">
    <form action="{{route('donor.search.show')}}" method="POST">
      @csrf
      <h3 class="text-center">Search for a Donor</h3>
      <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputStatus">Blood Group</label>
            <select id="inputStatus" name="bgroup" class="form-control {{$errors->has('bgroup')?'is-invalid':''}}"  required value="{{old('bgroup')}}">
              <option>Choose...</option>
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
          <div class="form-group col-md-3">
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
          <div class="form-group col-md-3">
            <label for="inputState">State</label>
            <select id="state-dd" name="state" class="form-control {{$errors->has('state')?'is-invalid':''}}"  required value="{{old('state')}}"></select>
            @if($errors->has('state'))
            <span class="invalid-feedback" >
                <strong>{{$errors->first('state')}}</strong>
            </span>
            @endif
          </div>
          <div class="form-group col-md-3">
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
        
         <p class="text-center"><button type="submit" class="btn btn-primary ">Search</button></p>
      


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
                $('#city-dd').html('<option value="">Select City</option>');
                $.each(response.cities,function(index, val){
                $('#city-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
            }
            })
        });
        });
    </script>
@endsection