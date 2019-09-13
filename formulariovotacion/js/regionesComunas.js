$(function(){
   
    $('#region').change(function(){

        $('#region option:selected').each(function(){
            id_region = $(this).val();
            $.post("includes/getComuna.php", { id_region: id_region }, function(data){
                $('#comuna').html(data);
            });
        });
    });


});