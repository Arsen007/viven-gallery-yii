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
    var main_image = $('#Products_image').val();

    if($('#Products_images').val() !== ''){
           var existing_images = $('#Products_images').val().split("|");
           $.each(existing_images,function(index,element){
               if(element !== ''){
                   if(element === main_image){
                       $('.qq-upload-list').append('<li class=" qq-upload-success"><div class="image-container" origin-name="'+element+'" sys-name="'+element+'"><span class="helper"></span><img src="'+base_url+'/images/uploads/products/thumbs/'+element+'"><div class="remove-img">X</div><div class="main-image"></div></div></li>')

                   }else{
                       $('.qq-upload-list').append('<li class=" qq-upload-success"><div class="image-container" origin-name="'+element+'" sys-name="'+element+'"><span class="helper"></span><img src="'+base_url+'/images/uploads/products/thumbs/'+element+'"><div class="remove-img">X</div><div class="set-main-btn"></div></div></li>')
                   }
               }
           })
       }
},300);


    $('.image-container').live({
        mouseenter:function(){
            $(this).find('.set-main-btn').show();
        },
        mouseleave:function(){
        $(this).find('.set-main-btn').hide();
    }})

    $('.set-main-btn').live({
        click:function(){
            $('#Products_image').val($(this).parent().attr('sys-name'));
            $('.main-image').removeClass('main-image').addClass('set-main-btn').hide();
            $(this).removeClass('set-main-btn').addClass('main-image');
        }
    })

})