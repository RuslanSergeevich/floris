$("#child_box .table-hover tbody").sortable({revert: true,items: "tr", cursor: "move", stop: function(event, ui) {
    $.post("gallery/update-gallery-pos",{data:$("#child_box .table-hover tbody").sortable("toArray")});
    $.jGrowl("Порядок изменён успешно!", { header: "Уведомление" });
}});