<?php

//// RCMCardDAV Plugin Admin Settings

///////////////////////////////////////////////////////////////////////
////                                                               ////
////                                                               ////
//// SEE doc/ADMIN-SETTINGS.md FOR DOCUMENTATION ON THE PARAMETERS ////
////                                                               ////
////                                                               ////
///////////////////////////////////////////////////////////////////////


//// ** GLOBAL SETTINGS

// Disallow users to add custom addressbooks (default: false)
// $prefs['_GLOBAL']['fixed'] = true;

// When enabled, this option hides the 'CardDAV' section inside Preferences.
// $prefs['_GLOBAL']['hide_preferences'] = true;

// Scheme for storing the CardDAV passwords, in order from least to best security.
// Options: plain, base64, des_key, encrypted (default)
// $prefs['_GLOBAL']['pwstore_scheme'] = 'encrypted';

// Specify minimum loglevels for logging for the plugin and the HTTP client
// The following are possible: DEBUG, INFO, NOTICE, WARNING, ERROR, CRITICAL, ALERT, EMERGENCY
// Defaults to ERROR
$prefs['_GLOBAL']['loglevel'] = \Psr\Log\LogLevel::WARNING;
$prefs['_GLOBAL']['loglevel_http'] = \Psr\Log\LogLevel::ERROR;

// --- Global ---
$prefs['_GLOBAL']['pwstore_scheme']  = 'encrypted';
$prefs['_GLOBAL']['loglevel']        = \Psr\Log\LogLevel::WARNING;
$prefs['_GLOBAL']['loglevel_http']   = \Psr\Log\LogLevel::ERROR;

// UI offen lassen, damit die User ihr Nextcloud-App-Passwort eintragen können
$prefs['_GLOBAL']['fixed']            = true;
$prefs['_GLOBAL']['hide_preferences'] = true;

// --- Persönliche Nextcloud-Kontakte (pro User, ohne Passwort -> User trägt App-Token ein) ---
$prefs['nextcloud_user'] = [
    'accountname'          => 'Souvera',
    //'username'             => '%u',   // falls OIDC-Name != NC-Name, kann der User es im UI anpassen
    'password' => '%c',
    'discovery_url'        => 'https://%HOST%/remote.php/dav/',
    'rediscover_time'      => '24:00:00',
    'preemptive_basic_auth'=> true,
    'ssl_noverify'         => false,

    // Defaults für entdeckte Bücher
    'name'                 => '%a: %N',
    'active'               => true,
    'readonly'             => false,
    'refresh_time'         => '01:00:00',
    'use_categories'       => true,
    'fixed'        =>  ['discovery_url', 'username', 'password', 'ssl_noverify', 'preemptive_basic_auth'],
];

// --- Mappings: Roundcube-Rollen -> konkrete Bücher beim jeweiligen Nutzer ---
// Persönliches Standard-Adressbuch -> .../users/%u/kontakte/
$prefs['_GLOBAL']['default_addressbook'] = [
    'preset'    => 'nextcloud_user',
    'matchurl' => '#https://%HOST%/remote.php/addressbooks/users/%u/contacts#',
    // alternativ/zusätzlich möglich:
//    'matchname' => '/^Souvera: Contacts$/i',
];



// Gesammelte Empfänger -> .../users/%u/z-app-generated--contactsinteraction--recent/
$prefs['_GLOBAL']['collected_recipients'] = [
    'preset'    => 'nextcloud_user',
    'matchurl'  => '#https://%HOST%/remote.php/dav/addressbooks/users/%u/z-app-generated--contactsinteraction--recent/#',
];

$prefs['_GLOBAL']['collected_senders'] = [
    'preset'    => 'nextcloud_user',
    'matchurl'  => '#https://%HOST%/remote.php/dav/addressbooks/users/%u/z-app-generated--contactsinteraction--recent/#',
];


// vim: ts=4:sw=4:expandtab:fenc=utf8:ff=unix:tw=120:ft=php
