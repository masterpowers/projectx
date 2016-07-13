@extends('layouts.material')
@section('content')
<!-- YOUR MAIN PAGE CONTENT IS HERE!!! -->
<!-- TO ADD PAGINATION IN CONTENT USE THIS -->
{{-- @if($items->hasPages())
    <div class="pagination-wrapper">
        <div class="pagination-wrapper-inner">
            {!! (new App\Pagination($))->render() !!}
        </div>
    </div>
@endif --}}
<table>
    <thead>
      <tr>
          <th data-field="id">ID<th>
          <th data-field="username">Username</th>
          <th data-field="price">Item Price</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>Alvin</td>
        <td>Eclair</td>
        <td>$0.87</td>
      </tr>
      <tr>
        <td>Alan</td>
        <td>Jellybean</td>
        <td>$3.76</td>
      </tr>
      <tr>
        <td>Jonathan</td>
        <td>Lollipop</td>
        <td>$7.00</td>
      </tr>
    </tbody>
</table>
<br>
<hr>
{{ $users }}
<hr>
@foreach($users as $user)
{{ $user->email }}
@endforeach
@endsection
