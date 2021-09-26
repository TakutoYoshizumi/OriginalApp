//ボタンの要素取得
const edit = document.getElementById("edit");
const submit = document.getElementById("submit");
const mask =document.querySelectorAll(".mask");
const show =document.querySelectorAll(".show");
const p = document.getElementById("p");
const hide =document.getElementsByName("hide");

const func =(el)=>{
el.addEventListener("click",(e)=>{
    e.preventDefault();
  mask.forEach(e=>{
    e.classList.toggle("hide");
    
    
  });
  show.forEach(e=>{
    e.classList.toggle("hide");
  });
  p.classList.toggle("hide");
  if(el.textContent === "編集"){
    el.innerHTML="キャンセル";
  }else if(el.textContenttext !== "編集"){
    el.innerHTML="編集";
  }

});
  
};

func(edit,submit);



