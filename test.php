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

//////////////////////////////////////////////////////s
require_once "stringValidator.php";
/////////////////////////////////////////

$Testclass = new StringValidator(); /// creamos el objeto
$Testclass->in_string = $_GET['test'];  // seteamos la cadena pasandole el string que queremos validar


//seteamos las reglas que queremos
$Testclass->set_lenght = 22; // cantidad maxima de caracteres permitidos

// setemos los ctype que permitiremos
$Testclass->set_alpha = FALSE;
$Testclass->set_num = FALSE;
$Testclass->set_alpha_num = FALSE;
$Testclass->set_special_chars = FALSE;
$Testclass->set_string_allowed = TRUE;


// set valores permitidos en el string
$array_test[] = 'julio2';
$array_test[] = 'cadena 2221';
$array_test[] = 'cadena21212 1';
$array_test[] = 'cade2221212na 1';
$array_test[] = 'ca2222dena 1';
$array_test[] = 'cad222ena 1';

$Testclass->string_allowed = $array_test;



$Testclass->stringClean(); // instaciamos la funcion para validar el string  
$testret = $Testclass->out_string; // esta es la cadena devuelta
$status_string = $Testclass->valid_string; // regresa tru o false si la cadena esta validada


echo $_GET['test'];
echo var_dump($testret);

echo "<br>";
echo "in_alpha==>".var_dump($Testclass->in_alpha);
echo "<br>";
echo "in_num==>".var_dump($Testclass->in_num);
echo "<br>";
echo "in_alpha_num==>".var_dump($Testclass->in_alpha_num);
echo "<br>";
echo "in_special_chars==>".var_dump($Testclass->in_special_chars);
echo "<br>";
echo "in_string_alloweds==>".var_dump($Testclass->in_string_allowed);
echo "<br>";




if ($Testclass->valid_string) {

echo "<br><br><hr> VALID STRING";

} else {
    echo "<br><br><hr> <CENTER><H1>NO VALID STRING</H1></CENTER>";
}




?>