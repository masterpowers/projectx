@extends('layouts.material')

@section('critital')
<!-- Add Here Above Fold Content -->
@endsection

@section('content')
<br>
<!-- Start Content -->
<div class="row">

<!-- LEFT DIV -->
<!-- Show This Filter For Medium and Large Device -->
<div class="col s12 m4 l4 hide-on-small-only">
{!! Form::open(['route' => 'guest::product@index', 'method' => 'GET', 'class' => 'col s12']) !!} 
@include('forms.filters')
<br>
<div class="row">
{!! Form::submit('Filter', ['class' => 'btn offset-s1 col s10']) !!}
</div>
{!! Form::close() !!}
</div>
<!-- End Filter For Large and Medium Devices -->
<!-- Show Button Filter on Small Devices On Click -->
<div class="row hide-on-med-and-up">
<a class="waves-effect waves-light btn modal-trigger col s10 offset-s1" href="#filterModal" id="filters">Filter Products</a>
</div>
<!-- End Filter for Small Devices -->
<!-- Show Filter Modal -->
<div id="filterModal" class="modal modal-fixed-footer">
{!! Form::open(['route' => 'guest::product@index', 'method' => 'GET', 'class' => '']) !!} 
<div class="modal-content">
@include('forms.filters')
</div>
<div class="modal-footer">
{!! Form::submit('Filter', ['class' => 'btn col s12']) !!}
</div>
{!! Form::close() !!}
</div>
<!-- End Filter Modal -->
<!-- END LEFT DIV -->

<!-- RIGHT DIV -->

<div class="col s12 m8 l8">
<!-- Check if there is Product -->
@if($products->count())
@foreach ($products as $product)
<!-- START Card Column -->
<div class="col s12 m6 l4">
@include('partials.card.product', ['product' => $product])
</div> 
<!-- END Card Column -->
@endforeach

<!-- Products Pagination -->
@include('partials.pagination.product', ['products' => $products])
<!-- No Product Results From Query -->
@else
<div class="row">
<div class="col s12 center">
<h2 class="amber-text text-lighten-2 center">WHOOPS! NO RESULT!</h2>
</div>
</div>
@endif
<!-- End If -->
</div>
<!-- END RIGHT DIV -->
</div>
<!-- End Content -->
@endsection

