<!-- div class="social__list social__list_vert" -->
<div class="social__list social__list_horiz">
    <div class="social__list__item social__list__item_fb">
        <script>
           /* $(document).ready(function() {
                $('.fb-share').click(function(e) {
                    e.preventDefault();
                    window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
                    return false;
                });
            }); */

           (function($){

               /**
                * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
                *
                * @param  {[object]} e           [Mouse event]
                * @param  {[integer]} intWidth   [Popup width defalut 500]
                * @param  {[integer]} intHeight  [Popup height defalut 400]
                * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
                */
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

               /* ================================================== */

               $(document).ready(function ($) {
                   $('.customer.share').on("click", function(e) {
                       $(this).customerPopup(e);
                   });
               });

           }(jQuery));
        </script>
        <a href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" target="_blank" class="facebook customer share">Share <span>via Facebook</span></a>
    </div>
    <div class="social__list__item social__list__item_tw">
        <a href="https://twitter.com/share?url=<?php the_permalink() ?>&hashtags=soshace"  title="Click to share this post on Twitter" class="twitter customer share">Share <span>via Twitter</span></a>
    </div>
    <div class="social__list__item social__list__item_gl">
        <a class="google_plus customer share" href="https://plus.google.com/share?url=<?php the_permalink() ?>" title="Google Plus Share" target="_blank">Share <span>via Google+</span></a>
    </div>
</div><!-- /social__list -->