@extends('layouts.v-app')

@section('content')
    <vc-error
        @if (isset($error_num))
          :error="{{$error_num}}"
        @endif
    ></vc-error>
@endsection
