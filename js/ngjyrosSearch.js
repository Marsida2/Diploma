window.addEventListener("load", start, false);
var btnKerkimi;
var kerko_inputin;


function start(){
	kerko_inputin=document.getElementById("kerko_inputin");
	btnKerkimi=document.getElementsByClassName("btnKerkimi")[0];
	kerko_inputin.addEventListener("focus", ngjyrosLupen, false);
	kerko_inputin.addEventListener("blur", cngjyrosLupen, false);

}

function ngjyrosLupen(){
	btnKerkimi.setAttribute("style", "background-color: black;");	
} 

function cngjyrosLupen(){
	btnKerkimi.setAttribute("style", "background-color: #e5e5e5;");	
}