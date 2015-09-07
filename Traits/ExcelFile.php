<?php namespace BasicConcepts\Traits;
	
class ExcelFile
{
	public $fileType;
	use FileCommonMethods;
	
	public function __construct()
	{
		$this->fileType = "Excel";
	}
}