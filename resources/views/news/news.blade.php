@extends('layouts.v-app')

@section('content')
    <vc-news :newsalls="{{$newsalls}}"></vc-news>
@endsection
