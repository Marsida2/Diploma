window.addEventListener("load", start);
var divPostimet;
var pLoading;//paragrafi me e scrollin
var kodLende;
var requestNeProgres;
var btn_shto;//
var lastPostId=0;

function start(){
	divPostimet=document.getElementsByClassName('postimet')[0];
	pLoading=document.getElementsByClassName('loadingParagraf')[0];
	kodLende=pLoading.getAttribute('data-kodLende');
	requestNeProgres=false;

	btn_shto=document.getElementById('infscroll');//btn qe shton komentin
	window.addEventListener('scroll', scrollReaction);
}


function scrollReaction(){
	var contentHeight=divPostimet.offsetHeight;
	var currentY=window.innerHeight + window.pageYOffset;
	//console.log(currentY+ '/ '+contentHeight);
	if(currentY>=contentHeight){
		ajaxRequest();
	}
}

function ajaxRequest(){
	if(requestNeProgres) return;
	requestNeProgres=true;//te mos ripublikoje komentin ne rast pergjigje me vonese
	shfaqElement(pLoading);
	lastPostId=pLoading.getAttribute('data-lastPostId');
	var action="includes/infiniteScrolling.php?kodLende="+kodLende+"&lastPostId="+lastPostId;
	var xhr=new XMLHttpRequest();
	xhr.open("GET", action, true);
	xhr.setRequestHeader('X-REQUESTED-WITH', 'XMLHttpRequest');
	xhr.onreadystatechange = function() {
	 	if(this.readyState == 4 && this.status == 200) {
			var response = (this.responseText);
			shtoPostet(response);
			updateLastPostId();
			fshihElement(pLoading);
			requestNeProgres=false;
		}
	};
	xhr.send(null);
}

function shfaqElement(element){
	element.style.display='block';
}

function fshihElement(element){
	element.style.display='none';
}

function shtoPostet(posteTeReja){
	if(posteTeReja.length<5 ){//nuk ka me poste ne databaze
		requestNeProgres=true;
		window.removeEventListener("scroll", scrollReaction);
		return;
	}
	divPostimet.innerHTML=divPostimet.innerHTML+posteTeReja;
}

function updateLastPostId(){
	var postet=document.getElementsByClassName('posti');
	lastPostId=postet[postet.length-1].getAttribute('id');
	pLoading.setAttribute('data-lastPostId', lastPostId);
}



//funksioni qe shfaq komentet e plota te posteve te forumit
// function shfaqGjitheKomentet(element){
// 	var btn_komentet=document.getElementsByClassName('shfaqKomente');
// 	for(var i=0; i<btn_komentet.length; i++) {
// 		if(btn_komentet[i]==element){
// 			//console.log(" i njejti buton");
// 			shfaqElement(document.getElementsByClassName("komentetTjera")[i]);
// 			fshihElement(btn_komentet[i]);
// 			break;
// 		}
// 	}
// }