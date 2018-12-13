$(document).ready(function() {

    $('.input_search').keydown(function(event) {
        if (event.keyCode == 13) {
            //$('.btn_search').click();
            this.form.submit();
            //return false;
        }
    });


    
    $(function(){
    var wrapper = $( ".file_upload" ),
        inp = wrapper.find( "input" ),
        btn = wrapper.find( ".button" ),
        lbl = wrapper.find( "mark" );

    // Crutches for the :focus style:
    inp.focus(function(){
        wrapper.addClass( "focus" );
    }).blur(function(){
        wrapper.removeClass( "focus" );
    });

    var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

    inp.change(function(){
        var file_name;
        if( file_api && inp[ 0 ].files[ 0 ] )
            file_name = inp[ 0 ].files[ 0 ].name;
        else
            file_name = inp.val().replace( "C:\\fakepath\\", '' );

        if( ! file_name.length )
            return;

        if( lbl.is( ":visible" ) ){
            lbl.text( file_name );
            btn.text( "Upload" );
        }else
            btn.text( file_name );
    }).change();

});
$( window ).resize(function(){
    $( ".file_upload input" ).triggerHandler( "change" );
});
    $(".carousel").owlCarousel({
        center: true,
        items: 2,
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
          600: {
            items: 2
          }
        }
    });
    
    $(function() {
      $(".btn_menu_frame").click(function() {
        $(".header .menu").slideToggle(300);
        $(this).toggleClass("active"); return false;
      });
      
      $(".btn_search").click(function() {
        $(".search_form").slideToggle(0);
        $(this).toggleClass("active"); return false;
      });
    });

});
     
$(document).mouseup(function (e) {
    var container = $(".search_form");
    if (container.has(e.target).length === 0){
        container.hide();
    }
});