$(function(){
    $('.remove-img').live('click',function(){
        var curr_images_arr = $('#Products_images').val().split('|');
        removing_image = $(this).parent().attr('sys-name');
        var new_img_arr = [];
        $.each(curr_images_arr,function(index,element){
            if(removing_image !== element){
                new_img_arr.push(element);
            }
        })
        $('#Products_images').val(new_img_arr.join("|"));
        $(this).parent().parent().hide(300,function(){
            $(this).remove();
        })
    });
setTimeout(function(){
    if($('#Products_images').val() !== ''){
           var existing_images = $('#Products_images').val().split("|");
           $.each(existing_images,function(index,element){
               if(element !== ''){
                   $('.qq-upload-list').append('<li class=" qq-upload-success"><div class="image-container" origin-name="'+element+'" sys-name="1401487907.jpg"><span class="helper"></span><img src="http://viven-gallery-yii.dev/images/uploads/products/thumbs/'+element+'"><div class="remove-img">X</div></div></li>')
               }
           })
       }
},300);


})