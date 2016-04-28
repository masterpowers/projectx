@extends('layouts.material')
@section('content')
@foreach ($products as $product)
	{{ $product->name }}<br>
@endforeach
<hr>
@foreach ($categorylist as $category)
	{{ $category }}<br>
@endforeach
@endsection
