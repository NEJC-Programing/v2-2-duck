<?php
define("v2_ver", 0);

define("url", "");

define("jsonfile", url."v2_database_".v2_ver.".json");

define("jsondata", file_get_contents(jsonfile));

$data = json_decode(jsondata);

define("line_end",";");

if (sizeof($argv)!=3){
    die("use: [infile] [outfile]");
}

define("infile", $argv[1]);
define("outfile", $argv[2]);

$code = $data->code;
if ($code->ver != v2_ver){
    die("invaled config please change config url to a working one");
}

$file = file_get_contents(infile);

$data = explode(line_end,$file);

$outfile = "REM made by NHTHEBEST's v2-2-duck\n";
$outfile .= "REM This Is BETA\n\n";

foreach($line as $data){

}


function replace($line){
    $line = str_replace($find,$replace,$line);
}
