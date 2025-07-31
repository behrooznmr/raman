jQuery(document).ready(function($) {

    const tabs = $('.project-settings-tabs .nav-tab-wrapper .nav-tab');
    const tabContents = $('.project-settings-tabs .tab-content-wrapper .tab-content');

    tabs.on('click', function(e) {
        e.preventDefault();
        tabs.removeClass('nav-tab-active');
        tabContents.removeClass('active');
        $(this).addClass('nav-tab-active');
        const targetContentId = $(this).attr('href');
        $(targetContentId).addClass('active');
    });

    if ($('.nav-tab-wrapper .nav-tab-active').length === 0) {
        tabs.first().trigger('click');
    }

    let mediaUploader;

    $('body').on('click', '.upload-image-button', function(e) {
        e.preventDefault();
        const button = $(this);
        const wrapper = button.closest('.image-uploader-wrapper');
        mediaUploader = wp.media({
            title: 'انتخاب عکس',
            button: { text: 'استفاده از این عکس' },
            multiple: false
        });
        mediaUploader.on('select', function() {
            const attachment = mediaUploader.state().get('selection').first().toJSON();
            wrapper.find('input[type="hidden"]').val(attachment.url);
            wrapper.find('.image-preview').attr('src', attachment.url);
            wrapper.find('.image-preview-wrapper, .remove-image-button').show();
        });
        mediaUploader.open();
    });

    $('body').on('click', '.remove-image-button', function(e) {
        e.preventDefault();
        const button = $(this);
        const wrapper = button.closest('.image-uploader-wrapper');
        wrapper.find('input[type="hidden"]').val('');
        wrapper.find('.image-preview').attr('src', '');
        wrapper.find('.image-preview-wrapper').hide();
        button.hide();
    });
});