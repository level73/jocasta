<?php
	/** Application Name & Key **/
	define( 'APPNAME',  'Jocasta');
	define( 'APPKEY',   'Hdsjf9w456ç%sd$1.5');  // should be a random string

	/** Secret! **/
	define( 'SECRET',   strrev(md5(APPKEY)));

	/** System status - influences error reporting
    * Constant can be development | production
    **/
	define('SYSTEM_STATUS', 'development');
  define('DEBUG', true);

	/** Database connection params **/
  define('DBTYPE', 'mysql');
  define('DBUSER', 'padawan');
  define('DBPASS', 'maythe4bewu');
  define('DBNAME', 'jocasta');
  define('DBHOST', 'localhost');

	/** session keys **/
	define('SESSIONKEY',  md5(APPKEY));
	define('SESSIONNAME', md5(APPKEY . SESSIONKEY));
	define('SESSIONSALT', strrev(SESSIONKEY));

	/** Application email account **/
	define('APPEMAIL', 'up@level73.it');
	/** Application base URL **/
	define('APPURL', 'http://jocasta.yvn');
