@extends('layout')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  <!-- {{print_r($bike)}} -->

  <div>
    <h3>{{$bike['name']}}</h3>
    <h4>{{$bike['brand']}}</h4>
    <h4>{{$bike['price']}}</h4>

  </div>
</div>


@endsection('content')