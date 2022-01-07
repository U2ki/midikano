@extends('layouts.v-app')

@section('content')
    <vc-top
        :images="{{$images}}"
        :news="{{$news}}"
    ></vc-top>
@endsection
