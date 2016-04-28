@extends('layouts.material')

@section('content')
Product Name : {{ $product->name }}
<br>
Product Price : Php {{ $product->price }}
<br>
Product Caption: {{ $product->caption }}
<br>
Product Desscriptioon: {{ $product->description }}
<br>
Product Slug: {{ $product->slug }}
@endsection