@extends('layouts.v-app')

@section('content')
    <vc-news
        :newsalls="{{$newsalls}}"
        :userStatus="{{$user_status}}"
    ></vc-news>
@endsection
