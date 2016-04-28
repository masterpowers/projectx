@if($categorylist)
<div class="row">
<div class="input-field offset-s1 col s10">
{!! Form::select('categorylist[]', $categorylist, $oldcategorylist, ['id' => 'categorylist', 'class' => '', 'multiple' => 'multiple', 'placeholder' => 'Choose Categories']) !!}

{!! Form::label('categorylist', 'Filter By Categories:', ['class' =>'font__label']) !!}
</div>
</div>
@endif