@extends('layouts.v-app')

@section('content')
    <vc-error
        :error="{{$error_num}}"
    ></vc-error>
@endsection
