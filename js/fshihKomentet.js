// window.addEventListener("load", start);
// let  div_komentet;
// let butoni_shfaq;

// function start(){
//   // 	div_komentet=document.getElementsByClassName('komentet');
//  	// //fsheh div e komenteve
//  	// for(let i=0; i<div_komentet.length; i++)
//  	// 	fshihElement(div_komentet[i]);
//  	// butoni_shfaq=document.getElementsByName('shfaqKomentet');
//  	// for(let i=0; i<butoni_shfaq.length; i++)
//  	// 	butoni_shfaq[i].addEventListener("click", shfaqGjitheKomentet);



//  }

//  function fshihElement(element){
//  	element.style.display="none";
//  }

 // function shfaqElement(element){
 // 	element.style.display="block"; 	
 // }

function shfaqGjitheKomentet(event){
 	//("u shtyp "+event+" he");
 	// div_komentet=document.getElementsByClassName('komentet');
 	// butoni_shfaq=document.getElementsByName('shfaqKomentet');
 	// for(let i=0; i<butoni_shfaq.length; i++){
 	// 	if(butoni_shfaq[i]==event){
 	// 		//div_komentet[i].classList.remove="block"; 
 	// 		alert("u gjet elementi");
 	// 		div_komentet[0].classList.remove("fshih");
 	// 		break;
 	// 	}
 	// }

 	document.getElementById(event.name).classList.remove('fshih');
	 	event.disabled="true";
}