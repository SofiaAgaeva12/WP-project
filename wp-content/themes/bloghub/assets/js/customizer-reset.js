jQuery(function ($) {
    var $container = $('#customize-header-actions');
    var $button = $('<input type="submit" name="bloghub-reset" id="bloghub-reset" class="button-secondary button bloghub-reset-button">')
        .attr('value', _BlogHubCustomizerReset.reset)
        .css({
            'float': 'right',
            'margin': '9px 0',
            'background-color': '#8571FF',
            'color': '#ffffff',
            'border-color': '#8571FF',
        });
    $button.on('click', function (event) {
        event.preventDefault();

        var data = {
            wp_customize: 'on',
            action: 'customizer_reset',
            nonce: _BlogHubCustomizerReset.nonce.reset
        };

        var response = confirm(_BlogHubCustomizerReset.confirm);

        if (!response) return;

        $button.attr('disabled', 'disabled');

        $.post(ajaxurl, data, function () {
            wp.customize.state('saved').set(true);
            location.reload();
        });
    });
    $container.append($button);
});
