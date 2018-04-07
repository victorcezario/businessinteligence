<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'BI';
$query_builder = TRUE;

$db['BI'] = array(
	'dsn'	=> 'mysql:host=localhost;dbname=bi',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'bi',
	'dbdriver' => 'pdo',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['SETA'] = array(
	'dsn'	=> 'pgsql:host=192.168.0.248;dbname=seta',
	'hostname' => '192.168.0.248',
	'username' => 'bi',
	'password' => 'Moc@3025@$',
	'database' => 'seta',
	'dbdriver' => 'pdo',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
$db['BI_VIEW'] = array(
    'dsn'	=> 'pgsql:host=localhost;dbname=bi_view',
    'hostname' => 'localhost',
    'username' => 'postgres',
    'password' => '51330757',
    'database' => 'bi_view',
    'dbdriver' => 'pdo',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);