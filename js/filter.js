$(function(){
    $("button").click(function(){
        //value属性の値取得
        let target =$(this).attr("value");
        
        $(".grid_wrapper").each(function(){
            //一度全て非表示にする
            $(this).animate({"opacity":0},300,function(){
                $(this).hide();
                
                //フィルタリングの条件を満たしているか
                if($(this).hasClass(target) || target === "all"){
                    //条件を満たしている場合
                    $(this).show();
                    $(this).animate({"opacity":1},300)
                }
            });
        })
    })
});