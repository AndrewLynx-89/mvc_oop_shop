$(document).ready(function() {
    /**Reset filters. Start **/
    $('#reset-filter').click(function(){
        $('#filter input[type=radio]').prop('checked', false);
        return false;
    });
    /**Reset filters. End **/
    $("div#slider_image").dropzone({
        url: '/admin/slider/uploadSliderImage',
        maxFiles: 1,
        parallelUploads: 10,
        paramName: "slider_pict",
        addRemoveLinks: true,
        maxFilesize: 1,
        dictFileTooBig: "Максимальный размер файла - 1 Мб",
        dictMaxFilesExceeded: "Достигнут лимит загрузки файлов, разрешено {{maxFiles}}",
        dictDefaultMessage: 'Изображение слайдера',
        acceptedFiles: '.jpg, .jpeg, .png, .gif',
        dictInvalidFileType: 'Разрешены к загрузке файлы: .jpg, .jpeg, .png, .gif',
        success: function (file, response) {
            $('#slider_pict').html(response);
        }
    });

    $("div#single").dropzone({
        url: '/admin/product/uploadSingle',
        maxFiles: 1,
        parallelUploads: 10,
        paramName: "single",
        addRemoveLinks: true,
        maxFilesize: 1,
        dictFileTooBig: "Максимальный размер файла - 1 Мб",
        dictMaxFilesExceeded: "Достигнут лимит загрузки файлов, разрешено {{maxFiles}}",
        dictDefaultMessage: 'Основное изображение товара',
        acceptedFiles: '.jpg, .jpeg, .png, .gif',
        dictInvalidFileType: 'Разрешены к загрузке файлы: .jpg, .jpeg, .png, .gif',
        success: function (file, response) {
            $("div#single_uploaded").html(response);
        }
    });

    $("div#multi").dropzone({
        url: '/admin/product/uploadMulti',
        maxFiles: 10,
        uploadMultiple: true,
        parallelUploads: 10,
        paramName: "multi",
        addRemoveLinks: true,
        maxFilesize: 1,
        dictFileTooBig: "Максимальный размер файла - 1 Мб",
        dictMaxFilesExceeded: "Достигнут лимит загрузки файлов, разрешено {{maxFiles}}",
        dictDefaultMessage: 'Изображение галереии товара',
        acceptedFiles: '.jpg, .jpeg, .png, .gif',
        dictInvalidFileType: 'Разрешены к загрузке файлы: .jpg, .jpeg, .png, .gif',
        success: function (file, response) {
            $('div#multi_uploaded').html(response);
        }
    });


    $("img#delete").on('click',function () {
        var $this = $(this),
            id = $this.data('id'),
            src = $this.data('src');
        $.ajax({
            url:  '/admin/product/deleteGallery',
            data: {id: id, src: src},
            type: 'POST',
            success: function (result) {
                if (result){
                    $this.fadeOut();
                }
            }

        })
    });

});




