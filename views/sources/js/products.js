/*-----------------------------------
GRID & LIST
-----------------------------------*/
$(document).on("click",".btnView", function(){

    let type = $(this).attr("attr-type");
    let btnType = $("[attr-type]");
    let index = $(this).attr("attr-index");

    if(type == "list"){
        $(".grid-" + index).hide();
        $(".list-" + index).show();
    }

    if(type == "grid"){
        $(".grid-" + index).show();
        $(".list-" + index).hide();
    }

    btnType.each(function(i){

        if($(btnType[i]).attr("attr-index")== index){
            $(btnType[i]).removeClass("bg-info");
        }
    })

    $(this).addClass("bg-info")

})