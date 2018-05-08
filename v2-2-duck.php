<?php
define("v2_ver", 0);

define("url", "test");

define("jsonfile", url."/v2_database_".v2_ver.".json");

define("jsondata", file_get_contents(jsonfile));

$data = json_decode(jsondata);

define("line_end",";");

if (sizeof($argv)!=3){
    die("use: [infile] [outfile]");
}

define("infile", $argv[1]);
define("outfile", $argv[2]);

$temp = $data->code;
if ($temp->ver != v2_ver){
    die("invaled config please change config url to a working one");
}

