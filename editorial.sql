-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: editorial
-- ------------------------------------------------------
-- Server version	10.9.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES
(1,'Viitorul Internetului: Tehnologia 5G și Impactul Său Asupra Comunicării','Tehnologia 5G a fost subiect de discuție intensă în ultimii ani, iar impactul său asupra modului în care ne comunicăm și conectăm cu lumea este imens. Acest articol explorează ce înseamnă 5G, cum funcționează și ce posibilități deschide pentru dispozitivele noastre conectate. De la viteze de descărcare mai rapide la dezvoltarea realității virtuale, descoperiți cum tehnologia 5G schimbă modul în care interacționăm cu internetul.','2023-11-02 13:49:37',NULL,1,2,1),
(2,'Inteligent și Conectat: Evoluția Casei Inteligente','Casa inteligentă devine din ce în ce mai accesibilă și oferă o gamă largă de dispozitive și funcționalități pentru a face viața mai ușoară. Acest articol explorează cele mai recente inovații în domeniul casei inteligente, de la asistenții vocali la sistemele de securitate conectate. Descoperiți cum puteți transforma casa dvs. într-un mediu inteligent și eficient energetic.','2023-11-02 13:54:15',NULL,1,2,1),
(3,'Inovații în Inteligența Artificială: Cum AI Schimbă Diverse Industrii','Inteligența artificială (AI) este în ascensiune rapidă și își găsește aplicații într-o varietate de industrii, de la medicină la industria auto. Acest articol vă introduce în lumea AI și vă arată cum tehnologia este utilizată pentru a rezolva probleme complexe și pentru a aduce inovație în diferite sectoare. De la roboți asistenți la diagnoze medicale mai precise, descoperiți cum AI schimbă lumea.','2023-11-02 13:54:15',NULL,1,2,1),
(4,'Călătoria Către Mașinile Autonome: Tehnologia din Spatele Conducerii Autonome','Mașinile autonome reprezintă viitorul transportului, dar ce se ascunde în spatele acestei tehnologii? Acest articol vă oferă o privire în culisele tehnologiei de conducere autonomă, de la senzori și inteligență artificială până la algoritmi complexi de luare a deciziilor. Înțelegeți cum mașinile autonome funcționează și ce ne așteaptă în drumul către un viitor fără șoferi.','2023-11-02 13:55:08',NULL,1,2,1),
(5,'Cybersecurity în Era Digitală: Cum Ne Protejăm Într-o Lume Conectată','\"Într-o lume tot mai conectată digital, securitatea cibernetică devine o preocupare majoră. Acest articol examinează provocările și soluțiile în ceea ce privește securitatea online. De la amenințările cibernetice comune la cele mai bune practici pentru a vă proteja datele și identitatea online, descoperiți ce pași puteți lua pentru a vă menține în siguranță în era digitală.','2023-11-02 13:55:08',NULL,1,2,1),
(6,'Evoluția Artei în Timp: De la Pictura Rupestră la Artă Digitală','\"Arta este o expresie profundă a creativității umane și a evoluat semnificativ de-a lungul mileniilor. De la primele picturi rupestre descoperite în peșteri până la operele de artă digitală contemporană, această călătorie în timp ne dezvăluie cum arta a evoluat și s-a adaptat la schimbările tehnologice și culturale.\"\r\n\r\n\"Arta rupestră, realizată cu mii de ani în urmă, ne-a oferit o privire în vechile culturi și în modul în care oamenii antici au înregistrat lumea lor. De-a lungul secolelor, arta a trecut prin diferite mișcări artistice, precum Renascentismul și Impresionismul, reflectând schimbările din societate și modul în care artiștii și-au exprimat viziunile.\"\r\n\r\n\"Cu apariția tehnologiei digitale, arta a evoluat într-un mod uimitor. Artiștii contemporani pot crea opere de artă digitală folosind software specializat și tablete grafice, deschizând noi orizonturi pentru creativitate și exprimare. Artiștii utilizează astăzi platforme online pentru a-și împărtăși creațiile cu o audiență globală.\"\r\n\r\n\"Artiștii au explorat, de asemenea, mediile mixte, combinând elemente tradiționale și digitale pentru a crea opere de artă hibride. Această sinteză a artelor ne arată că arta este în continuă evoluție și că poate îmbrățișa noile tehnologii fără a-și pierde autenticitatea.\"\r\n\r\n\"Evoluția artei demonstrează că aceasta rămâne o formă vitală de exprimare și că este capabilă să se adapteze și să se reinventeze în fața schimbărilor lumii moderne.\"','2023-11-02 13:58:19',NULL,2,1,1),
(7,'Arta și Emoția Umană: Cum Operele de Artă Ne Influentează Sentimentele','\"Arta are o putere unică de a provoca emoții și de a influența starea noastră de spirit. Încă din cele mai vechi timpuri, oamenii au căutat să transmită sentimente și experiențe prin intermediul operelor lor de artă. Acest articol explorează modul în care operele de artă ne influențează emoțiile și ne conectează la lumea noastră interioară.\"\r\n\r\n\"Culoarea, compoziția și subiectul unei lucrări de artă pot activa diferite zone ale creierului și pot declanșa răspunsuri emoționale. De exemplu, o pictură vibrantă poate stârni bucurie și entuziasm, în timp ce o lucrare mai sobră poate provoca contemplare sau melancolie.\"\r\n\r\n\"Operele de artă pot fi, de asemenea, instrumente puternice de terapie. Art-terapia este o practică în creștere, care folosește creația artistică pentru a ajuta oamenii să-și exprime și să-și gestioneze emoțiile. Aceasta poate fi folosită pentru a trata diverse tulburări și probleme de sănătate mintală.\"\r\n\r\n\"Artiștii înșiși folosesc deseori arta pentru a-și exprima propriile emoții și experiențe. Operele lor pot fi oglindi ale stărilor lor interioare și pot avea un impact profund asupra celor care le privesc.\"\r\n\r\n\"Într-o lume plină de provocări și schimbări, arta rămâne o sursă de inspirație și consolare pentru mulți. Ne conectează la aspectele umane comune și ne ajută să ne înțelegem mai bine pe noi înșine și lumea înconjurătoare.\"','2023-11-02 13:59:24',NULL,2,1,1),
(8,'Artă și Identitate Culturală: Cum Diversitatea Se Reflectă în Operele de Artă','\"Arta a fost întotdeauna o modalitate de a exprima identitatea culturală și de a reflecta diversitatea umană. Această temă explorează modul în care artiștii din întreaga lume utilizează operele lor pentru a prezenta tradițiile, valorile și experiențele culturale unice.\"\r\n\r\n\"De la arta indigenă la cele mai noi mișcări artistice urbane, diversitatea culturală se regăsește în fiecare aspect al creației artistice. Operele de artă pot fi un limbaj universal care ne ajută să înțelegem și să apreciem mozaicul culturilor din jurul nostru.\"\r\n\r\n\"Multe evenimente artistice și expoziții globale celebrează diversitatea culturală prin intermediul artelor. Aceste manifestări aduc împreună artiști și publicuri din toate colțurile lumii pentru a sărbători și împărtăși bogăția culturilor.\"\r\n\r\n\"Într-o lume în continuă schimbare, arta poate funcționa ca un punte între culturi și poate contribui la dialogul intercultural. Ea ne învață să apreciem și să respectăm diferențele, contribuind la o lume mai tolerantă și mai inclusivă.\"\r\n\r\n\"Arta și identitatea culturală sunt legate intrinsec. Prin intermediul artei, putem descoperi povestile culturale care ne unesc și ne definește.\"','2023-11-02 14:01:57',NULL,2,1,3),
(9,'Artă și Filosofie: Cum Creativitatea Ne Deschide Mentiunea','\"Arta și filosofia au o relație profundă care se întinde pe secole. Acest articol explorează cum creativitatea și gândirea filosofică interacționează pentru a deschide mințile noastre și pentru a ne ajuta să explorăm întrebări profunde legate de existență și sens.\"\r\n\r\n\"Artiștii au fost întotdeauna filozofi în propriul lor mod, folosind creația lor pentru a aborda chestiuni existențiale și pentru a provoca gândirea. Lucrările lor pot deschide dezbateri profunde asupra a ceea ce înseamnă să fii uman.\"\r\n\r\n\"Operele de artă pot funcționa ca mijloace de a transmite idei și mesaje filozofice. Ele pot stimula reflecția și introspecția, permițându-ne să ne întrebăm despre viață, moarte, fericire și suferință.\"\r\n\r\n\"Pe de altă parte, filosofia poate oferi artiștilor context și teorii pentru a înțelege mai bine sensul creației lor. Între cele două discipline există un dialog creativ care stimulează înțelegerea noastră despre lume și experiența umană.\"\r\n\r\n\"Arta și filosofia ne ajută să ne conectăm cu profunzimile gândirii și să explorăm întrebări esențiale legate de viață și existență. Ele ne inspiră să ne deschidem mințile și să căutăm înțelegerea profundă.\"','2023-11-02 14:01:57',NULL,2,1,2),
(10,'Arta Publică: Cum Spațiile Urbane Devin Pânze pentru Creativitate','\"Arta publică a devenit o parte vitală a peisajului urban, aducând culoare, expresie și mesaje în locuri accesibile publicului larg. Acest articol explorează modul în care spațiile urbane devin pânze pentru creativitate și cum arta publică poate transforma mediul urban.\"\r\n\r\n\"Graffiti, murale și instalații artistice sunt doar câteva exemple de artă publică care își găsesc locul în orașe. Aceste manifestări adaugă o dimensiune culturală și artistică la mediul urban, oferind un spațiu pentru exprimare și comunicare.\"\r\n\r\n\"Artiștii urbani folosesc adesea arta publică pentru a transmite mesaje sociale și politice. Aceste lucrări pot deveni mijloace de protest, exprimând opinii și provocând dezbateri în spațiul public.\"\r\n\r\n\"Arta publică ne aduce în contact cu o expresie artistică neconvențională și poate schimba perspectiva asupra mediului în care trăim. Ea ne invită să privim orașele noastre cu ochi noi.\"\r\n\r\n\"Arta publică transformă spațiile urbane în galerii deschise pentru toți să se bucure. Ea ne amintește că arta poate trăi în afara muzeelor și poate să ne surprindă în locuri neașteptate.\"\r\n\r\n','2023-11-02 14:02:47',NULL,2,1,3),
(11,'Explorând Misterul Găurilor Negre: Poarta Către Universuri Paralele?','\"Găurile negre sunt una dintre cele mai fascinante entități din cosmos. Acest articol explorează natura lor enigmatică, inclusiv modul în care ele pot servi ca portaluri către universuri paralele, conform teoriilor fizicienilor.\"\r\n\r\n\"Găurile negre sunt cunoscute pentru gravitația lor incredibil de puternică, care atrage totul în interiorul lor, inclusiv lumină. Ele pot varia în dimensiune, de la cele mai mici până la cele mai masive, numite găuri negre supermasive.\"\r\n\r\n\"În ultimii ani, fizicienii au propus teorii îndrăznețe, sugerând că găurile negre ar putea fi o cheie către înțelegerea universurilor paralele sau a călătoriei în timp. Cu toate acestea, astfel de idei rămân speculative și necesită cercetări suplimentare.\"\r\n\r\n\"Studiul găurilor negre continuă să ridice întrebări fundamentale despre structura universului nostru. Aceste entități misterioase deschid porți către explorări ulterioare și ne invită să privim cu umilință și fascinație spre cerurile nopții.\"','2023-11-02 14:08:15',NULL,2,3,1),
(12,'Genomul Uman: Cartografierea Miliarde de Litere ADN','\"Cartografierea genomului uman a reprezentat un moment revoluționar în știința medicală și biologică. Acest articol explorează povestea din spatele efortului de a descifra miliarde de litere din ADN-ul nostru.\"\r\n\r\n\"Genomul uman conține informații complete despre ereditatea noastră și influențează totul, de la sănătatea noastră la trăsăturile noastre fizice. Cartografierea lui a necesitat tehnologie avansată și colaborare globală.\"\r\n\r\n\"Proiectul Genomului Uman, finalizat în anii 2000, a implicat mii de cercetători din întreaga lume. Rezultatele acestui efort au oferit noi perspective asupra geneticii umane și au deschis calea pentru cercetări medicale inovatoare.\"\r\n\r\n\"Descifrarea genomului uman continuă să aducă beneficii semnificative în domeniul medicinei personalizate și al înțelegerii bolilor genetice. Această realizare impresionantă reprezintă un pas important în cunoașterea noastră despre noi înșine.\"','2023-11-02 14:08:15',NULL,2,3,3),
(13,'Viitorul Energiei: Căutând Soluții Durabile','\"Criza energetică și îngrijorările legate de schimbările climatice ne îndeamnă să explorăm soluții durabile pentru producerea de energie. Acest articol examinează tehnologiile emergente care ar putea schimba peisajul energetic în viitor.\"\r\n\r\n\"Energie regenerabilă, cum ar fi energia solară și cea eoliană, câștigă tot mai mult teren. Aceste surse de energie curată oferă alternative la combustibilii fosili și ajută la reducerea emisiilor de carbon.\"\r\n\r\n\"Tehnologii precum stocarea avansată a energiei și rețelele inteligente devin tot mai importante în gestionarea eficientă a energiei regenerabile. Ele permit o utilizare mai eficientă și distribuție a energiei.\"\r\n\r\n\"Cercetătorii continuă să exploreze surse de energie neconvenționale, cum ar fi energia de la nivel atomic sau energia mareelor. Viitorul energetic ar putea să depindă de inovații care să ofere soluții sustenabile și curate.\"','2023-11-02 14:08:15',NULL,2,3,1),
(14,'Ingineria Genică și Viitorul Alimentației: Crearea Culturilor Modificate Genetic','\"Ingineria genetică a schimbat paradigma agriculturii, permițând modificarea plantelor și a culturilor într-un mod precis. Acest articol explorează cum această tehnologie influențează viitorul alimentației.\"\r\n\r\n\"Culturile modificate genetic pot rezista la boli și dăunători, pot crește în condiții mai dificile și pot fi mai nutritive. Aceste modificări aduc beneficii semnificative producției alimentare.\"\r\n\r\n\"Cu toate acestea, ingineria genetică ridică întrebări legate de siguranța alimentară, mediu și etică. Dezbaterea cu privire la culturile modificate genetic continuă să fie un subiect controversat.\"\r\n\r\n\"Viitorul alimentației ar putea depinde de capacitatea noastră de a echilibra inovația tehnologică cu responsabilitatea față de mediu și sănătatea umană. Ingineria genetică reprezintă o parte din acest puzzle complex.\"','2023-11-02 14:08:15',NULL,2,3,2),
(15,'Căutând Viața în Afara Pământului: Explorarea Exoplanetelor','\"Întrebarea dacă suntem singuri în univers continuă să stimuleze cercetătorii să exploreze exoplanetele și să caute semne ale vieții extraterestre. Acest articol dezvăluie eforturile în curs de a detecta exoplanete și a înțelege posibilele condiții de viață.\"\r\n\r\n\"Telescoapele spațiale și tehnologiile de detecție au permis descoperirea a mii de exoplanete aflate în afara sistemului solar. Acesta este un pas semnificativ în direcția răspunsului la vechea întrebare despre viața în afara Pământului.\"\r\n\r\n\"Cercetătorii studiază atmosferele exoplanetelor în căutarea semnelor de apă și compuși chimici care ar putea susține viața. În plus, ei explorează exoplanetele aflate în \'zona locuibilă\', unde condițiile pot fi prielnice vieții.\"\r\n\r\n\"Descoperirile ulterioare în domeniul exoplanetelor ar putea revoluționa înțelegerea noastră despre locul nostru în univers și despre posibilitatea existenței vieții extraterestre. Căutarea vieții în spațiul cosmic rămâne unul dintre cele mai captivante eforturi ale științei moderne.\"','2023-11-02 14:08:15',NULL,2,3,1),
(16,'Moda Durabilă: Tendința către Îmbrăcăminte Ecologică','\"Moda durabilă a devenit o mișcare puternică în industria modei, cu accent pe producția și consumul de îmbrăcăminte ecologică. Acest articol explorează importanța modei durabile și modul în care aceasta afectează mediul și societatea.\"\r\n\r\n\"Industria modei a fost adesea criticată pentru impactul său asupra mediului, dar moda durabilă încearcă să schimbe acest aspect. Ea promovează materiale reciclabile, producția locală și etica muncii.\"\r\n\r\n\"Moda durabilă nu se limitează doar la haine, ci se extinde și la încălțăminte și accesorii. Designul inteligent și materialele inovatoare sunt utilizate pentru a crea produse ecologice și de calitate.\"\r\n\r\n\"Consumatorii au un rol esențial în susținerea modei durabile. Alegând să cumpere produse etice și să-și păstreze hainele mai mult timp, ei pot contribui la reducerea deșeurilor și la protejarea resurselor naturale.\"\r\n\r\nParagraf 5: \"Moda durabilă nu este doar o tendință, ci o schimbare semnificativă în modul în care vedem și abordăm modă. Ea oferă speranța că industria modei poate deveni mai prietenoasă cu mediul și mai responsabilă social.\"\r\n\r\n\"Designul vestimentar durabil se concentrează pe calitate și rezistență, în loc de efemeritate și consum excesiv. Acesta încurajează o atitudine mai conștientă față de modă.\"\r\n\r\n\"Viitorul modei pare să fie verde, deoarece moda durabilă câștigă tot mai mulți adepți și susținători. Această mișcare are potențialul de a schimba în bine industria modei pe termen lung.\"','2023-11-02 14:14:39',NULL,2,4,1),
(17,'Stilul Retro: Revenirea Modei din Trecut','\"Stilul retro a cunoscut o revenire puternică în lumea modei. Acest articol explorează tendința de a îmbrăca și adopta elemente vestimentare inspirate din trecut și modul în care moda retro a devenit o parte semnificativă a culturii actuale.\"\r\n\r\n\"Rochiile cu imprimeuri florale, fuste cloș, ochelari cat eye și culorile pastel au devenit repere ale modei retro. Acest stil este inspirat de epoci precum anii \'50, \'60 și \'70.\"\r\n\r\n\"Mulți designeri au fost inspirați de moda retro și au integrat elemente vintage în colecțiile lor. Acest amestec de trecut și prezent a dus la creații originale și în trend.\"\r\n\r\n\"Moda retro oferă posibilitatea de a aduce o notă de nostalgie în garderoba modernă. Alegând să purtăm haine retro, ne putem conecta cu stilul și cultura trecutului.\"\r\n\r\n\"Vintage-ul nu este doar pentru haine, ci se extinde și la accesorii, mobilier și decorațiuni interioare. Acest trend a devenit un mod de viață pentru unii.\"\r\n\r\n\"Stilul retro nu este doar o tendință trecătoare, ci un mod de a celebra și păstra moștenirea modei și a culturii. El ne amintește de frumusețea și diversitatea stilurilor din trecut.\"\r\n\r\n \"Moda retro continuă să aibă un loc important în lumea modei și rămâne o sursă de inspirație pentru designeri și iubitorii de modă din întreaga lume.\"','2023-11-02 14:14:39',NULL,2,4,2),
(18,'Haute Couture: În Căutarea Luxului și Eleganței','\"Haute couture reprezintă apogeul modei și este cunoscută pentru luxul și atenția la detalii. Acest articol explorează lumea ha ute couture și modul în care ea continuă să inspire și să definească moda de elită.\"\r\n\r\n\"Termenul \'haute couture\' se referă la creații vestimentare de înaltă calitate, confecționate manual și personalizate pentru fiecare client. Aceste creații sunt realizate de cele mai prestigioase case de modă.\"\r\n\r\n\"Haute couture reprezintă vârful modei și este asociată cu prețuri exorbitante. Cu toate acestea, ea reprezintă arta modei și implică o muncă manuală complexă și detaliată.\"\r\n\r\n\"Săptămâna Modei de la Paris este unul dintre cele mai importante evenimente din lumea ha ute couture. Aici, case de modă prezintă cele mai recente creații într-un spectacol impresionant.\"\r\n\r\n\"Haute couture nu este doar despre haine, ci și despre pălării, bijuterii și accesorii de lux. Acest stil se adresează celor care caută exclusivitate și rafinament.\"\r\n\r\n\"Haute couture este în esență o formă de artă, unde designerii pot da frâu liber creativității lor și pot crea opere de artă purtabile. Aceasta reprezintă etalonul excelenței în modă.\"\r\n\r\n\"Haute couture continuă să fascineze și să inspire iubitorii de modă din întreaga lume, reprezentând o celebrare a luxului, eleganței și creației unice.\"','2023-11-02 14:14:39',NULL,2,4,1),
(19,'Moda Streetwear: Expresia Individualității Prin Haine','\"Streetwear este un stil vestimentar care pune accent pe individualitate și nonconformitate. Acest articol explorează evoluția streetwear-ului și modul în care el a devenit un mijloc de expresie pentru tinerii din întreaga lume.\"\r\n\r\n\"Streetwear îmbină elemente ale culturii hip-hop, a sporturilor și a artei stradale. Hainele streetwear sunt adesea confortabile, dar și expresive.\"\r\n\r\n\"În ultimii ani, streetwear-ul a câștigat popularitate în rândul tinerilor și a fost adoptat de designeri de renume. Colaborările dintre branduri de streetwear și case de modă de lux sunt tot mai comune.\"\r\n\r\n\"Acest stil vestimentar a devenit o formă de expresie culturală și politică. Adesea, hainele streetwear transmit mesaje sociale și politice sau reflectă identități subculturale.\"\r\n\r\n\"Streetwear nu are reguli rigide, ceea ce îl face accesibil și liber. Tinerii folosesc acest stil pentru a-și arăta personalitatea și pentru a ieși în evidență în mulțime.\"\r\n\r\n\"Streetwear continuă să evolueze și să inspire tendințe noi în modă. Acesta este o formă de creație artistică și de autoexprimare care nu cunoaște limite.\"\r\n\r\n\"Streetwear este mai mult decât un stil vestimentar, este o mișcare culturală care influențează atât moda, cât și societatea în ansamblu.\"','2023-11-02 14:14:39',NULL,2,4,3),
(20,'Moda și Identitatea de Gen: Abordarea Noilor Perspective','\"Moda a început să exploreze și să abordeze mai conștient identitatea de gen. Acest articol discută modul în care moda devine tot mai inclusivă și reflectă diversitatea de gen.\"\r\n\r\n\"În trecut, moda a fost adesea rigidă în ceea ce privește separarea dintre hainele pentru bărbați și femei. Cu toate acestea, designerii contemporani explorează teritoriul dintre aceste limite.\"\r\n\r\n\"Branduri și designeri încep să creeze haine unisex sau să ofere opțiuni care nu se limitează la normele tradiționale de gen. Astfel, moda devine mai incluzivă pentru toate identitățile de gen.\"\r\n\r\n\"Tinerele generații adoptă cu entuziasm această schimbare și folosesc moda pentru a-și exprima identitatea de gen. Astfel, hainele devin un mijloc de a arăta lumii cine sunt cu adevărat.\"\r\n\r\n\"Moda și identitatea de gen au un dialog reciproc. În același timp, moda poate influența în mod semnificativ felul în care societatea privește și înțelege genul.\"\r\n\r\n\"Această evoluție în lumea modei aruncă o lumină asupra schimbărilor în mentalitate și în societatea noastră, subliniind importanța acceptării și respectului pentru toate identitățile de gen.\"\r\n\r\n\"Moda contemporană abordează identitatea de gen cu sensibilitate și deschidere. Ea promovează ideea că hainele sunt pentru toți și că fiecare persoană are dreptul să-și exprime unicitatea și autenticitatea.\"','2023-11-02 14:14:39',NULL,2,4,1);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'Arta','Descoperiți Lumea Artei: Aici, veți găsi o bogată colecție de articole care explorează universul fascinant al artei în toate formele sale. De la pictură la sculptură, de la muzică la teatru, și multe altele, suntem dedicați să vă aducem poveștile, creațiile și inovațiile din lumea artei. Apreciați frumusețea, exprimarea și creativitatea care definesc arta în toate formele ei. Fie că sunteți un iubitor al artei sau un pasionat în căutarea inspirației, această categorie vă invită să explorați și să vă bucurați de minunata lume a creației umane.'),
(2,'Tehnica','Bine ați venit în lumea fascinantă a tehnologiei, unde inovația și progresul se întâlnesc. În această coloană, vă invităm să explorați cele mai recente descoperiri, tendințe și dezvoltări din domeniul tehnologic. De la gadget-uri și dispozitive inteligente până la programare și inteligență artificială, veți găsi articole bine documentate și analize de ultimă oră.\r\n\r\nIndiferent dacă sunteți pasionat de gadget-uri de ultimă generație, dezvoltator de software, sau doar un curios în căutarea noilor tendințe, această categorie este destinată să vă țină la curent cu lumea tehnologică în continuă schimbare. Descoperiți cum tehnologia schimbă viețile noastre și influențează viitorul, pas cu pas, articol cu articol.'),
(3,'Sttinta','Împreună, vom explora enigmele universului și vom dezvălui minunile care ne înconjoară. În fiecare articol, deschideți ușa către cunoaștere și admirați complexitatea și frumusețea științei care ne ghidează în călătoria noastră spre adevăr.\r\nDe la fizică cuantică și astronomie la biologie și ecologie, veți găsi articole captivante și informații de ultimă oră despre avansurile științifice. Fie că sunteți un pasionat al cosmosului, un iubitor al naturii sau doar un căutător de răspunsuri la întrebări existențiale, această categorie vă oferă o fereastră către misterul științei.\r\n'),
(4,'Moda','De la prezentările de modă și celebrități la ghiduri practice pentru garderoba de zi cu zi, veți descoperi tot ce aveți nevoie pentru a vă inspira și a vă exprima personalitatea prin modă. Indiferent dacă sunteți un pasionat al modei sau doar doriți să vă bucurați de frumusețea și diversitatea stilului, această categorie vă invită să explorați și să vă exprimați propria personalitate prin modă.');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(400) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(15) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'utilizator','Utilizator simplu cu drepturi doar de vizualizare. Utilizatorii de acest tip mai au si posibilitatea de a salva o lista de articole favorite.'),
(2,'jurnalist','Utilizatori cu drepturi de vizualizare si editare/publicare de articole.'),
(3,'editor','Editorul are responsabilitatea de analiza / aproba / anula articole ce urmeaza sa fie publicate. Editorul poate lasa comentarii asupra articolelor ne-publicate.'),
(4,'administrator','Utilizatorul cu drepturi de administrator are control absolut asupra utilizatorilor, jurnalistilor si editorilor. Poate crea / sterge si modifica  utlizatori, articole si setari de configurare ale platformei.');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(15) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES
(1,'Publicat','Publicat si activ pe site'),
(2,'Ne-publicat','Ne-publicat, in curs de aprobare de catre editor'),
(3,'Draft','In curs de scriere'),
(4,'Arhivat','Nu mai este relevant pentru site, dar face parte din arhiva');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `token` varchar(20) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_name` (`u_name`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_user_role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'tdascal','Tiberiu','Dascal','tdascal@email.com','2d18742fe4852899a04941acd83f132c',NULL,2,'2023-10-28 14:38:45',NULL),
(2,'ovidiu','Ovidiu','Benjamin','ovidiu@email.com','06b358bcc24beae9ca8915d573022202',NULL,3,'2023-10-28 14:39:12',NULL),
(3,'ionut','Ionut','Vinte','ionut@email.com','5e498ed463ea7a6be7e2d9215a5f8781',NULL,4,'2023-10-28 14:39:38',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-02 17:49:39
