<script type="text/javascript">
(function($){
  $(function(){       //Start of function
  $('.collapsible').collapsible({
      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  $('ul.tabs').tabs(); 
   $('select').material_select();

  // initialize sidenav button
   $('.button-collapse').sideNav({
      menuWidth: 280, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }); //End Button Collapse

   // modal trigger in Navbar Shopcart for bottomsheet
   $('#nav-cart').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: '.6', // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { console.log('Open'); }, // Callback for Modal open
      complete: function() { console.log('Closed'); } // Callback for Modal close
      });  // End MOdal Trigger

   // modal trigger in Pagination For Product Add Qty Modal
   $('.modal-pagination').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: '.6', // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { console.log('Open'); }, // Callback for Modal open
      complete: function() { console.log('Closed'); } // Callback for Modal close
      });
   $('#filters').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: '.6', // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { console.log('Open'); }, // Callback for Modal open
      complete: function() { console.log('Closed'); } // Callback for Modal close
      });

   $('#navbtnmodal').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: '.6', // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { console.log('Open'); }, // Callback for Modal open
      complete: function() { console.log('Closed'); } // Callback for Modal close
      });
     $('#account_menu').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: '.6', // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { console.log('Open'); }, // Callback for Modal open
      complete: function() { console.log('Closed'); } // Callback for Modal close
      });


   // initialize parallax
   $('.parallax').parallax();
   // initialize slider
   $('.slider').slider();
   // Open and Close Nav Search Bar
   $("#searchable").click(function() {
      $("#navsearch").toggle();
      $("#q").focus();
    });
   // Close on Blur Nav Bar
   $( "#q" ).blur(function(){
    $( "#navsearch" ).toggle();
   });
   $('.toggle').click(function(e) {
    e.preventDefault();
  
    var $this = $(this);
  
    if ($this.next().hasClass('show')) {
        $this.next().removeClass('show');
        $this.find('i').text('add');
        $this.next().slideUp(350);
    } else {
        $this.parent().parent().find('li .inner').removeClass('show');
        $this.parent().parent().find('li .inner').slideUp(350);
        $this.next().toggleClass('show');
        $this.find('i').text('remove');
        $this.next().slideToggle(350);
        
    }
});
   $.ajaxSetup({headers:{'X-CSRF-TOKEN':
        $( 'meta[name="csrf-token"]' ).attr( 'content' )}});
   function pageloader(v){
      if(v == 'on'){
        $('#search_form').css({
          opacity : 0.2
        });
        $('#pageloader').show();
      }else{
        $('#search_form').css({
          opacity : 1
        });
        $('#pageloader').hide();
      }
    }

     // ajax call for autocomplete
   $( "#q" ).autocomplete({
    source: "search/autocomplete",
    minLength: 3,
    autoFocus: true,
    select: function(event, ui) {
      $('#q').val(ui.item.value);

    }
  });

    // autocomplete added behavior
    $( "input[name='q']" ).on( "focus", function(){
        $( "input[name='q']" ).css( "color", "#e57373" );
        $( "input[name='q']" ).val();
        $( ".ui-autocomplete" ).show();
    });

    $( "input[name='q']" ).change(function(){
      $( ".ui-autocomplete" ).empty();
    });

function productLink( url ) {
window.location = url;
}
    // ajax call for search sponsorlink
    $("#search_form").submit(function(e){
                e.preventDefault();
                var url = $('#search_form').attr('action');
                var search_form = $('#search_form').serializeArray();
                pageloader('on');
                $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: search_form,
                        success: function(data){
                        // stop the loader
                        pageloader('off');

                        $('#pageloader').addClass('teal lighten-2').fadeIn(2000, function(){
                          $(this).hide();
                          $(this).removeClass("teal lighten-2");
                        });

                        var name = data.productdata.name;
                        console.log(name);

                        var price = data.productdata.price;
                        console.log(price);

                        var description = data.productdata.description;
                        console.log(description);

                        var caption = data.productdata.caption;
                        console.log(caption);

                        var image = data.productdata.image;
                        console.log(image);

                        var slug = data.productdata.slug;

                        var rating_cache = data.productdata.rating_cache;
                        console.log(rating_cache);
                        var rating_count = data.productdata.rating_count;
                        console.log(rating_count);

                        // fill the input value with search value
                        $( "input[name='q']" ).val(name);

                        // Append All Data to View Below this Code

                        // Show Toast Message
                        Materialize.toast(data.message, 1500,'',function(){console.log('Product Found');
                          productLink('products/'+slug);
                      });
                        

                        },
                        error: function(data){

                        pageloader('off');
                        var data = data.responseJSON;

                        console.log(data);
                        Materialize.toast(data.message, 4000,'',function(){console.log('Product Not Found!');});



                        } // END ERROR
                      });


        });

   



    });// end of document ready
})(jQuery);


</script>