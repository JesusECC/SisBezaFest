$(document).ready(function(){
    $(".btn-update-item").on('click',function(e){
        e.preventDefault();

        var id=$(this).data('id');
        var href=$(this).data('href');
        var cant=$("#paquete_"+id).val();

        window.location.href=href+"/"+cant;
    });
});