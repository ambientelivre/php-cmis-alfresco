<?php

require_once ('cmis_repository_wrapper.php');
require_once ('cmis_service.php');
$repo_url = "http://localhost:8080/alfresco/api/-default-/public/cmis/versions/1.1/atom";
$repo_username = "admin";
$repo_password = "sejalivre";
$repo_folder = "/CloudECM";
$repo_new_file = "alunos.txt";
$repo_debug = 1;

$client = new CMISService($repo_url, $repo_username, $repo_password);

$myfolder = $client->getObjectByPath($repo_folder);

$obs = $client->createDocument($myfolder->id, $repo_new_file, array (), "THIS IS A NEW DOCUMENT", "text/plain");




