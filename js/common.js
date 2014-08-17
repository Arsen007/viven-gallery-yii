$(function(){
    $('#shop-by-category').click(function(){
        if($(this).hasClass('closed')){
            $(this).removeClass('closed').addClass('opened');
            $('.search-by-category-content').show()
            $('.gh-shop-ei').addClass('gh-shop-ei-black');
        }else{
            $(this).removeClass('opened').addClass('closed');
            $('.search-by-category-content').hide()
            $('.gh-shop-ei').removeClass('gh-shop-ei-black');

        }
    })
var indiv = false;
    $('#shop-by-category').mouseenter(function(){
        indiv = true;
    })


    $('#shop-by-category').mouseleave(function(){
        $('body').mousemove(function(){
            console.log($('.search-by-category-content').is(':hover'));
        })
        setTimeout(function(){
            if($(this).hasClass('opened') && indiv){
                $(this).click();
            }
        },100)

    })
    $('.search-by-category-content').mouseleave(function(){
        $('#shop-by-category').click();

    })
})