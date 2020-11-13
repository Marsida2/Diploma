let lendaZgjedhur;
let studentet;

function getStudentet(lenda){
	if(lenda.value=="")
		return;
	lendaZgjedhur=lenda.value;
	let action="includes/cregjistro.php?kod_lende="+lendaZgjedhur;
	let xhr=new XMLHttpRequest();
	xhr.open("GET", action, true);
	xhr.setRequestHeader('X-REQUESTED-WITH', 'XMLHttpRequest');
	xhr.onreadystatechange = function() {
	 	if(this.readyState == 4 && this.status == 200) {
			studentet = JSON.parse(this.responseText);
			console.log(studentet);
			let tabela=tabelaStudentet(studentet);
			document.getElementById('listaStudenteve').innerHTML=tabela;
		}
	};
	xhr.send(null);
}

function tabelaStudentet(studentet){
	let tabela="<table class='tbl'>"
				+"<tbody>";
	for(let i = 0; i < studentet.length; i++)
		tabela+="<tr>"
					+"<td>"+studentet[i]['emri']+" "+studentet[i]['mbiemri']+"</td>"
					+"<td>"+studentet[i]['email']+"</td>"
					+"<td><input type='button' value='cregjistro' onclick='cregjistroStudent("+i+")'></td>"
				+"</tr>";
		tabela+="</tbody>"
			+"</table>";
	return tabela;
}


function cregjistroStudent(nr){
	//alert("studenti "+nr);
	nr=parseInt(nr);//numri rendor i studentit qe do fshihet nga tabela
	let idStudentit=studentet[nr]['id_perdorues'];
	if(!confirm("Konfirmoni cregjistrimin e "+studentet[nr]['emri']
				+" "+studentet[nr]['mbiemri']+" nga lenda "+lendaZgjedhur))
		return;
	let action="includes/cregjistro.php?kodLende="+lendaZgjedhur+"&studenti="+idStudentit;
	let xhr=new XMLHttpRequest();
	xhr.open("GET", action, true);
	xhr.setRequestHeader('X-REQUESTED-WITH', 'XMLHttpRequest');
	xhr.onreadystatechange = function() {
	 	if(this.readyState == 4 && this.status == 200) {
			let response = this.responseText;
			if(response=="false"){
				alert("Kerkesa per cregjistrim deshtoi");
				return;
			}
			console.log("pergjigja e marre "+response);
			document.getElementsByTagName('tr')[nr].style.display="none";
		}
	};
	xhr.send(null);

}
