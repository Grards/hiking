export function fading(element){
    let fade = setInterval(function () {
        let opacity = element.style.opacity;
        if (!opacity){
            element.style.opacity = 1;
        }
        if (opacity > 0) {
           opacity -= 0.1;
           element.style.opacity = opacity;
        }
        if (opacity === 0){
            clearInterval(fade);
        }
        
     }, 100);
}