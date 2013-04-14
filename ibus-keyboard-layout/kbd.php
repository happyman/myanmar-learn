<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style type="text/css">
#container
{
margin: 0 auto;
width: 1000px;
background:#fff;
}

#header
{
background:#ccc;
padding: 20px;
}

#header h2 { 
margin: 0; 
	font-family:Myanmar3, Padauk,Parabaik;
	text-align: center;
}

#navigation
{
float: left;
width: 900px;
background:#333;
}

#navigation ul
{
margin: 0;
padding: 0;
}

#navigation ul li
{
	font-family:Myanmar3, Padauk,Parabaik;
	list-style-type: none;
display: inline;
}

#navigation li a
{
display: block;
float: left;
padding: 5px 10px;
color:#fff;
      text-decoration: none;
      border-right: 1px solid#fff;
}

#navigation li a:hover { background:#383; }

#content
{
clear: left;
padding: 20px;
	 font-size: 1em;
	 font-family:Myanmar3, Padauk,Parabaik;
}

#content h3
{
color:#000;
margin: 0 0 .5em;
	font-family:Myanmar3, Padauk,Parabaik;
}

#footer
{
background:#ccc;
	   text-align: right;
padding: 20px;
}

table.kbd td{
	font-family:Zawgyi\-One,Padauk,Parabaik;
	border-width: 2px 4px 5px 3px;
	border-style: solid;
	border-color: #ccc #aaa #888 #bbb;
padding:5px 3px;
	white-space:nowrap;
color:#000;
background:#eee;
}
table.kbd {
width: 100%;
}
td span.my { font-size: 3em; padding: 5px; float: right; color: Blue; }
td span.myerr { font-size: 3em; float:right; color: lightblue; }
td span.myfuyin { font-size: 3em; float:right; color: red; }
td span.mynum { font-size: 3em; float:right; color: orange; }
</style>
</head>
<body>
<div id="container">
<div id="header">
<h2>
Zawgyi-MM3 Keyboard Layout
</h2>
</div>

<div id="content">

<?php
$fuyin=array("ဆ","တ","န","မ","အ","ပ","က","င","သ","စ","ဟ",
		"ဒ","ဖ","ထ","ခ","လ","ဘ","ည","ယ","ဍ","ဋ","ရ","ဂ","ဏ","ဗ","ဓ",
		"ဇ","ဌ","ဃ","ဠ","ဝ","ဈ");
$num=array("၁","၂","၃","၄","၅","၆","၇","၈","၉","၀");


$lines=file("ibus-myanmar-read-only/mm-zawgyi2.txt");
foreach($lines as $line) {
	$a=preg_split("/\s+/",trim($line));
	if (isset($a[1])) {
		//printf("%s %s\n",$a[0], $a[1]);
		$data[$a[0]] = $a[1];
		if (in_array($a[1], $fuyin)){
			$data[$a[0] . "_class"] = "myfuyin";
		}
		if (in_array($a[1], $num)){
			$data[$a[0] . "_class"] = "mynum";
		}
	}
}
$data['B_pad'] = 3;
$data['N_pad'] = 3;
$data['M_pad'] = 3;
$data['j_pad'] = 2;
$data['`U_pad'] = 1;
$data['`J_pad'] = 3;
$data['`M_pad'] = 3;
$data['`m_pad'] = 2;
out(0,"1. Normal Keys");
out(1,"2. Shift Keys");
out(2,"3. ` + Normal Keys");
out(3,"4. ` + Shift Keys");
function out($i,$d) {
	global $data;

	?>
		<br>
		<h3>
		<?php echo $d; ?>
		</h3>

		<table class="kbd">
		<tbody><tr>
		<td style="width:2em;">Esc</td>
		<td style="width:0.5em;"></td>
		<td style="width:2em;">F1</td>
		<td style="width:2em;">F2</td>
		<td style="width:2em;">F3</td>
		<td style="width:2em;">F4</td>
		<td style="width:0.5em;"></td>
		<td style="width:2em;">F5</td>
		<td style="width:2em;">F6</td>
		<td style="width:2em;">F7</td>
		<td style="width:2em;">F8</td>
		<td style="width:0.5em;"></td>
		<td style="width:2em;">F9</td>
		<td style="width:2em;">F10</td>
		<td style="width:2em;">F11</td>
		<td style="width:2em;">F12</td>
		</tr>
		</tbody></table>
		<table class="kbd">
		<tbody><tr>
		<?php
		$kk[0] = array("`","1","2","3","4","5","6","7","8","9","0","-","=");
	$kk[4] = array("~","!","@","#","$","%","^","&","*","(",")","_","+");
	$kk[8] = array("``","`1","`2","`3","`4","`5","`6","`7","`8","`9","`0","`-","`=");
	$kk[12] = array("`~","`!","`@","`#","`$","`%","`^","`&","`*","`(","`)","`_","`+");
	foreach($kk[$i*4] as $key) {
		outline($data,$key);
	}
	?>
		<td style="width:3em;" class="special"><span class="en">Bksp</span></td>
		</tr>
		</tbody></table>
		<table class="kbd">
		<tbody><tr>
		<td style="width:3em;" class="special"><span class="en">Tab</span></td>
		<?php
		$kk[1] = array("q","w","e","r","t","y","u","i","o","p","[","]","\\");
	$kk[5] = array("Q","W","E","R","T","Y","U","I","O","P","{","}","|");
	$kk[9] = array("`q","`w","`e","`r","`t","`y","`u","`i","`o","`p","`[","`]","`\\");
	$kk[13] = array("`Q","`W","`E","`R","`T","`Y","`U","`I","`O","`P","`{","`}","`|");

	foreach($kk[$i*4+1] as $key) {
		outline($data,$key);
	}
	?>
		</tr>
		</tbody></table>
		<table class="kbd">
		<tbody><tr>
		<td style="width:3.8em;" class="special"><span class="en">Caps</span></td>
		<?php
		$kk[2] = array("a","s","d","f","g","h","j","k","l",";","'");
	$kk[6] = array("A","S","D","F","G","H","J","K","L",":","\"");
	$kk[10] = array("`a","`s","`d","`f","`g","`h","`j","`k","`l","`;","`'");
	$kk[14] = array("`A","`S","`D","`F","`G","`H","`J","`K","`L","`:","`\"");
	foreach($kk[$i*4+2] as $key) {
		outline($data,$key);
	}
	?>
		<td style="width:4em;" class="special"><span class="en">Enter</span></td>
		</tr>
		</tbody></table>
		<table class="kbd">
		<tbody><tr>
		<td style="width:5.0em;" class="special"><span class="en">Shift</span></td>
		<?php
		$kk[3] = array("z","x","c","v","b","n","m",",",".","/");
	$kk[7] = array("Z","X","C","V","B","N","M","<",">","?");
	$kk[11] = array("`z","`x","`c","`v","`b","`n","`m","`,","`.","`/");
	$kk[15] = array("`Z","`X","`C","`V","`B","`N","`M","`<","`>","`?");
	foreach($kk[$i*4+3] as $key) {
		outline($data,$key);
	}
	?>
		<td style="width:5.6em;" class="special"><span class="en">Shift</span></td>
		</tr>
		</tbody></table>
		<table class="kbd">
		<tbody><tr>
		<td style="width:3em;" class="special"><span class="en">Ctrl</span></td>
		<td style="width:3em;" class="special"><img src="windows-key.gif" alt="Windows Key"><span class="en">Win</span></td>
		<td style="width:3em;" class="special"><span class="en">Alt</span></td>
		<td style="width:12.8em;" align="center"><span class="en">Space Bar</span></td>
		<td style="width:3em;" class="special"><span class="en">Alt</span></td>
		<td style="width:3em;" class="special"><img src="windows-key.gif" alt="Windows Key"><span class="en">Win</span></td>
		<td style="width:3em;" class="special"><img src="windows-application-key.gif" alt="Windows Application Key"><span class="en">Menu</span></td>
		<td style="width:3em;" class="special"><span class="en">Ctrl</span></td>
		</tr>
		</tbody></table>
		<br>
		<?php
}
function outline($data,$key) {
	printf("<td style=\"width:2em;\"><span class=\"%s\">%s%s</span><span class=\"en\">%s</span></td>\n",
			isset($data[$key. "_class"]) ? $data[$key. "_class"] : "my",
			isset($data[$key])? $data[$key] : "&nbsp", 
			isset($data[$key. "_pad"])? str_repeat("&nbsp;",$data[$key. "_pad"]): "",
			(strlen($key)>1)? $key{1}: $key);

}

?>
</div>
<div id="footer">
<ul><li>table from: http://code.google.com/p/ibus-myanmar/source/browse/trunk/mm-zawgyi.txt
<li>       email: happyman.eric@gmail.com
</ul>

</div>

