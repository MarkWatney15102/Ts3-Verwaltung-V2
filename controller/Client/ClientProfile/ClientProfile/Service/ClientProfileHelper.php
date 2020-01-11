<?php 

class ClientProfileHelper
{
    public function removeAllServerGroups($client, $serverGroups, $clientServerGroups)
    {
        foreach ($serverGroups as $gid => $gname) {
            if ($gid != DEFAULT_SERVER_GROUP) {
                if (in_array($gid, array_keys($clientServerGroups))) {
                    $client->remServerGroup($gid);
                }
            }
        }
    }    
}
