$('select').on('change', function() {
    $('table.table').hide();
    $('table#'+this.value).show();
});
$('.all-tables').children().children().hide();
$('.all-tables').children().children().first().show();

