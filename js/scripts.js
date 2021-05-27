// AJAX function for the projects filters on projects main page
(function($){

    $(document).ready(function(){
        // Reading the submit button on the form for the filtering
        $(document).on('submit', '[data-js-form=filter]', function(e){
            // Remove the form submit and page refresh
            e.preventDefault();
            // Turn the checkboxes selected into URL form with parameters - in this case project-industries and project-services
            var data = $(this).serialize();

            $.ajax({
                // URL as specified by the enqueue script in functions.php file
                url: wpAjax.ajaxUrl,
                // Returning the data from serialize function above
                data: data,
                // Type of method
                type: 'post',
                beforeSend: function () { 
                    $('.filters-form').css('opacity', '0.5');
                    $('.lds-ring').css('display', 'block');
                },
                complete: function () {
                    $('.filters-form').css('opacity', '1');
                    $('.lds-ring').css('display', 'none');
                },
                success: function(result){
                    // On success fill the div selected by this name with the result
                    $('[data-js-filter=target]').html(result);
                    // Hide the filters
                    $('.filtering-projects').removeClass('open');
                    // Reset the scroll of the body
                    $('body').removeClass('stop-scroll');
                    // Reset the z-index as it was
                    $('.project-filters-section').css('z-index', '2');
                    // Scroll to the top of the page of filters section
                    $('html, body').animate({
                        scrollTop: $("#filter").offset().top
                    }, 500);
                },
                error: function(result){
                    alert("There has been an issue when filtering, please refresh and try again!");
                },
            });
        });
    });

})(jQuery);