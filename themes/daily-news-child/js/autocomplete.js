(function($){

    $(document).ready(function(){

        $('input[name=top_search_autocomplete]').focusout(function(){
            $(".client-components-search-search-results__wrapper ul").html('');
            $(".client-components-search-search-results__wrapper").hide();
        });

        $('input[name=top_search_autocomplete]').keyup(function(e){
            if(e.keyCode == 8) {
                $(".client-components-search-search-results__wrapper ul").html('');
                $(".client-components-search-search-results__wrapper").hide();
            }
            var input = $(this).val();
            var url = "https://autocomplete.tipranks.com/api/Autocomplete/getAutoCompleteNoSecondary";
            if (input.length >= 3) {

                $(".client-components-search-auto-complete__loader").show();

                var link = "http://tipranks.com";
                var request = $.getJSON(url+'/?name='+input, function(data) {
                    if (data.length > 0) {
                        $(".client-components-search-search-results__wrapper").show();
                    }
                    for (var i = 0; i < data.length; i++) {

                        if (data[i]['category'] === 'ticker') {
                            
                            console.log(data[i]);

                            $(".client-components-search-auto-complete__loader").hide();
                            link += '/stocks/'+data[i]['value'];
                            $(".client-components-search-search-results__wrapper ul").addClass('client-components-search-search-results__categoryList');
                            $(".client-components-search-search-results__wrapper ul").append('<li class="client-components-search-search-results__categoryItem"><a href="'+link+'/" class="client-components-search-search-results__link"><span class="client-components-search-search-results__cell client-components-search-search-results__before undefined"><span class="client-components-search-search-results__highlight"><span><span class="highlighted">'+ data[i]['value'] +'</span></span></span></span>'+'<span class="client-components-search-search-results__cell client-components-search-search-results__option client-components-search-search-results__tickerOption"><span class="client-components-search-search-results__highlight"><span>' + data[i]['label'] + '</span></span></span></a></li>');
                        }
                    }
                });
            }
        });
    });

})(jQuery);