<?php
class WriteFile
{
	function fwrite($filename = null, $text = null)
	{


		$filename = './files/'.$filename;

		$myfile = fopen($filename.".txt", "a") or die("Unable to open file!");

		fwrite($myfile, $text.'\n');

		fclose($myfile);

	}	
}

?>