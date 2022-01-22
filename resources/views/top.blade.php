@extends('layouts.v-app')

@section('content')
    <vc-top
        :images="{{$images}}"
        :goodimages="{{$goodimages}}"
        :news="{{$news}}"
    ></vc-top>
@endsection
