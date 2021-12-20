@extends('layouts.v-app')

@section('content')
    <vc-gallery
        :images="{{$images}}"
        :user="{{$user}}"
    ></vc-gallery>
    <img class="fit-picture"
         src="../../uploads/1640019959hedgehog-g06c4a51b7_640.jpg"
    >
@endsection
