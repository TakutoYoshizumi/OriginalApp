$(function(){
    let current=1;
    let next=1;
    let back=-1;
    let el=function(){
         if(current === 3){
             $(".next").hide();
         }else{
             $(".next").show();
         }    
         
         if(current === 1){
             $(".back").hide();
         }else{
             $(".back").show();
         }
    }
    
    $(".back").hide();              //戻りボタン　初期状態hide
    $(".form").hide();              //フォーム要素全てhide
    $(".form"+current).fadeIn(800);      //対象のフォーム番号のみshow
    
    $(".next").click(function(e){
        e.preventDefault();
        //form番号が3より小さけば
        if(current <3){
        
         　 $(".form"+current).fadeOut(800);
            $(".form" +(current + next)).fadeIn(800); 
             current =(current +next);
      }
        el();
    });
    
    $(".back").click(function(e){
        e.preventDefault();
         //form番号が１より大きければ
         if(current>1){
              
              $(".form"+current).fadeOut(800);
              $(".form"+ (current+ back)).fadeIn(800);
              current =(current+back);
          }
         el();
    });
   
    console.log(current);
});

