function upload_loading_item_img(add_button,dataArray,newdataAll,url_add='',redirect_url=''){

    $('#loading').slideDown();
    $('#loading-content').html('Идет Загрузка пожалуйта подождите...');
    
    var totalPercent = 100 / dataArray.length;
    var x = 0;

    for (var i = 0; i < dataArray.length; i++) {
        var dataAll = {
            id_pic:dataArray[i].id_pic,
            name: dataArray[i].name,
            value: dataArray[i].value,
            old: dataArray[i].old,
        };
        $.extend(dataAll,newdataAll);
        $.post(url_add, dataAll, function(data) {

            ++x;

            $('#loading-bar .loading-color').css({ 'width': totalPercent * (x) + '%' });

            if (totalPercent * (x) == 100) {
                // Загрузка завершена
                $('#loading-content').html('Загрузка завершена! Идет перенапровление..');

                setTimeout(function() {
                    if (redirect_url !='') {
                        window.location = redirect_url;
                    }
                }, 1500);

            } else if (totalPercent * (x) < 100) {

                $('#loading-content').html('Загружается ' + dataArray[x].name + ' Пожалуйта подождите..');
            }
        });
    }
}