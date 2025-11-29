@extends('theme.layout')


@section('content')
  <h1> {{ $name }}</h1>
  <hr>
  <p> {!! $framework !!} </p>
  <hr>
  @if(isset($age))
    <p> {{ $age }} </p>
  @endif
@endsection