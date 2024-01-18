<?php

/*
Julio Gonzalez
Keep It Simple, Stupid! ==> KISS
Don’t repeat yourself ==> DRY

PSR-1: Basic Coding Standard   (Julio Gonzalez)
1. Overview
Files MUST use only <?php and <?= tags.

Files MUST use only UTF-8 without BOM for PHP code.

Files SHOULD either declare symbols (classes, functions, constants, etc.) or cause side-effects 
(e.g. generate output, change .ini settings, etc.) but SHOULD NOT do both.

Namespaces and classes MUST follow an "autoloading" PSR: [PSR-0, PSR-4].

Class names MUST be declared in StudlyCaps.

Class constants MUST be declared in all upper case with underscore separators.

Method names MUST be declared in camelCase.

4.2. Properties
This guide intentionally avoids any recommendation regarding the 
use of $StudlyCaps, $camelCase, or $under_score property names.

MY CHOICE (String and Properties)==> $under_score (Julio Gonzalez)

*/

//////////////////////////////////////////////////////

class StringValidator
{
    #properties
    public $valid_string = FALSE;
    public $in_string;
    public $out_string; 

    public $in_lenght_string;
    public $set_lenght = 20;

    public $special_chars_not_allowed = '!"#$%&\'()*+,-./:;<=>?@[\]^_`{|}~';

    public $string_allowed = [];

/// In string type
    public $in_alpha= FALSE;
    public $in_num = FALSE;
    public $in_alpha_num = FALSE;
    public $in_special_chars = FALSE;
    public $in_string_allowed = FALSE;


///set output string type
    public $set_alpha = TRUE;
    public $set_num = FALSE;
    public $set_alpha_num = FALSE;
    public $set_special_chars = FALSE;
    public $set_string_allowed = FALSE;
    
      
    /*
    function __construct()
    {
       // $this->db_name = 'costanext';
        
         
    }

    */
/// debes 

    public function stringClean()
    {
      //quitamos espacios en blanco al principio y final de la cadena.
        $trimmed = trim($this->in_string);
        $this->out_string = $trimmed;

        // limitamos el tamano de caracteres de la cadena
        //echo substr('abcdef', 0, 4);  // abcd 

         $this->in_lenght_string = strlen($this->in_string);// numero de caracteres de la cadena original

         $sub_string = substr($this->in_string, 0, $this->set_lenght);  // abcd
         $this->out_string = $sub_string;


         // obtenemos  el type del string de entrada
        //ctypes
        ctype_alpha($this->out_string) ? $this->in_alpha = TRUE : $this->in_alpha = FALSE;
        ctype_digit($this->out_string) ? $this->in_num = TRUE : $this->in_num = FALSE;

        //ctype_alnum($this->out_string) ? $this->in_alpha_num = TRUE : $this->in_alpha_num = FALSE;


if(ctype_alnum($this->out_string) AND $this->in_num === FALSE AND $this->in_alpha === FALSE ){

    $this->in_alpha_num = TRUE;

} else{

    $this->in_alpha_num = FALSE;
}

    strpbrk($this->out_string, $this->special_chars_not_allowed) ? $this->in_special_chars = TRUE : $this->in_special_chars = FALSE;  

    in_array($this->out_string, $this->string_allowed) ? $this->in_string_allowed = TRUE : $this->in_string_allowed = FALSE;


///////

$this->in_alpha === TRUE AND $this->set_alpha === TRUE ? $this->valid_string = TRUE : $this->valid_string = FALSE;
$this->in_num === TRUE AND $this->set_num === TRUE ? $this->valid_string = TRUE : $this->valid_string = FALSE;
$this->in_alpha_num === TRUE AND $this->set_alpha_num === TRUE ? $this->valid_string = TRUE : $this->valid_string = FALSE;


$this->in_special_chars === TRUE AND $this->set_special_chars === TRUE ? $this->valid_string = TRUE : $this->valid_string = FALSE;


$this->in_string_allowed === TRUE AND $this->set_string_allowed === TRUE ? $this->valid_string = TRUE : $this->valid_string = FALSE;



    }
}






?>