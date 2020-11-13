window.addEventListener("load", start);
var pyetjet;
var nr_p;
var p_aktuale;
var pas_btn;
var para_btn;
var submit_btn;

function start(){
	pas_btn=document.getElementById('pas');
	para_btn=document.getElementById('para');
	submit_btn=document.getElementById('submitTest');

	vendosTimeout();
	
	pyetjet=document.getElementsByClassName('posti');
	nr_p=pyetjet.length;
	p_aktuale=0;
	
	disableBtn(para_btn);
	for(let i=1; i<nr_p; i++){
		displayNone(pyetjet[i]);
	}

	pas_btn.addEventListener('click', shfaqPas);
	para_btn.addEventListener('click', shfaqPara);

}

function vendosTimeout(){
	var mbarimi=new Date(submit_btn.getAttribute('data-mbarimi'));
	var tani=new Date();
	var dif=Math.abs(mbarimi-tani);
	console.log(dif);
	setTimeout(mbyllTestin, dif);
}

function mbyllTestin(){
	submit_btn.click();
}

function shfaqPara(){
	if(p_aktuale==0)
		return;
	displayNone(pyetjet[p_aktuale]);
	displayBlock(pyetjet[--p_aktuale]);
	switch(p_aktuale){
	case 0: 
		disableBtn(para_btn);
		break;
	case (nr_p-2):
		enableBtn(pas_btn);
		break;
	}
}

function shfaqPas(){
	if(p_aktuale==(nr_p-1))
		return;
	displayNone(pyetjet[p_aktuale]);
	displayBlock(pyetjet[++p_aktuale]);
	switch(p_aktuale){
	case 1: 
		enableBtn(para_btn);
		break;
	case (nr_p-1):
		disableBtn(pas_btn);
		break;
	}
}

function displayNone(element){
	element.style.display='none';
}

function displayBlock(element){
	element.style.display='block';	
}

function disableBtn(element){
	element.setAttribute('disabled', 'true');
}

function enableBtn(element){
	element.removeAttribute("disabled");
}

