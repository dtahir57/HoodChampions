$(document).ready(function(){

  $('.trash').each(function(){
    $(this).on( 'click', function(event){
      event.preventDefault();
      $(this).parent().find('.remove-action').addClass('show');
      $(this).addClass('stay');
    });
  });
  
  $('.dismiss').each(function(){
    $(this).on( 'click', function(event){
      event.preventDefault();
      $(this).parent().parent().removeClass('show');
      $(this).parent().parent().parent().find('.trash').removeClass('stay');
    });
  });

  $('#first-place').select2();
  $('#second-place').select2();
  $('#third-place').select2();
  $('#max-groups').select2();
  
  $('#sela').select2();
  $('#selb').select2();
  // img uploader
  
  
    if( $('.file-holder').files.length == 0 ){
      $('.remove-img').hide();
    } else {
      $('.remove-img').show();
    }
  
});

$('.remove-img').on('click', function(e){
  e.preventDefault();
});

$(".img-uploader").unbind("click").bind("click", function () {
  $("input.file-holder").click();
});
function readURL(input) { 
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.remove-img').show();
      $('.block-btn').text('Photo Added')
        .removeClass('btn-default')
        .addClass('btn-outline')
        .attr("disabled", true);
      reader.onload = function (e) {
        $('.img-box img')
        .addClass('visible')
        .attr('src', e.target.result);
        
      };
      
      reader.readAsDataURL(input.files[0]);
    }
    else{
      $('.img-box img').removeClass('visible');
      $('.remove-img').hide();
      }
    }
    
  // img uploader end

  $('.categories-slider').owlCarousel({
    loop:false,
    margin:30,
    nav:true,
    navText: ["<i class='far fa-chevron-left'>","<i class='far fa-chevron-right'>"],
    responsive:{
      0:{
        margin:10,
        items:3
      },
      600:{
        items:4
      },
      1000:{
          margin:20,
          items:6
        }
    }
});