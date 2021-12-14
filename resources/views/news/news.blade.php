@extends('layouts.v-app')

@section('content')
    <vc-news
        :newsalls="{{$newsalls}}"
        :user="{{$user}}"
    ></vc-news>
@endsection
