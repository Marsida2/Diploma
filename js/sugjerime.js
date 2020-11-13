window.addEventListener("load", start);
var search;
var sugjerimet;

function start(){
	search=document.getElementById('kerko_inputin');
	sugjerimet=document.getElementById('sugjerime');
	search.addEventListener('input', ndryshimInputi);
}

function ndryshimInputi(){
	var kerkim=search.value;
	//console.log(kerkim);
	if(kerkim.length<3){
		fshihSugjerimet();
		return;
		}

	var action="autosugjerime.php?kerkim="+kerkim;
	var xhr=new XMLHttpRequest();
	xhr.open("GET", action, true);
	xhr.setRequestHeader('X-REQUESTED-WITH', 'XMLHttpRequest');
	xhr.onreadystatechange = function() {
	 	if(this.readyState == 4 && this.status == 200) {
			var response = JSON.parse(this.responseText);
			//console.log(response);
			listoSugjerimet(response);
		}
	};
	xhr.send(null);
	}


function listoSugjerimet(response){
	if(response.length==0){
		fshihSugjerimet();
		sugjerimet.innerHTML="";
		return;
	}
	sugjerimet.innerHTML=formatoSugjerimet(response);
	shfaqSugjerimet();
}

function formatoSugjerimet(response){
	var content="";
	for(var i=0; i<response.length; i++){
		content+="<li><a href='lende.php?kodLende="+response[i]['kodi']+"'>"
				+response[i]['emertimi']+"</a></li>";
	}
	return content;
}

function shfaqSugjerimet(){
	sugjerimet.style.display='block';
}

function fshihSugjerimet(){
	sugjerimet.style.display='none';
}

