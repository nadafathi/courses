<?php

export MJ_APIKEY_PUBLIC='	b08aec27a877ce586e846029ccbf91da'
export MJ_APIKEY_PRIVATE='ae8c68df372711d24e1a7bf3914d3bef'



use \Mailjet\Resources;

// getenv will allow us to get the MJ_APIKEY_PUBLIC/PRIVATE variables we created before
$apikey = getenv('MJ_APIKEY_PUBLIC');
$apisecret = getenv('MJ_APIKEY_PRIVATE');

// or

$apikey = 'b08aec27a877ce586e846029ccbf91da';
$apisecret = 'ae8c68df372711d24e1a7bf3914d3bef';

$mj = new \Mailjet\Client($apikey, $apisecret);
?>
