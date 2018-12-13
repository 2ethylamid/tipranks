$(document).ready(function() {
    
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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJpbnRlcm5hbC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcclxuICAgIFxyXG4gICAgQEBpbmNsdWRlKCdwYXJ0aWFscy9wYXJ0aWFscy5qcycpXHJcbiAgICBcclxuICAgICQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICQoXCIuYnRuX21lbnVfZnJhbWVcIikuY2xpY2soZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgJChcIi5oZWFkZXIgLm1lbnVcIikuc2xpZGVUb2dnbGUoMzAwKTtcclxuICAgICAgICAkKHRoaXMpLnRvZ2dsZUNsYXNzKFwiYWN0aXZlXCIpOyByZXR1cm4gZmFsc2U7XHJcbiAgICAgIH0pO1xyXG4gICAgICBcclxuICAgICAgJChcIi5idG5fc2VhcmNoXCIpLmNsaWNrKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICQoXCIuc2VhcmNoX2Zvcm1cIikuc2xpZGVUb2dnbGUoMCk7XHJcbiAgICAgICAgJCh0aGlzKS50b2dnbGVDbGFzcyhcImFjdGl2ZVwiKTsgcmV0dXJuIGZhbHNlO1xyXG4gICAgICB9KTtcclxuICAgIH0pO1xyXG5cclxufSk7XHJcbiAgICAgXHJcbiQoZG9jdW1lbnQpLm1vdXNldXAoZnVuY3Rpb24gKGUpIHtcclxuICAgIHZhciBjb250YWluZXIgPSAkKFwiLnNlYXJjaF9mb3JtXCIpO1xyXG4gICAgaWYgKGNvbnRhaW5lci5oYXMoZS50YXJnZXQpLmxlbmd0aCA9PT0gMCl7XHJcbiAgICAgICAgY29udGFpbmVyLmhpZGUoKTtcclxuICAgIH1cclxufSk7Il0sImZpbGUiOiJpbnRlcm5hbC5qcyJ9
