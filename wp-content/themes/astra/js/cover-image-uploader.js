jQuery(document).ready(function ($) {
    $('.upload-cover-image').on('click', function (e) {
        e.preventDefault();
        var button = $(this);
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or Upload Cover Image',
            button: {
                text: 'Use this image',
            },
            multiple: false
        });
        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').first().toJSON();
            button.prev('#cover_image').val(attachment.url);
        });
        file_frame.open();
    });
});