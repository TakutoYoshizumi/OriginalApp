 //ファイル画像アップロード時に表示
 
 window.addEventListener("DOMContentLoaded",function(){
     document.getElementById("file").addEventListener("change",function(){
         let input = document.getElementById("file").files[0];
         
         let reader = new FileReader();
         reader.addEventListener("load",function(){
             let result = document.getElementById("result")
             result.src = reader.result;
             let desc=document.getElementById("file_desc");
             desc.textContent="アップロード成功";
             desc.style.color="#e6af09";
         },true);
         reader.readAsDataURL(input);
     });
 })
 
 const btn = document.querySelector(".file_label ");

 btn.addEventListener("mouseover",function(){
 btn.style.color="#e8d633";
 })
 btn.addEventListener("mouseleave",function(){
 btn.style.color="#d29f08";
 })
