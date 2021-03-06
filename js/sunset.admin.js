jQuery(document).ready(function($){

    var mediaUploader;

    $('#upload-button').click(function(e){
        e.preventDefault();
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a profile picture',
            button: {
                text: 'Choose picture',
                multiple: false
            }
        });

        mediaUploader.on('select',function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
            $('#profile-picture-image').css('background-image','url('+attachment.url+')');
        });

        mediaUploader.open();
    });

    $('#remove-picture').click(function(e){

        e.preventDefault();
        var answer = confirm('Are you sure to want to remove your profile picture');

        if(answer == true){
            $('#profile-picture').val('');
            $('.sunset-general-form').submit();
        }
        return;
    });

});