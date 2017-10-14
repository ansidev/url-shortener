@extends('layout.middle')
@section('middle-content')
    @if(isset($message))
        @component('component.alert', ['alertType' => $alertType])
            {{ $message }}
        @endcomponent
    @elseif (isset($url) and isset($shortenUrl))
        @component('component.alert', ['alertType' => $alertType])
            URL <a href="{{ $url }}" target="_blank">{{ $url }}</a> was shoten to <strong><a href="{{ $shortenUrl }}" target="_blank">{{ $shortenUrl }}</a></strong>.
        @endcomponent
    @endif
    {!! Form::open(['route' => 'url.shortenUrl', 'class' => 'form-inline', 'method' => 'POST' ]) !!}
    <div class="form-group">
        <label for="url" class="mb-2 mr-sm-2 mb-sm-0">Enter a link</label>
        <input type="url" required class="form-control mb-2 mr-sm-2 mb-sm-0" id="url" name="url"
               placeholder="Enter URL">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    {!! Form::close() !!}
@endsection
