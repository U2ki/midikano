@extends('layouts.v-app')

@section('content')
    <vc-gallery-show
        :post="{{$post}}"
        name="{{$name}}"
        :userid="{{$userid}}"
        :image="{{$img}}"
        :user="{{$user}}"
        :comments="{{$comments}}"
        :comment_user="{{$comment_user}}"
        :login_info="{{$login_info}}"
    ></vc-gallery-show>
@endsection
