$('select').on('change', function() {
    $('table.table').hide();
    $('table#'+this.value).show();
});
