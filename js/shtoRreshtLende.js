window.addEventListener("load", start, false);
var btn;
var lendaAktuale;
var lendet;

function start(){
	btn=document.getElementById("shtoRreshtLende");
	btn.addEventListener("click", shtoRresht, false);
}

function shtoRresht(){
	lendaAktuale=document.getElementById('lendaFundit').value.split('-')[0];

	lendet=document.getElementById('lendet');
	lendet.value=lendet.value+lendaAktuale+",";//shton kodin e lendes ne inputin hidden

	var contentHtml="<p><input type='text' style='width:40%' value='"
					+document.getElementById('lendaFundit').value+"' disabled/></p>";
		//krijon inputin disable tashme me lenden e sapozgjedhur

	document.getElementById('lendePlus').innerHTML=contentHtml
													+document.getElementById('lendePlus').innerHTML;
		//shton inputin disable ne faqen konkrete
}