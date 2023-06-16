import { fading } from "./modules/fading.js";

const fadeElement = document.getElementsByClassName("fading"); 

function temporization(){
    for(let element of fadeElement){
        fading(element);
    }
}

setTimeout(temporization,2000);
