$(document).ready(function () {
    var count_quest = 3;

    function addInputClick() {
        $('#addInput').bind('click', function () {
            var new_inp = '<div><input type=\"text\" class=\"field\" id=\"inputAdd' +
                count_quest +
                '\" placeholder=\"текст1\" required>' +
                '<button type=\"button\" class=\"btn_save btnRemove p-2\" id=\"removeInput' +
                count_quest +
                '\"><i class="far fa-trash-alt"></i></button></div>';
            count_quest++;
            $("#inp_1").append(new_inp);
            $("#removeInput").bind("click", btn_rem_qu);
        });
    }
});

