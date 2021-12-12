@extends('layouts.v-app')

@section('content')
    <vc-news-show
        :news="{{$news}}"
        :userStatus="{{$user_status}}"
    ></vc-news-show>
@endsection
