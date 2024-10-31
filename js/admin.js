jQuery(document).ready(function($) {
    jQuery('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({
                title: 'Upload Image',
                // mutiple: true if you want to upload multiple files at once
                multiple: false
            }).open()
            .on('select', function(e) {
                // This will return the selected image from the Media Uploader, the result is an object
                var uploaded_image = image.state().get('selection').first();
                // We convert uploaded_image to a JSON object to make accessing it easier
                // Output to the console uploaded_image
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                // Let's assign the url value to the input field
                $('#brew_logo').val(image_url);
            });
    });

    // Sort By Class
    var array = ['first', 'second'];

    jQuery.each(array, function(index, value) {
        jQuery('.seven').append(jQuery('.' + value));
    });

    // Make links dragable

    jQuery('#dragable').sortable();

    jQuery('#dragable').sortable().bind('sortupdate', function() {
        //Triggered when the user stopped sorting and the DOM position has changed.

        var classes = ['first', 'second'];

        jQuery(function() {

            if (jQuery('.row').hasClass('first')) {
                jQuery('.row').removeClass('first')
            }

            if (jQuery('.row').hasClass('second')) {
                jQuery('.row').removeClass('second')
            }

            var target = $('.target');
            var object = $('.object');
            target.each(function(index) {
                jQuery(this).addClass(classes[index % 3]);
            });

            object.each(function(index) {
                jQuery(this).val(classes[index % 3]);
            });
        });
    });
});