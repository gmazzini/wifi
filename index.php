<?php
include "utility.php";
$ipaddr=ipbrowser();
$ii=explode(".",$ipaddr);
$mac=maclogip($ipaddr);
$cell=celllogmac($mac);
?>

<html>
Sistema di identificazione una tantum<br>
Sperimentazione di LepidaScpA in accordo con il MISE<br>
<?php
  if($ii[0]!=10 && $ii[0]!=44){
    echo "Accesso non consentito da $ipaddr";
    exit(); 
  }
  if(strlen($cell)>7){
    echo "Bentornato, sei registrato con numero $cell buona navigazione";
    echo "<br><img src=\"logo.png\" alt=\"logo\" width=\"200\" height=\"auto\">";
    exit();
  }
?>
Inserisci qui il tuo numero di cellulare<br>
(se non italiano in formato internazionale completo +xxxyyyyy)<br>
<form method="POST" action="identify.php">
<pre><input name="cell" type="input"><input type="submit"></pre>
Nota che il cellulare ti identifica e deve necessariamente<br>
essere tuo personale<br>
Se prosegui stai anche prendendo atto della informativa sul servizio<br>
e sulla privacy qui riportata xxxx e la stai accettando<br>
<img src="logo.png" alt="logo" width="200" height="auto">

<h1>
Informativa relativa al servizio EmiliaRomagnaWiFi resa 
ai sensi e per gli effetti del Regolamento EU n. 679/2016 (GDPR)
</h1>

<p>EmiliaRomagnaWiFi e' la rete pubblica regionale WiFi 
presente in piazze, stazioni, ospedali, biblioteche, 
sedi comunali ed in generale luoghi aperti al pubblico 
che consente l'accesso ad Internet in modo gratuito. 
L'accesso alla navigazione e' disponibile 24 ore su 24, 
tutti i giorni. Il servizio si appoggia sull'infrastruttura 
della rete Lepida a banda ultra larga.</p>

<p>L'informativa di seguito riportata (d'ora innanzi "Informativa"), 
e' resa da Lepida ScpA, nella sua veste di Titolare del 
trattamento (di seguito, anche solo, "Titolare"), all'utente 
del servizio EmiliaRomagnaWiFi (di seguito, anche, "Interessato"), 
in adempimento di quanto prescritto dal Regolamento 
(UE) n. 679/2016 (d'ora innanzi, anche solo, "Regolamento"), 
per informare l'Interessato in merito al trattamento dei 
dati personali che lo riguarda effettuato quando utilizza 
il suddetto servizio. Il Titolare assicura che il trattamento 
dei dati personali e' improntato ai principi di correttezza, 
liceita' e trasparenza, di tutela della riservatezza e dei 
diritti dell’Interessato.</p>

<p>L'Informativa potra' essere soggetta a revisioni in seguito 
a modifiche della normativa in tema di protezione dei dati 
personali o di modifiche al servizio che impattino sulle modalita' 
di trattamento dei dati, nonche' di variazioni nella struttura 
organizzativa del Titolare o del Responsabile del trattamento, 
pertanto si invitano gli utenti a visionare periodicamente 
la presente informativa in modo da essere costantemente 
aggiornati sulle caratteristiche del trattamento. Qualunque 
cambiamento avra' effetto dalla data di pubblicazione della 
versione emendata dell'Informativa.</p>

<h2>Titolare del trattamento dei dati e dati di contatto</h2>

<p>Il Titolare del trattamento dei dati e' Lepida ScpA con sede 
in Bologna, Via della Liberazione 15, cap 40128. Al fine di 
semplificare le modalita' di inoltro e ridurre i tempi per il 
riscontro si invita a presentare le richieste di cui al paragrafo 
"Diritti dell'interessato" del presente documento, alla segreteria 
di Lepida mediante email a segreteria@lepida.it oppure PEC a 
segreteria@pec.lepida.it</p>

<h2>Il responsabile per la protezione dei dati</h2>

<p>Il Responsabile della protezione dei dati designato 
dall'Ente e' contattabile all'indirizzo mail dpo@lepida.it</p>

<h2>Soggetti autorizzati al trattamento</h2>

<p>I Suoi dati personali sono trattati da personale interno 
previamente autorizzato al trattamento, a cui sono impartite, 
ai sensi dell'art. 32 par. 4 del Regolamento, idonee istruzioni in 
ordine a misure, accorgimenti, modus operandi, tutti volti alla 
concreta tutela dei suoi dati personali.</p>

<h2>Responsabili del trattamento</h2>

<p>L'Ente puo' avvalersi di soggetti terzi per l'espletamento 
di attivita' e relativi trattamenti di dati personali di cui 
manteniamo la titolarita'. Conformemente a quanto stabilito 
dalla normativa, tali soggetti assicurano livelli di esperienza,
capacita' e affidabilita' tali da garantire il rispetto delle 
vigenti disposizioni in materia di trattamento, ivi compreso il 
profilo della sicurezza dei dati.</p>

<p>Formalizziamo istruzioni, compiti ed oneri in capo a tali 
soggetti terzi con la designazione degli stessi a 
"Responsabili del trattamento". Sottoponiamo tali soggetti a 
verifiche periodiche al fine di constatare il mantenimento dei 
livelli di garanzia registrati in occasione dell'affidamento 
dell'incarico iniziale.</p>

<h2>Categorie di dati trattati</h2>

<p>Il servizio EmiliaRomagnaWIFI raccoglie, l'identificazione 
personale dell'Interessato mediante numero di cellulare personale 
inoltre sono trattati: indirizzo IP intranet ed internet associato 
all'Interessato durante la sessione di navigazione; 
identificativo MAC-address offerto dal dispositivo mobile; 
timestamp di accesso alla rete da parte del dispositivo mobile; 
timestamp di ingresso del dispositivo mobile in un qualsiasi 
access point della rete; timestamp di uscita del dispositivo 
mobile in un qualsiasi access point della rete; identificativo 
dei siti verso i quali viene effettuata la navigazione.</p>

<h2>Modalita', finalita' e base giuridica del trattamento</h2>

<p>Il trattamento e' necessario per l'esecuzione degli adempimenti 
quali operatore di telecomunicazione di Lepida ScpA e per garantire 
le prestazioni di sicurezza previste dalle normative vigenti. 
Questa Informativa viene resa disponibile al momento della prima 
identificazione ed esplicitamente accettata dall'Interessato che 
ne ha preso visione.</p>

<p>Il trattamento dei dati relativi alla mobilita' dell'Interessato 
viene effettuato dal Titolare anche per consentire lo svolgimento 
delle funzioni istituzionali dei propri Soci pubblici, finanziatori 
della rete, finalizzato a creare le migliori condizioni relative alla 
programmazione di azioni sul territorio.</p>

<p>I dati personali acquisiti sono trattati, con strumenti 
informatici, nel rispetto dei principi stabiliti dalla normativa 
vigente (in particolare art. 5 del Regolamento: principi di liceita', 
correttezza, trasparenza, limitazione delle finalita', minimizzazione 
dei dati, esattezza, limitazione della conservazione, integrita' 
e riservatezza, responsabilizzazione) e con modalita' idonee a 
garantire la riservatezza e la sicurezza dei dati.</p>

<p>Il sistema mantiene queste informazioni per i tempi 
previsti dalle norme sulla sicurezza inoltre ne effettua azioni 
di aggregazione e elaborazione anche applicando tecniche di 
offuscamento, permutazione o granularita' sul dato (spazio temporale), 
i dati sono, inoltre, trattati in maniera aggregata anche per 
fini statistici.</p>

<h2>Comunicazione e/o diffusione dei dati personali</h2>

<p>I suoi dati personali non sono oggetto di comunicazione 
o diffusione, se non su esplicita richiesta delle Autorita' 
inquirenti.</p>

<h2>Trasferimento dei dati personali</h2>

<p>Il Titolare del trattamento non effettua trasferimento 
di dati al di fuori dell'Unione Europea.</p>

<h2>Conservazione dei dati</h2>

<p>I dati sono conservati per un periodo non superiore a quello 
necessario per il perseguimento delle finalita' per le quali i dati 
sono raccolti e trattati e, in ogni caso, per non piu' di 1 (un) anno, 
salvo che non ricorra un obbligo di conservazione ulteriore per 
espressa disposizione normativa.</p>

<h2>Processo decisionale automatizzato</h2>

<p>Sui dati non verra' eseguito alcun processo decisionale 
automatizzato (profilazione).</p>

<h2>Diritti dell'Interessato</h2>

<p>Nella sua qualita' di Interessato, Lei ha diritto: di accesso 
ai dati personali; di ottenere la rettifica o la cancellazione 
degli stessi o la limitazione del trattamento che lo riguardano; 
di opporsi al trattamento; di proporre reclamo al Garante per la 
Protezione dei Dati Personali.</p>

<p>L'esercizio da parte dell'Interessato dei suoi diritti e'
gratuito ai sensi dell'articolo 12 del Regolamento. Tuttavia, nel 
caso di richieste manifestamente infondate o eccessive, anche per 
la loro ripetitivita', il Titolare potrebbe addebitare un contributo 
spese ragionevole, alla luce dei costi amministrativi sostenuti per 
gestire la richiesta, o negare la soddisfazione della stessa.</p>

<p>Si precisa che il Titolare, anche tramite le strutture designate,
provvedera' a prendere carico della richiesta e a fornire senza 
ingiustificato ritardo - e comunque, al piu' tardi, entro un mese 
dal ricevimento della stessa - le informazioni relative all'azione 
intrapresa riguardo alla richiesta. Tale termine puo' essere prorogato 
di due mesi, se necessario, tenuto conto della complessita' e del 
numero delle richieste. Qualora il Titolare nutra dubbi circa 
l'identita' della persona fisica che presenta la richiesta, potra' 
richiedere ulteriori informazioni necessarie a confermare l'identita' 
dell'Interessato.</p>

<h2>Conferimento dei dati</h2>

<p>Il conferimento dei dati personali da parte dell'Interessato non 
e' obbligatorio, tuttavia il loro mancato conferimento comporta 
l'impossibilita' di accedere al servizio.</p>
  
</html>
