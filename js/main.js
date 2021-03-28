

/*barra de menu oculto*/

let ubicacion_principal=window.pageYOffset;

window.addEventListener("scroll",function(){
    let desplazamiento_actual=window.pageYOffset;
    if(ubicacion_principal>=desplazamiento_actual){
        document.getElementsByTagName("nav")[0].style.top ="0px"
    }else{
        document.getElementsByTagName("nav")[0].style.top ="-100px"
    }
    ubicacion_principal=desplazamiento_actual;
})
/* menu */ 
let enlaces_menu= document.querySelectorAll(".menu")[0];
let semaforo=true;

document.querySelectorAll(".hamburguer")[0].addEventListener("click",function(){
    if (semaforo) {
        document.querySelectorAll(".hamburguer")[0].style.color="#fff";
        semaforo=false;
    }else{
        document.querySelectorAll(".hamburguer")[0].style.color="#000";
        semaforo=true;
    }
    enlaces_menu.classList.toggle("menu-oculto")
})
 
