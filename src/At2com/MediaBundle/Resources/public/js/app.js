$(document).ready(function(){
    $('#media2download').fileinput({
        language: "fr",
        maxFileCount: 5,
        uploadUrl: Routing.generate('at2com_media.upload'),
        uploadExtraData: {
            'media-type': $('#media2download').attr('media-type')
        }
    });
});
