function selektoTeGjitha(element){
	let lendeResetimi=document.getElementsByName('lendeResetimi[]');//checkbox-et e cdo lende
	let bOol=element.checked;
		for(let i=0; i<lendeResetimi.length; i++)
			lendeResetimi[i].checked=bOol;
}