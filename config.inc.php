<?php

//// RCMCardDAV Plugin Admin Settings

///////////////////////////////////////////////////////////////////////
////                                                               ////
////                                                               ////
//// SEE doc/ADMIN-SETTINGS.md FOR DOCUMENTATION ON THE PARAMETERS ////
////                                                               ////
////                                                               ////
///////////////////////////////////////////////////////////////////////


// Scheme for storing the CardDAV passwords, in order from least to best security.
// Options: plain, base64, des_key, encrypted (default)
// $prefs['_GLOBAL']['pwstore_scheme'] = 'encrypted';
$prefs['_GLOBAL']['pwstore_scheme']  = 'encrypted';

// Specify minimum loglevels for logging for the plugin and the HTTP client
// The following are possible: DEBUG, INFO, NOTICE, WARNING, ERROR, CRITICAL, ALERT, EMERGENCY
// Defaults to ERROR
$prefs['_GLOBAL']['loglevel']        = \Psr\Log\LogLevel::WARNING;
$prefs['_GLOBAL']['loglevel_http']   = \Psr\Log\LogLevel::ERROR;

// Disallow users to add custom addressbooks (default: false)
$prefs['_GLOBAL']['fixed']            = true;

// When enabled, this option hides the 'CardDAV' section inside Preferences.
$prefs['_GLOBAL']['hide_preferences'] = true;


// ***** Nextcloud CardDAV Connection *****
$prefs['nextcloud_user'] = [
    'accountname'          => 'Souvera',
    //'username'             => '%u',   // falls OIDC-Name != NC-Name, kann der User es im UI anpassen
    'password' => '%c',
    'discovery_url'        => 'https://%HOST%/remote.php/dav/',
    'preemptive_basic_auth'=> true,
    'ssl_noverify'         => false,

    // Defaults für entdeckte Bücher
    'name'                 => '%N',
    'active'               => true,
    'readonly'             => false,
    'refresh_time'         => '00:10:00',
    'rediscover_time'      => '01:00:00',
    'use_categories'       => true,
    'fixed'        =>  ['discovery_url', 'username', 'password', 'ssl_noverify', 'preemptive_basic_auth'],
];

//***** Override Roundcube special addressbooks ***** 
$prefs['_GLOBAL']['default_addressbook'] = [
    'preset'    => 'nextcloud_user',
    'matchurl' => '#/contacts/?$#',
];

$prefs['_GLOBAL']['collected_recipients'] = [
	'preset'    => 'nextcloud_user',
    'matchurl'  => '#/z-app-generated--contactsinteraction--recent/?$#',
];

$prefs['_GLOBAL']['collected_senders'] = [
    'preset'    => 'nextcloud_user',
    'matchurl'  => '#/z-app-generated--contactsinteraction--recent/?$#',
];

// vim: ts=4:sw=4:expandtab:fenc=utf8:ff=unix:tw=120:ft=php
