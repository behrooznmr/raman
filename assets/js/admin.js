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

//menu icon
jQuery(document).ready(function($){
    function initMediaUploader() {
        $('body').on('click', '.custom-media-button', function(e) {
            e.preventDefault();
            var button = $(this);
            var wrapper = button.closest('.menu-item-image-wrapper');
            var imageUrlInput = wrapper.find('.custom-media-url');
            var imagePreview = wrapper.find('.custom-media-image');
            var removeButton = wrapper.find('.custom-media-remove');

            var mediaUploader = wp.media({
                title: 'انتخاب تصویر منو',
                button: { text: 'استفاده از این تصویر' },
                multiple: false
            }).on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                imageUrlInput.val(attachment.url);
                imagePreview.attr('src', attachment.url).show();
                removeButton.show();
            }).open();
        });

        $('body').on('click', '.custom-media-remove', function(e) {
            e.preventDefault();
            var button = $(this);
            var wrapper = button.closest('.menu-item-image-wrapper');
            var imageUrlInput = wrapper.find('.custom-media-url');
            var imagePreview = wrapper.find('.custom-media-image');

            imageUrlInput.val('');
            imagePreview.attr('src', '').hide();
            button.hide();
        });
    }
    initMediaUploader();
    $(document).ajaxComplete(function(event, xhr, settings) {
        if (settings.data && settings.data.includes("action=add-menu-item")) {
            initMediaUploader();
        }
    });
});