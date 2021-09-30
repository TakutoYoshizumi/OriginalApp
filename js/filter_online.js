$(function(){
        //イベントタイプフィルター
    $(document).ready(function(){
        $(".grid_wrapper").each(function(){
                        //フィルタリングの条件を満たしているか
                        //typeのオンラインのクラスがあれば表示
                        if($(this).hasClass("オンライン")){
                            //条件を満たしている場合
                            $(this).show();
                            $(this).animate({"opacity":1},0)
                        }else{
                            $(this).hide();
                        }
                    });
                  
    })
    
    //ボタンホバー
    $("button").hover(function(){
        $(this).addClass("hover_btn");
    })
    $("button").mouseleave(function(){
        $(this).removeClass("hover_btn");
    }) 
    
    // ボタンフィルター
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
    
    //検索フィルター 
    $("#search_btn").click(function(){
        //value属性の値取得
        let searchText = $("#search-text").val();
        
        
        //検索エリアに値が入っている場合
        if(searchText != ""){
        $(".grid_wrapper").each(function(){
                    //一度全て非表示にする
                    $(this).animate({"opacity":0},300,function(){
                        $(this).hide();
                        
                        //フィルタリングの条件を満たしているか
                        if($(this).hasClass(searchText)){
                            //条件を満たしている場合
                            $(this).show();
                            $(this).animate({"opacity":1},300)
                        }
                    });
                })            
            
        }
        
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