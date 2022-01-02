@extends('layouts.v-app')

@section('content')
    <vc-gallery
        :images="{{$images}}"
        :user="{{$user}}"
    ></vc-gallery>
@endsection
