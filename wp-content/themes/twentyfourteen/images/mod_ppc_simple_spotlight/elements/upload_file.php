<?php
/*
* Pixel Point Creative "Simple Spotlight" Module for Joomla!
* License: GNU General Public License version 2 http://www.gnu.org/copyleft/gpl.html
* Copyright (c) 2010 Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
* Review our terms/license here: http://pixelpointcreative.com/terms.html
*/
define ("MAX_SIZE","2000000"); 
define( '_JEXEC', 1 );
define('JPATH_BASE', dirname(dirname(dirname(dirname(__FILE__)))) );
define( 'DS', DIRECTORY_SEPARATOR );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
JDEBUG ? $_PROFILER->mark( 'afterLoad' ) : null;
$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();
JPluginHelper::importPlugin('system');
// trigger the onAfterInitialise events
JDEBUG ? $_PROFILER->mark('afterInitialise') : null;
$mainframe->triggerEvent('onAfterInitialise');
function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}
		$errors=0;
		if(isset($_POST['Submit'])) 
		{
		$image=$_FILES['image']['name'];
		if (file_exists("../images/".$image)){
			echo '<h3>Image exists! Try again</h3>';
			$errors=1;
		}
		else{
			$filename = stripslashes($_FILES['image']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "JPG") &&($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
				echo '<h3>Unknown extension!</h3>';
				$errors=1;
			}
			else
			{
				$size=filesize($_FILES['image']['tmp_name']);
				if ($size > MAX_SIZE*2048)
					{
						echo '<h3>You have exceeded the size limit!</h3>';
						$errors=1;
					}
					$image_name=$filename;
					$url_background = JPATH_BASE.DS.'modules'.DS.'mod_ppc_simple_spotlight'.DS.'img';
					if(!is_dir("$url_background"))
					{
					mkdir($url_background, 0755);
					chmod($url_background, 0755);
					}
					$newname="$url_background".DS.$image_name;
					
					$copied = copy($_FILES['image']['tmp_name'], $newname);
				if (!$copied) 
					{
						echo '<h3>Copy unsuccessfull!</h3>';
					$errors=1;
					}
			}
		}
		}
		if(isset($_POST['Submit']) && !$errors) 
		{
			echo "<h3 style='font-family:trebuchet ms;color:#828627; '>File Uploaded Successfully!</h3>";
		}
 ?>

 <script language="JavaScript">
	function refreshParent() {
	  window.close();
			if (window.opener && !window.opener.closed) {
				window.opener.location.reload();
			} 
	}
</script>
 <form name="newad" method="post" enctype="multipart/form-data"  action="">
 <table>
 	<tr>
		<td>
			<input type="file" name="image">
		</td>
	</tr>
 	<tr>
		<td>
			<input name="Submit" type="submit" value="Upload image">
			<input type="button" value="Close" onclick="javascript: refreshParent()">
		</td>
	</tr>
 </table>	
 </form>
 
 
 
 
 