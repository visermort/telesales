$(function() {

    $('body').on('click', 'td', function(){
        $('#model-data').find('tr').removeClass('active');
        $(this).parent('tr').addClass('active');

    });

    //при выборе типа заказа, грузим список элементов данного типа
    $('#item_type').on('change', comboChange);

    //при выборе вручную снимаем атрибут, чтобы не мешался потом запускаем
    function comboChange(){
        $('#item_id').data('value', '');
        loadCombo();
    }
    //загрузка списка элементов для комбо-бокса
    function loadCombo(){
        var select = $('#item_type');
        if(select) {
            var objType = select.val();
            if (objType) {
                $.ajax({
                    url: '/orders/getobjs',
                    data: {obj: objType},
                    type: 'get',
                    dataType: 'json'
                }).done(function (response) {
                    if (response.items != null) {
                        var items = response.items,
                            content = '<option value="">-- Выберите заказ --</option>',
                            selectTarget = $('#item_id'),
                            dataValue = selectTarget.data('value');
                        items.forEach(function (item, key, items) {
                            //формируем options если код равен значению в data-value то selected
                            content = content + '<option value="' + item[objType + '_id'] + '"' +
                                (dataValue == item[objType + '_id'] ? "selected" : '') +
                                '>' + item[objType + '_name'] + '</option>';
                        });
                        selectTarget.html(content);
                    } else {
                        console.log(response);
                    }
                }).fail(function (response) {
                    console.log(response);
                });
            }
        }

    }
    //после загрузки запускаем - нужно для формы редактирования
    loadCombo();

});

