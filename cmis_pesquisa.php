<?php

require_once ('cmis_repository_wrapper.php');
require_once ('cmis_service.php');
$repo_url = "http://localhost:8080/alfresco/api/-default-/public/cmis/versions/1.1/atom";
$repo_username = "admin";
$repo_password = "sejalivre";
$repo_debug = 1;

$client = new CMISService($repo_url, $repo_username, $repo_password);

$objs = $client->query("select * from cmis:folder WHERE cmis:name like '%Cloud%' ");
if ($repo_debug)
{
    //print "Returned Objects\n:\n===========================================\n";
    //print_r($objs);
    //print "\n===========================================\n\n";
}

$objs = $client->query("select * from cmis:document WHERE cmis:name like '%extFileDe%'");
if ($repo_debug)
{
    //print "Returned Objects\n:\n===========================================\n";
    //print_r($objs);
    //print "\n===========================================\n\n";
}

foreach ($objs->objectList as $obj)
{
 
     //print_r();
     
    //if ($obj->properties['cmis:baseTypeId'] == "cmis:document")
   // {
    //  print "testeA";  
     // $teste = $client->getContentStream($obj->id);
     //   print  "Conteudo = " $teste;
   // }
}











