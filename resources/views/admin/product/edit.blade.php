@extends('layouts.material')

@section('content')

<div class="container __container">

<h5 class="page__title">Edit Product</h5>

{!! Form::model($product, ['route' => ['admin::product@update', $product->slug], 'method' => 'PATCH', 'class' => 'col s12 form', 'files' => true]) !!} 

<div class="row">
<div class="input-field offset-s1 col s10">
<i class="material-icons prefix icon__lower">fingerprint</i>
{!! Form::label('sku', 'Sku', ['class' => 'font__label']) !!}
{!! Form::text('sku', null,['id' => 'sku','class' => 'validate', 'placeholder' => 'What\'s the Model, Brand or any SKU?', 'required']) !!}
@if ($errors->has('sku'))
<span class="help-block">
    <strong>{{ $errors->first('sku') }}</strong>
</span>
@endif
</div>
</div>

<div class="row">
<div class="input-field offset-s1 col s10">
<i class="material-icons prefix icon__lower">local_offer</i>
{!! Form::label('name', 'Name', ['class' => 'font__label']) !!}
{!! Form::text('name', null,['id' => 'name', 'class' => 'validate', 'placeholder' => 'What\'s The Name Of the Product?', 'required']) !!}
@if ($errors->has('name'))
<span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>

<div class="row">
<div class="input-field offset-s1 col s10">
<i class="material-icons prefix icon__lower">attach_money</i>
{!! Form::label('price', 'Price', ['class' => 'font__label']) !!}
{!! Form::text('price', null,['id' => 'price', 'class' => 'validate', 'placeholder' => 'How Much You Want To Sell It?', 'required']) !!}
@if ($errors->has('price'))
<span class="help-block">
    <strong>{{ $errors->first('price') }}</strong>
</span>
@endif
</div>
</div>

<div class="row">
<div class="input-field offset-s1 col s10">
<i class="material-icons prefix">subject</i>
{!! Form::label('caption', 'Caption', ['class' => 'font__label']) !!}
{!! Form::textarea('caption', null,['id' => 'caption', 'class' => 'validate materialize-textarea', 'placeholder' => 'Tell About It\'s Unique Selling Proposition!', 'length' => '255', 'required']) !!}
@if ($errors->has('caption'))
<span class="help-block">
    <strong>{{ $errors->first('caption') }}</strong>
</span>
@endif
</div>
</div>

<div class="row">
<div class="input-field offset-s1 col s10">
<i class="material-icons prefix">description</i>
{!! Form::label('description', 'Description', ['class' => 'font__label']) !!}
{!! Form::textarea('description', null,['id' => 'description', 'class' => 'validate materialize-textarea', 'placeholder' => 'Summarize the Content Here!', 'length' => '65535', 'required']) !!}
@if ($errors->has('description'))
<span class="help-block">
    <strong>{{ $errors->first('description') }}</strong>
</span>
@endif
</div>
</div>

<div class="row">
<div class="file-field input-field offset-s1 col s10">

<div class="btn">
    <span>Image</span>
    <input type="file" name="picture">
</div>
<div class="file-path-wrapper">
<input class="file-path validate" type="text" value="{{ $product->image }}">
</div>
@if ($errors->has('picture'))
<span class="help-block">
    <strong>{{ $errors->first('picture') }}</strong>
</span>
@endif
</div>
</div>




<div class="row">
<div class="input-field offset-s1 col s10">
{!! Form::select('categorylist[]', $categorylist, null, ['id' => 'categorylist', 'class' => '', 'multiple' => 'multiple', 'placeholder' => 'Choose Categories']) !!}
{!! Form::label('categorylist', 'Categorize', ['class' =>'font__label']) !!}
</div>
</div>

<div class="row">
{!! Form::submit('Edit ' .$product->name, ['class' => 'btn offset-s1 col s10']) !!}
</div>


{!! Form::close() !!}



</div>
@endsection



@section('customjs')
<script>
    $('#categorylist').material_select();
</script>
@endsection
