window.addEventListener("load", start);

function start(){
var btn_shto=document.getElementById('btn_komenti');//btn qe shton komentin
var komentet=document.getElementsByClassName('komentet')[0];//divi qe permban gjithe komentet
var forma=document.getElementsByClassName('formClass')[0];//forma nga marrim te dhenat


function ajaxRequest(){

	disableButonin();//te mos ripublikoje komentin ne rast pergjigje me vonese
	let form_data=new FormData(forma);
	// for([key, value] of form_data.entries())
	// 	console.log(key+': '+value);
	
	let xhr= new XMLHttpRequest();
	
	//nuk vendosim content type kur i mbledhim te dhenat me formData object
	//xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.open("POST", "komento.php", true);
	xhr.setRequestHeader('X-REQUESTED-WITH', 'XMLHttpRequest');
		xhr.onreadystatechange = function() {
	 	if (this.readyState == 4 && this.status == 200) {
			var json=JSON.parse(this.responseText);
			console.log("pergjigja e marre"+ json['permbajtja']);
			shtoKomentin(json);
			fshiInputin();
			enableButonin();
		}
	};
	xhr.send(form_data);
	}


function shtoKomentin(komenti){
	komentet.innerHTML+=formatoKomentin(komenti);
	fshiInputin();
}

function formatoKomentin(komenti){
	return  "<div class='koment'>"
			+"<p>"+komenti['permbajtja']+"</p>"
			+"<p class='postues'>"+komenti['emriPlote']
			+" <span class='date'>"+ komenti['data']+"</span></p>"
			+"</div>";  
}

function disableButonin(){
	btn_shto.disabled=true;
}

function enableButonin(){
	btn_shto.disabled=false;
}

function fshiInputin(){
	document.getElementsByClassName('komenti')[0].value="";
}

btn_shto.addEventListener('click', ajaxRequest);
}