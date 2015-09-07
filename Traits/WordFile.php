<?php namespace BasicConcepts\Traits;
	
class WordFile
{
	public $fileType;
	use FileCommonMethods;
	
	public function __construct()
	{
		$this->fileType = "Word";
	}
}