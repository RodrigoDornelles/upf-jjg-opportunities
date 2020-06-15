/**
 * Exlusão de registros nas grids
 */
jQuery(document).on('click','a.sa-delete', function(e) {
    e.preventDefault();
    var url = jQuery(this).prop('href');
    var grid = jQuery(this).data('pjax-id');
    var question = jQuery(this).data('question');
    var success = jQuery(this).data('success');
    var id = url.split("/").pop();

    swal({
        title: question,
        type: 'warning',
        cancelButtonText: 'Cancel',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        showLoaderOnConfirm: true,
        preConfirm: function() {
            jQuery.ajax({
                cache: true,
                url: url,
                type: 'POST',
                data: {id : id}
            }).always(function() {
                jQuery.pjax.reload({container:grid});
            }).done(function() {
                swal({
                    title: success,
                    type: 'success',
                    timer: 2000
                });
            }).fail(function() {
                swal('Desculpe!', 'ocorreu um erro inesperado', 'error');
            });
        }
    });        
    return false;
});