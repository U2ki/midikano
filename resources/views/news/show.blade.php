@extends('layouts.v-app')

@section('content')
    <vc-news-show
        :news="{{$news}}"
        :user="{{$user}}"
    ></vc-news-show>
@endsection
