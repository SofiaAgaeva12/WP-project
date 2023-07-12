jQuery(document).ready(function($) {
    function toggle_media_meta_boxes() {
        const postFormatSelector = $('#post-format-selector-0');
        if (postFormatSelector.length === 0) {
            return;
        }
        
        const selectedFormat = postFormatSelector.val();
        if (selectedFormat === 'audio') {
            $('#audio_meta_box').show();
            $('#video_meta_box').hide();
            $('#gallery_meta_box').hide();
        } else if (selectedFormat === 'video') {
            $('#audio_meta_box').hide();
            $('#video_meta_box').show();
            $('#gallery_meta_box').hide();
        } else if (selectedFormat === 'gallery') {
            $('#audio_meta_box').hide();
            $('#video_meta_box').hide();
            $('#gallery_meta_box').show();
        } else {
            $('#audio_meta_box').hide();
            $('#video_meta_box').hide();
            $('#gallery_meta_box').hide();
        }
    }

    // Check the selected post format every 300 milliseconds
    setInterval(toggle_media_meta_boxes, 300);

    // Handle the initial state
    toggle_media_meta_boxes();
});

// Add and Remove Gallery Images
var addImagesBtn = document.getElementById('add-gallery-images');
if (addImagesBtn) {
    addImagesBtn.addEventListener('click', function (event) {
        event.preventDefault();
        var imageIdsInput = document.getElementById('gallery_image_ids');
        var imageIds = imageIdsInput.value.split(',');
        var customUploader = wp.media({
            title: 'Add Gallery Images',
            library: {
                type: 'image'
            },
            button: {
                text: 'Add to Gallery'
            },
            multiple: true
        }).on('select', function () {
            var selection = customUploader.state().get('selection');
            selection.forEach(function (attachment) {
                attachment = attachment.toJSON();
                var imageId = attachment.id;
                if (imageIds.indexOf(imageId) === -1) {
                    imageIds.push(imageId);
                    var listItem = document.createElement('li');
                    var img = document.createElement('img');
                    img.src = attachment.url;
                    img.dataset.image_id = imageId;
                    var removeBtn = document.createElement('span');
                    removeBtn.classList.add('remove-image');
                    removeBtn.textContent = '×';
                    listItem.appendChild(img);
                    listItem.appendChild(removeBtn);
                    document.getElementById('gallery-images-list').appendChild(listItem);
                }
            });
            imageIdsInput.value = imageIds.join(',');
        }).open();
    });
}

// Remove Gallery Images
jQuery(document).on('click', '.remove-image', function (event) {
    event.preventDefault();
    var imageId = jQuery(this).prev('img').data('image_id');
    var imageIdsInput = jQuery('#gallery_image_ids');
    var imageIds = imageIdsInput.val().split(',');
    var index = imageIds.indexOf(imageId.toString());
    if (index !== -1) {
        imageIds.splice(index, 1);
        imageIdsInput.val(imageIds.join(','));
        jQuery(this).parent().remove();
    }
});

jQuery(document).ready(function($) {
    $('.bloghub-themeoptions .nav-tab-wrapper a').click(function(event) {
        event.preventDefault();
        $('.bloghub-themeoptions .nav-tab-wrapper a').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        $('.bloghub-themeoptions .tab-content').hide();
        $($(this).attr('href')).show();
    });
});