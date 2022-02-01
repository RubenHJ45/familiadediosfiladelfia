document.querySelector('.menu-btn').addEventListener('click', () =>{
    document.querySelector('.nav-menu').classList.toggle('show');
});

//MENU DESPLEGABLE PARA LA PAGINA


// BUSCADOR DE CONTENIDO

//EJECUTANDO FUNCIONES
document.getElementById("icon-search").addEventListener("click", mostrar_buscador);

document.getElementById("cover-ctn-search").addEventListener("click", ocultar_buscador);

//declarando variables

bars_search =      document.getElementById("ctn-bars-search");
cover_ctn_search = document.getElementById("cover-ctn-search");
imputSearch =      document.getElementById("imputSearch");
box_search =       document.getElementById("box-search");

//funcion para mostrar el buscador

function mostrar_buscador(){

    bars_search.style.top = "60px";
    cover_ctn_search.style.display = "block";
    imputSearch.focus();

    if(imputSearch.value === ""){
        box_search.style.display = "none";
    }

}

//FUNCION PARA OCULTAR EL BUSCADOR

function ocultar_buscador(){

    bars_search.style.top = "-20px";
    cover_ctn_search.style.display = "none";
    imputSearch.value = "";
    box_search.style.display = "none";
}
//EJECUTAR DE CODIGO AL PRESIONAR UNA TECLA

function presionar_tecla(){

    tecla_esc = event.keyCode;

    if(tecla_esc == 27){
       return ocultar_buscador();
    }

}

window.onkeydown = presionar_tecla;

//CREANDO FILTRADO DE BUSQUEDA

document.getElementById("imputSearch").addEventListener("keyup", buscador_interno);

function buscador_interno(){

    filter = imputSearch.value.toUpperCase();
    li = box_search.getElementsByTagName("li"); //obteniendo etiquetas de busqueda
    //recorriendo elementos a filtrar mediante los "li"

    for (i=0; i < li.length; i++){

        a = li[i].getElementsByTagName("a")[0];
        textValue = a.textContent || a.innerText;

        if(textValue.toUpperCase().indexOf(filter) > -1){

            li[i].style.display = "";
            box_search.style.display = "block";

            if(imputSearch.value === ""){
                box_search.style.display = "none";
            }

        }else{
            li[i].style.display = "none";
        }
    }

}
