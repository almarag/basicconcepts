<?php

/***
 * Traits Example - Alejandro Martinez (almarag@gmail.com)
 * Traits are a recent addition starting on PHP 5.4 branch.
 * Traits are a set of methods that can be used on different classes  
 * with a single implementation. This is a workaround for the lack of
 * multiple hereby limitation on PHP, which allows to have a more
 * organized way to have common code without the issues of the 
 * multiple hereby.
 */
	
require_once("Traits.php");
require_once("ExcelFile.php");
require_once("WordFile.php");

use BasicConcepts\Traits\ExcelFile as ExcelFile;
use BasicConcepts\Traits\WordFile as WordFile;	

$excel = new ExcelFile();
$word = new WordFile();

$excel->GetFile();
$excel->SaveFile();
$word->GetFile();
$word->SaveFile();