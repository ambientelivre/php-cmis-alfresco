<?php
# Licensed to the Apache Software Foundation (ASF) under one
# or more contributor license agreements.  See the NOTICE file
# distributed with this work for additional information
# regarding copyright ownership.  The ASF licenses this file
# to you under the Apache License, Version 2.0 (the
# "License"); you may not use this file except in compliance
# with the License.  You may obtain a copy of the License at
# 
# http://www.apache.org/licenses/LICENSE-2.0
# 
# Unless required by applicable law or agreed to in writing,
# software distributed under the License is distributed on an
# "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
# KIND, either express or implied.  See the License for the
# specific language governing permissions and limitations
# under the License.


require_once ('cmis_repository_wrapper.php');
require_once ('cmis_service.php');
$repo_url = "http://localhost:8080/alfresco/api/-default-/public/cmis/versions/1.1/atom";
$repo_username = "admin";
$repo_password = "sejalivre";
$repo_object_id = "workspace://SpacesStore/8e6895ab-d2e3-433a-81f5-e5341fd0b0d9";
$repo_property_id = "cmis:description";
$repo_property_values = "aluno_renomeado.txt";
$repo_debug = 1;

$client = new CMISService($repo_url, $repo_username, $repo_password);

if ($repo_debug)
{
    print "Repository Information:\n===========================================\n";
    print_r($client->workspace);
    print "\n===========================================\n\n";
}

$myobject = $client->getObject($repo_object_id);
if ($repo_debug)
{
    print "My Object:\n===========================================\n";
    print_r($myobject);
    print "\n===========================================\n\n";
}
$mypropmap = array( $repo_property_id => explode(",",$repo_property_values));
$myobject = $client->updateProperties($myobject->id,$mypropmap);


if ($repo_debug)
{
    print "Updated Object\n:\n===========================================\n";
    print_r($myobject);
    print "\n===========================================\n\n";
}

if ($repo_debug > 2)
{
    print "Final State of CLient:\n===========================================\n";
    print_r($client);
}
