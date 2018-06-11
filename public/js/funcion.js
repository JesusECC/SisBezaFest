$(document).ready(function(){
    $(".btn-update-item").on('click',function(e){
        e.preventDefault();

        var id=$(this).data('id');
        var href=$(this).data('href');
        var cant=$("#paquete_"+id).val();
        if (cant=="" || cant=="0") {
            
            if (cant=="0") {
                alert("La cantidad no piede ser "+cant);            
            }else{
                alert("La cantidad es obligatorio");            
            }
        }else{
            window.location.href=href+"/"+cant;
        }
        
        //window.location.href=href+"/"+cant;
        //if (id.val().length<1) {
            
       //     alert("El nombre es obligatorio"); 
       // }else {
        //    alert("El nombre es obligatorio"); 
      //  }
        
    });
    
});
$(document).ready(function (){
    $('.solo-numero').keyup(function (){
      this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
  });