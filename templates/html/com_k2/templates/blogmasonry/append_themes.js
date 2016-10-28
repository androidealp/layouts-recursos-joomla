/**
para o masory funcionar adicione este script


**/
if($('div').hasClass('box-mason'))
{
  var $grid = $('.box-mason').masonry();

  $grid.on( 'click', '.item-masory', function(e) {
    e.preventDefault();
    var boxid = $($(this).data('boxid'));
    var url =  $(this).prop('href');

    boxid.append("<div id='contentload' style='width:100%; z-index:1000; top:0; position:absolute; display:block; background:rgba(255,255,255,0.6);height:"+boxid.height()+"px;'><div class='uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center'><p class='uk-text-center'><i class='uk-icon-spinner uk-icon-spin uk-icon-large'></i></p></div></div>");

    $.each($('.box-mason').children('.uk-width-medium-6-10'),function(i,v){
      var Box = $(this);

      Box.children('.box-conteudo').show('slow',function(){

        Box.children('.content-box').remove();
        Box.removeClass('uk-width-medium-6-10');
        Box.addClass('uk-width-medium-3-10');
      });

    });

    $.get(url, function(data){
      $grid.masonry('layout');
      boxid.children('.box-conteudo').hide('slow',function(){

        $('#contentload').remove();
        boxid.append(data);
        boxid.removeClass('uk-width-medium-3-10');
        boxid.addClass('uk-width-medium-6-10');



      });

      $grid.masonry( 'on', 'layoutComplete', function() {
      setTimeout(function(){
        $('html, body').animate({
             scrollTop: boxid.offset().top - 50
         }, 1000);
      },900);

    });


    });

  });




  $grid.on( 'click', '[data-closebox]', function(e) {
    e.preventDefault();
    var boxid = $($(this).data('closebox'));

    boxid.children('.content-box').hide('slow',function(){
      boxid.removeClass('uk-width-medium-6-10');
      boxid.addClass('uk-width-medium-3-10');
      boxid.children('.box-conteudo').show('slow',function(){

        boxid.children('.content-box').remove();

      });
    });



    //$(this).toggleClass('uk-width-medium-1-3');
    // trigger layout after item size changes
    $grid.masonry('layout');
  });

}
