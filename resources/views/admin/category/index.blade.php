@extends('layouts.app')


@section('content')
<h1>ALL CATEGORIES Nested!</h1>
<hr>
<ul>
@foreach($categories as $node)
{!! renderNode($node) !!}
@endforeach
</ul>


@endsection

