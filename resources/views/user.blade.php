@extends('layouts.v-app')

@section('content')
    <vc-user
        name="{{$name}}"
        :status="{{$status}}"
        :img="{{$img}}"
        :news="{{$news}}"
        :good="{{$good}}"
        :comment="{{$comment}}"
    ></vc-user>
@endsection
