@if($products->hasPages())
<div class="row" id="page">
<div class="col s12 center">
{!! (new App\Pagination($products))->render() !!}
</div>
@endif
