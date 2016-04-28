@extends('layouts.material')

@section('content')

NO USER DATA!

@endsection

@section('customjs')
<script>
$.ajaxSetup({headers:{'X-CSRF-TOKEN':
        $( 'meta[name="csrf-token"]' ).attr( 'content' )}});
$('.modal-profile-pic').leanModal({
                dismissible: false, // Modal can be dismissed by clicking outside of the modal
                opacity: '.6', // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200, // Transition out duration
                ready: function() { console.log('Open'); }, // Callback for Modal open
                complete: function() { console.log('Closed'); } // Callback for Modal close
                });

function updateLinks(){
    var url = $('#updateLinks').attr('action');
    var links = $('#updateLinks').serializeArray();
        $.ajax({
            url: url,
            dataType:'JSON',
            data: links,
            type:'post',
        }).done(function(data){
            
           Materialize.toast(data.message, 4000,'',function () {
            
           });

        }).fail(function (data) { // if Fail
            var errors = data.responseJSON;
            

            $.each(errors.errors, function(index, error)
            {
             Materialize.toast(error, 4000,'',function(){

            });
            });
            
          });
    }
function submitProfilePic(id){
    var url = $('#postProfilePic'+ id).attr('action');
    var form = document.querySelector('#postProfilePic'+ id);
    var formdata = new FormData(form);
        $.ajax({
            url: url,
            dataType:'JSON',
            data: formdata,
            type:'post',
            processData: false,
            contentType: false,
        }).done(function(data){
           $('#profile_picture').empty();
           $('#profile_picture').html(data.html);
           Materialize.toast(data.message, 4000,'',function () {
            // console.log(data);
           });

        }).fail(function () { // if Fail
            var errors = data.responseJSON;

            $.each(errors.message, function(index, error)
            {
             Materialize.toast(error, 4000,'',function(){
                //
            });
            });
            
          });
    }
    function updateAboutMe(){
    var url = $('#updateAboutMe').attr('action');
    var aboutMeForm = $('#updateAboutMe').serializeArray();
        $.ajax({
            url: url,
            dataType:'JSON',
            data: aboutMeForm,
            type:'post',
        }).done(function(data){
            
           Materialize.toast(data.message, 4000,'',function () {
            console.log(data);
           });

        }).fail(function () { // if Fail
            var errors = data.responseJSON;

            $.each(errors.message, function(index, error)
            {
             Materialize.toast(error, 4000,'',function(){
                //
            });
            });
            
          });
    }
</script>
@endsection