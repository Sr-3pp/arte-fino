@extends('layouts.app')

@section('content')
    <section s-sec="privacy">
        <h1>Privacidad</h1>
        <iframe src="{{asset('docs/privacy.pdf')}}" width="100%" height="500px">
    </section>
@endsection