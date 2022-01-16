@extends('layouts.v-app')

@section('content')
    <vc-home
        :user="{{ Auth::user() }}"
        :img="{{$img}}"
        :news="{{$news}}"
        :good="{{$good}}"
        :comment="{{$comment}}"
    ></vc-home>
@endsection
