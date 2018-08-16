<?php
define('baseurl','http://localhost/Display Images/');
$basedir = isset($_GET['fd']) && $_GET['fd']?$_GET['fd']:'images';
function hienhinh($folder ='images')
{
	$f = opendir($folder);
	while(($file = readdir($f)))
	{
		//echo $file,'<br>';
		$ext = explode('.',$file);
		$ext = isset($ext[count($ext)-1])?$ext[count($ext)-1]:'';
		$pathfile = $folder.'/'.$file;
		if(is_file($pathfile) && in_array($ext,array('jpg','png','gif','bmp')))
		{
			echo '<label>
					<img src="'.baseurl.$pathfile.'" width="100px" height="70px"/>
					<span>'.$file.'</span>
					<input type="checkbox" name="hinhchon[]" value="'.baseurl.$pathfile.'"/>
					</label>';
		}else
		if(!is_file($pathfile) && $file != '.' && $file != '..')
		{
			$pathfolder = $folder.'/'.$file;
			echo '
				<label>
				<a href="?fd='.$pathfolder.'">
				<img src="'.baseurl.'fd.png" width="100px" height="70px"/>
				<span>'.$file.'</span></a>
				</label>
			';
			
		}
	}
}

?>
<div>
<?php 
hienhinh($basedir);
?>
</div>
