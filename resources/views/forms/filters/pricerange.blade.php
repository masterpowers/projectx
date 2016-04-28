<div class="row">
<div class="input-field offset-s1 col s10">
<div class="col s12 priceSlider"></div>
<label class="font__label" style="font-size: 12px; margin-top: -50px;">Filter By Price Range:</label>
</div>
</div>

<input id="lowerhandle" type="hidden" name="pricerange[1]" {{ (($oldpricerange) ? 'value='.$oldpricerange[0] : 'value=0') }}>


<input id="upperhandle" type="hidden" name="pricerange[2]" {{ (($oldpricerange) ? 'value='.$oldpricerange[1] : 'value='.$maxStart) }}>
@section('customjs')
<script>

	sliders = document.getElementsByClassName('priceSlider');
	var sliderhandle = [document.getElementById('lowerhandle'),
  document.getElementById('upperhandle')
];

for ( var i = 0; i < sliders.length; i++ ) {

	noUiSlider.create(sliders[i], {
		start: [{{ (($oldpricerange) ? $minStart : 0) }}, {{ $maxStart }}],
		connect: true,
		step: {{ $step }},
		range: {
			'min': 0,
			'max': {{ $maxRange }}
		},
		format: wNumb({
			decimals: 0,
			thousand: ',',
    		prefix: '₱',
		})
	});
sliders[i].noUiSlider.on('change', function( valucalculatores, handle ) {
	var currency = values[handle];
	var number = Number(currency.replace(/[^0-9\.]+/g,""));
	sliderhandle[handle].value = number;

});

}

var pinnedheight = $('.pinner').offset().top;
var windowHeight = $(window).height();
var windowWidth = $(window).width();
var footerheight = $('footer').offset().top;
var total = footerheight - (windowHeight+pinnedheight);
if (total >= windowHeight) {
$('.pinner').pushpin({ top: pinnedheight,
      bottom: total,
      offset: 70 });	
}
if(windowWidth <= 1024){
	$('.pinner').css('width', '350px');
}


</script>
@endsection
