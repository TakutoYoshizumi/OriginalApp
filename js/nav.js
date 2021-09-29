$(function () {
    //navメニュー　オープン、クローズアニメーション
    $("#nav_menu").toggleClass("open")
    function btn(){
        $("#nav_menu").toggleClass("open");
        $("#nav_menu").toggleClass("close");
    }
    $(".open").on("click",function(){
       btn(); 
       $(".slider-menu").toggleClass("slider");
    });
    
    //navスクロール　リサイズアニメーション
    let height=$("header").height();
    $(window).scroll(function(){
        
      //スクロール量が３００pxを超えているかチェック
      if($(window).scrollTop() > height){
          //超えている場合smallクラスを追加

          console.log("発火");
          $(".navbar").addClass("small");
          $(".nav_title").addClass("small");
      }else{
          $(".navbar").removeClass("small");
          $(".nav_title").removeClass("small");
      }
    });
});