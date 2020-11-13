window.addEventListener("load", start);
var krijo_test;//krijon testin ne tabelen e testeve
var ruaj_pyetjen;//butoni qe hedh ne databaze 1 pyetje sebashku me pergjigjet
var nr_pyetjeve=1;
var span_nr_pyetjes;//span qe shfaq nr e pyetjes aktuale ne test
var nr_pergjigjeve=1;
var shtoPergjigje;//butoni qe do te shtoje nje pergjigje tjeter per pyetjen
var forma_testi;//forma qe krijon testin
var forma_pyetjet;//forma qe merr pyetjet dhe pergjigjet
var nenforma_pergjigjet;//paragrafi ku do shtohen opsione te tjera pergjigjesh per pyetjen konkrete
var id_testi;

function start(){
	krijo_test=document.getElementById('krijo_test');
	shtoPergjigje=document.getElementById('shtoPergjigje');
	ruaj_pyetjen=document.getElementById('ruaj_pyetjen');
	span_nr_pyetjes=document.getElementById('nr_pyetjes');
	forma_testi=document.getElementById('forma_testi');
	forma_pyetjet=document.getElementById('forma_pyetjet');
	nenforma_pergjigjet=document.getElementById('nenforma_pergjigjet');
	ruaj_testin=document.getElementById('ruaj_testin');

	fshihElement(forma_pyetjet);

	krijo_test.addEventListener("click", krijo_test_ajax);
	shtoPergjigje.addEventListener("click", shto_pergjigje);
	ruaj_pyetjen.addEventListener("click", ruaj_pyetjen_ajax);
}

function krijo_test_ajax(){

	var form_data=new FormData(forma_testi);
	
	var xhr= new XMLHttpRequest();
	
	//nuk vendosim content type kur i mbledhim te dhenat me formData object
	xhr.open("POST", "includes/ruajTest.php", true);
	//xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.setRequestHeader('X-REQUESTED-WITH', 'XMLHttpRequest');
		xhr.onreadystatechange = function() {
	 	if (this.readyState == 4 && this.status == 200) {
			var id_testi=this.responseText;
			console.log("pergjigja e marre"+ id_testi);
			if(id_testi==" Error") {
				alert("Ju lutem plotesoni te gjitha fushat e meposhtme!");
				return;
			}
			id_testi=parseInt(id_testi);
			document.getElementById('id_testi').value=id_testi;
			vendosActionUrl();
			fshihElement(forma_testi);
			shfaqElement(forma_pyetjet);
		}
	};
	xhr.send(form_data);
}

function ruaj_pyetjen_ajax(){
	var form_data=new FormData(forma_pyetjet);
	
	var xhr1= new XMLHttpRequest();
	
	//nuk vendosim content type kur i mbledhim te dhenat me formData object
	xhr1.open("POST", "includes/ruajPyetjet.php", true);
	//xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr1.setRequestHeader('X-REQUESTED-WITH', 'XMLHttpRequest');
		xhr1.onreadystatechange = function() {
	 	if (this.readyState == 4 && this.status == 200) {
			var pergjigja=this.responseText;
			console.log("pergjigja e marre "+ pergjigja);
			if (pergjigja==" Error") {
				return;
			}
			pyetjaTjeter();//fshin inputet ekzistuese
		}
	};
	xhr1.send(form_data);
}

function vendosActionUrl(){
	var lenda=document.getElementById('kod_lende').value;
	forma_pyetjet.setAttribute("action", "testet2.php?kodLende="+lenda);
}


function shto_pergjigje(){
	var newElement=document.createElement('p');
	newElement.innerHTML="Përgjigja: <input type='radio' name='sakte' value='"+(nr_pergjigjeve++)+"'>"
				+" <input type='text' name='pergjigja[]' size='30'>";
	nenforma_pergjigjet.appendChild(newElement);
}

function pyetjaTjeter(){
	document.getElementById('pyetja').value="";
	span_nr_pyetjes.innerHTML=++nr_pyetjeve;
	nenforma_pergjigjet.innerHTML='<p>Përgjigja: <input type="radio" name="sakte" value="0" checked>' 
			+' <input type="text" name="pergjigja[]" size="30">'
			+'</p>';
	nr_pergjigjeve=1;
}

function shfaqElement(element){
	element.style.display="block";
}

function fshihElement(element){
	element.style.display="none";
}

function disableElement(element){
	element.setAttribute("disabled", "disabled");
}