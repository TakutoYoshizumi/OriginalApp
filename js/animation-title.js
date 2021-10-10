document.addEventListener('DOMContentLoaded', function () {

const ta = new TextAnimation(".animation-title");
const ta2 = new TextAnimation(".animation-title2");

ta.animation();
ta2.animation();

    // setInterval(()=>{
    //     ta.animation();
    // },1000);

});

  class TextAnimation {
      constructor(el,chars) {
          this.el = document.querySelector(el);
          this.chars=this.el.innerHTML.trim().split("");
          this.el.innerHTML=this.splitText();
          
      }
      splitText(){
        return this.chars.reduce((acc, curr) => {
            curr= curr.replace(" ","&nbsp;");
            return `${acc}<span class="char">${curr}</span>`;
        }, "");
  }
    
      animation(){
          this.el.classList.toggle("inview");
      }
}
