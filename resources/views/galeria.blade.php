@extends('layouts.app')

@section('content')
<galeria :galeria="{{json_encode($galeria)}}"></galeria>
@endsection