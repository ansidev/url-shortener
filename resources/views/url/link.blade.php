@extends('layout.middle')
@section('meta')
<meta http-equiv="refresh" content="5;url={{ $url }}" />
@endsection
@section('middle-content')
<h3>You will be redirect to real link after 5 seconds, or you can <a href="{{ $url }}" class="">click here</a> to go there now.</h3>
@endsection