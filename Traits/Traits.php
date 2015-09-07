<?php namespace BasicConcepts\Traits;
	
trait FileCommonMethods {
	public function SaveFile()
	{
		echo "Saving ".$this->fileType." File...";
		echo "Done. \n";	
	}
	
	public function GetFile()
	{
		echo "Retrieving ".$this->fileType." File...";
		echo "Done. \n";
	}
}