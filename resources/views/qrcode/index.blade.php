@extends('templates.template')
@section('content')
{{--  reference https://www.mynotepaper.com/generate-qr-code-in-laravel  --}}
    {!! QrCode::size(500)->generate($text); !!}
@endsection
