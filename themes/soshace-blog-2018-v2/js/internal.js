var isSearchOpen = false;

$(document).ready(function() {
    // popup window function for Social Sharing
    $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {

        // Prevent default anchor event
        e.preventDefault();

        // Set values for window
        intWidth = intWidth || '500';
        intHeight = intHeight || '400';
        strResize = (blnResize ? 'yes' : 'no');

        // Set title and open popup with focus on it
        var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
            strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
            objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
    }
    // end of popup window function for Social Sharing

    // burger styling
    var menuLastEl = {
        menu: $(".menu__links"),
        items: $("._menu__item"),
        init: function(){
            console.log(13);
            var self = this;
            this.items.filter(":last-child").addClass("last");
            $(window).on("resize", function(){
                if(self.menu.is(":visible")){
                    self.findLast();
                }
            });
        },
        findLast: function(){
            var menuWidth = this.menu.width(),
                strWidth = menuWidth;
            this.items.not(":last-child").removeClass("last");
            this.items.each(function(){
                thisWidth = $(this).outerWidth(true);
                if(strWidth - thisWidth >= 0){
                    strWidth -= thisWidth;
                }else{
                    $(this).prev().addClass("last");
                    strWidth = menuWidth - thisWidth;
                }
            });
        }
    };
    menuLastEl.init();
    // end of burger styling
    $('.input_search').keydown(function(event) {
        if (event.keyCode == 13) {
           // this.form.submit();
            event.preventDefault();
            var search = $(".input_search").val();
            var action = document.getElementById('search_form').action;
            var url = action + "?s=" + search;
            location.href = url;
        }
    });

    $("#search_form").submit(function(event){
        alert("ahahah");
        event.preventDefault();
        var search = $(".input_search").val();
        var url = this.attr('action') + "?s=" + search;
        location.href = url;
    });

    // calling social sharing popup
    $('.customer.share').on("click", function(e) {
        $(this).customerPopup(e);
    });
    // end of calling social sharing popup

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

    $(".owl-item").on('click', function(){
        $(".search_form").slideToggle(0);
        var img_obj = this.getElementsByClassName('clickable')[0];
        var url = img_obj.dataset.link;
        window.open(url);

    });

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
          /* $(".btn_menu_frame").click(function() {
            $(".header .menu").slideToggle(300);
            $(this).toggleClass("active"); return false;
          }); */

          $(".btn_search").click(function() {
              if (!isSearchOpen) {
                  $(".btn_menu").hide();
                  isSearchOpen = true;
              } else {
                  $(".btn_menu").show();
                  isSearchOpen = false;
              }
              $(".search_form").slideToggle(0);
              $(this).toggleClass("active");
              $(".input_search").focus();
              return false;
          });

         $(".btn_menu").on("click",function(){
            if(!$(this).hasClass("header__menu-button--active")){
                $(this).addClass("header__menu-button--active");
                $(".burger_menu").fadeIn(200);
                menuLastEl.findLast();
                $("thml, body").addClass("lock");
            }else{
                $(this).removeClass("header__menu-button--active");
                $(".burger_menu").hide();
                $("thml, body").removeClass("lock");
             }
        });
		
		$(".gdpr_message #link").click(function(){
			window.open("https://blog.soshace.com/soshace-privacy-policy");
		});

    });

});
     
$(document).mouseup(function (e) {
    var container = $(".search_form");
    if (container.has(e.target).length === 0){
        container.hide();
    }
});
