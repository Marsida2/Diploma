***FTIuni, sistemi i menaxhimit të mësimdhënies për studentët***

Sistemi në fjalë, është një aplikacion web i krijuar për të lehtësuar procesin e mësimdhënies nëpër institucionet arsimore duke përkrahur metodat bashkëkohore të komunikimit dhe të shpërndarjes së informacionit. Në këtë botë teknologjike, ku sasia e informacionit është kaq e madhe dhe përherë në lëvizje, nevoja për ta shpërndarë atë në kohë sa më të shkurtër dhe me burime të sigurta është me shumë rëndësi. Si pasojë edhe e zhvillimeve pandemike të këtij viti, rëndësi të veçantë merr edhe aksesimi nga distanca të largëta i tij. Kështu, lind domosdoshmërisht kërkesa për një sistem të aftë të menaxhojë mësimdhënien nga pika të ndryshme aksesi, nëpërmjet webit. 


**Qëllimi**

FTIuni, në thelb, ofron një  sistem, i cili ju vjen në ndihmë të gjithë aktorëve pjesëmarrës të procesit të mesimdhënies dhe mësimnxënies. Çdo përdorues i sistemit do të jetë në gjendje të kyçet në sistem dhe të kryejë veprimtarinë e tij në bazë të rolit.
Ky sistem  do të përdoret për të komunikuar student-student e student-pedagog, për të shkëmbyer materialet e nevojshme për ecurinë dhe zhvillimin normal të orëve mësimore si edhe për testimin dhe vlerësimin e vazhdueshëm të përvetësimit të njohurive nga ana e studentëve. Kështu, produkti final i kërkuar jo vetëm do të lehtësojë ndërveprimin brenda institucionit, por do të rrisë edhe interesimin e studentëve në programin shkollor dukeqenëse nëpërmjet kredencialeve personale do të mund të orientohen lehtësisht në burimet e universitetit. 
Sistemi i menaxhimit do të funksionojë si një sistem individual, i aksesueshëm nga çdo pajisje elektronike me një lidhje interneti. Më poshtë do të gjendet një përmbajtje e hollësishme në lidhje me funksionalitetet e sistemit, rolet dhe modulet që do të zhvillohen.


**Përdoruesit fundorë të sistemit janë:**

1.	Administratori i sistemit
2.	Pedagogët
3.	Studentët

**Kërkesat e sistemit**

•	Kërkesat funksionale:
o	Faqja do ketë një administrator me kompetenca universale;<br>


Regjistrimi dhe kycja në sistem
o	Për të aksesuar faqen e web-it nevojiten kredenciale personale;<br>
o	Kredencialet krijohen vetëm nga administratori;<br>
o	Administratori regjistron studentë dhe pedagogë në sistem;<br>
o	Përdoruesi përdor si emër identifikues email-in personal;<br>
o	Fjalëkalimi gjenerohet automatikisht nga sistemi;<br>
o	Administratori gjeneron dokument pdf me të kredencialet personale për secilin përdorues;<br>
o	Të dhënat e marra nga çdo përdorues janë: emri, mbiemri, email personal;<br>
o	Përdoruesi mund të ndryshojë fjalekalimin e tij;<br>
o	Përdoruesit personalizojnë foton e profilit;<br>

Regjistrimi i lëndëve
o	Administratori regjistron lëndët e reja të programit në sistem dhe fshin lëndët që dalin prej tij;<br>
o	Administratori përcakton pëegjegjësin e lëndës;<br>
o	Një lëndë mund të ketë më tepër sesa një përgjegjës;<br>
o	Administratori regjistron dhe konfirmon regjistrimin e studentëve në lëndët e programit;<br>
o	Një student mund të regjistrohet në shumë lëndë;<br>

Forumi i lëndëve<br>
o	Çdo lëndë ka një forum të sajin;<br>
o	Forumi aksesohet vetëm nga përgjegjësit dhe studentët ndjekës;
o	Çdokush mund të bëjë një postim në murin e forumit, tekst, me/pa foto;
o	Çdokush mund të komentojë në postimet e forumit që akseson;
o	Pedagogët përgjegjës:
	Ngarkojnë dokumente të formateve të ndryshme (pdf, .doc, .exl...) në lëndët përgjegjëse;<br>
	Krijojnë test me pyetje me shumë opsione përgjigjesh;<br>
	Testet janë aktive vetëm gjatë një kohëzgjatje të përcaktuar nga pedagogu;<br>
o	Studëntët e regjistruar:<br>
	Shkarkojnë dokumentet e ngarkuara nëpër lëndë;<br>
	Kryejnë testet individuale të pedagogëve;<br>

•	Kërkesat jofunksionale:<br>

o	Strukturimi i faqes është vizualisht lehtësisht i përdorshëm dhe orientues drejt funksionaliteteve të tij që në navigimin e parë të faqes.<br>
o	Çdo përdorues është në gjendje të kryejë kyçjen me sukses në aplikacion, pa nevojën e asistencës së jashtme. <br>
o	Faqja do të qëndrojë aktive gjatë gjithë kohëzgjatjes së semestrit, në 24 orë të ditës.<br>
o	Të dhënat personale të përdoruesve nuk janë të aksesueshme nga palë të treta.<br>
o	Me resetimin e grupeve të lëndëve, çdo e dhënë e ruajtur në databazat e sistemit mbi grupin aktual do të fshihet.<br>
o	Sistemi ofron ndarje të qartë kompetencash midis përdoruesve.<br>


**Arkitektura e sistemit**

Sasia e të dhënave që kërkohet të ruajë dhe të përpunojë sistemi është e madhe. Po ashtu edhe numri i veprimeve dhe leximimeve që faqja web do të kryejë gjatë gjithë kohës. Nga ana tjetër, si një sistem i cili si përdorues fundorë të saj ka persona jashtë fushës informatike, kërkohet një numër i madh ndërfaqesh me pamje sa më shpjeguese të jetë e mundur për orientim me lehtësi të tyre. Këto janë arsyet pse arkitektura e zgjedhur për zhvillimin e sistemit të kërkuar është e tipit Model-View-Controller. 
Sistemi do të ndërtohet mbi bazën e tri komponenteve logjike që ndërveprojnë me njëra tjetrën.<br>


Komponenti i modelit<br>

Për shkak të sasisë së konsiderueshme të të dhënave të ngarkuara në databazë dhe lidhjeve të shumta që ekzistojnë midis tyre, sistemi ynë i menaxhimit të mësimdhënies i organizon të dhënat në tabela relacionale. Gjuha e përdorur për t’i ruajtur, përpunuar dhe për t’i lexuar ato është SQL. <br>

Komponenti i pamjes<br>

Sistemi ynë përdor si gjuhë markimi HTML5 për renderimin dhe organizimin e komponentëve grafikë dhe CSS3 për stilizim e tyre. Gjithashtu ripërdor disa elementë të gatshëm të paraqitjes nga frameworku Bootstrap4. <br>


Komponenti i kontrolluesit<br>

Ky komponent në faqen FTIuni ndërtohet mbi bazën e gjuhës së programimit PHP 7.4.1. Sëbashku me PHP, përdoret Javascript e cila luan një rol tepër të rëndësishëm, si në përgjigjen dinamike të komponentit të pamjes, ashtu edhe në përpunimin dhe dërgimin e kërkesave të komponentit kontrollues te komponenti model dhe leximi i përgjigjeve të tij. Kjo në sajë të objektit të veçantë të Javascript, XMLHttpRequest.
