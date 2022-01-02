@extends('layouts.v-app')

@section('content')
    <vc-gallery-show
        :post="{{$post}}"
        :image="{{$img}}"
        :user="{{$user}}"
    ></vc-gallery-show>
@endsection
