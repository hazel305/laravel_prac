@extends('layout')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  @if(count($bikes)>0)
  @foreach($bikes as $bike)
  <div>
    <h3><a href="{{route('bikes.show',['bike'=>$bike['id']])}}">{{$bike['name']}}</a></h3>
    <p>Made by : {{$bike['brand']}}</p>
  </div>

  @endforeach

  <div>

    {{$userInput}}
  </div>
  @else
  <p>출력할 내용이 없습니다.</p>
  @endif
</div>


@endsection('content')