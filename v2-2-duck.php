<?php
define("v2_ver", 1);

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
if (file_exists(outfile)){
unlink(outfile);
}
$myfile = fopen(outfile, "w");

$file = file_get_contents(infile);

$fdata = explode(line_end,$file);

fwrite($myfile, "REM made by NHTHEBEST's v2-2-duck\r\n");
fwrite($myfile, "REM This Is BETA\r\n\r\n");

$cmd = $data->cmd;
$v2 = $cmd->v2;
$duck = $cmd->duck;
$length = $code->cmds - 1;
foreach($fdata as $line){
    if (strpos($line, "function")===0){
        $function = explode("function", $line,1);
        $temp = explode("{", $function[0],1);
        $function_name = $temp[0];
        $temp = explode("}", $temp[1],1);

    }
}
foreach($fdata as $line){
    main_run($line);
}


fclose($myfile);
echo "done";

function main_run($line){
    $i = 0;
    while($i != $length){
        fwrite($myfile, str_replace($v2[$i],$duck[$i],$line));
        echo str_replace($v2[$i],$duck[$i],$line);
        $i++;
    }
}
