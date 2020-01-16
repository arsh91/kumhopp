@extends('layouts.front-layout')

@section('content')
<h1>{{ $page->name }}</h1>
<p class="lead">{!! html_entity_decode($page->description) !!}</p>

@stop