@extends('layouts.app')


@section('content')
<h1>ALL CATEGORIES</h1>
<hr>
@foreach($categories as $category)
<li>{{ $category->name }}</li>
@endforeach


@endsection

