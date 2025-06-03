jQuery(document).ready(function ($) {
    $('textarea[data-editor]').each(function () {
        const textarea = $(this);
        const mode = textarea.data('editor');

        const settings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
        settings.codemirror = settings.codemirror || {};
        settings.codemirror.mode = mode;

        wp.codeEditor.initialize(textarea, settings);
    });
});
