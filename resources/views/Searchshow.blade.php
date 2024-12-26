@extends('layouts.app')
@section('content')

<table class="table table-striped text-center" style="margin-top:70px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Donor Status</th>
      <th scope="col">Last Donated</th>
      <th scope="col">City</th>
    </tr>
  </thead>
  <tbody>
  @if($search->isNotEmpty())
    @foreach($search as $result)
    <tr>
      <td>{{$result->name}}</td>
      <td>{{$result->phone}}</td>
      <td>{{$result->is_avail}}</td>
      <td>{{$result->last_donated}}</td>
      <td>{{$result->city}}</td>
    </tr>
    @endforeach
  @else
  <tr>
      <td></td>
      <td></td>
      <td>No Donors Available in this City.</td>
      <td></td>
      <td></td>
    </tr>  
  @endif
  </tbody>
  </table>
{{$search->links()}}
@endsection
