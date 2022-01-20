@extends('layouts.v-app')

@section('content')
    <vc-news-show
        :news="{{$news}}"
        name="{{$name}}"
        :user="{{$user}}"
    ></vc-news-show>
@endsection
