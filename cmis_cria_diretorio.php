<?php

require_once ('cmis_repository_wrapper.php');
require_once ('cmis_service.php');
$repo_url = "http://localhost:8080/alfresco/api/-default-/public/cmis/versions/1.1/atom";
$repo_username = "admin";
$repo_password = "sejalivre";
$repo_folder = "/Sites/cloudecm/documentLibrary";
$repo_new_folder = "CloudECM";
$repo_debug = 1;

$client = new CMISService($repo_url, $repo_username, $repo_password);

if ($repo_debug)
{
    //print "Repository Information:\n===========================================\n";
    // print_r($client->workspace);
    //print "\n===========================================\n\n";
}

$myfolder = $client->getObjectByPath($repo_folder);
if ($repo_debug)
{
    //print "Folder Object:\n===========================================\n";
    // print_r($myfolder);
    //print "\n===========================================\n\n";
}

$objs = $client->createFolder($myfolder->id, $repo_new_folder);
if ($repo_debug)
{
    //print "Return From Create Folder\n:\n===========================================\n";
    //print_r($objs);
    //print "\n===========================================\n\n";
}

$objs = $client->getChildren($myfolder->id);
if ($repo_debug)
{
    //print "Folder Children Objects\n:\n===========================================\n";
    //print_r($objs);
    //print "\n===========================================\n\n";
}

foreach ($objs->objectList as $obj)
{
    if ($obj->properties['cmis:baseTypeId'] == "cmis:document")
    {
        print "Document: " . $obj->properties['cmis:name'] . "\n";
    }
    elseif ($obj->properties['cmis:baseTypeId'] == "cmis:folder")
    {
        print "Folder: " . $obj->properties['cmis:name'] . "\n";
    } else
    {
        print "Unknown Object Type: " . $obj->properties['cmis:name'] . "\n";
    }
}









