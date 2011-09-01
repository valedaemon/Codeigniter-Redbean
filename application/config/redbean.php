<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        /**
         * @var string   accepts mysql, pgsql, or sqlite
         */
        $config['rb_driver']    = 'mysql';

        /**
         * @var string    complete path + filename of where to find a sqlite DB.
         */
        $config['db_path'] = '';

        /**
         * @var string   the DB host
         */
        $config['rb_host'] = 'localhost';

        /**
         * @var string   DB name
         */
        $config['rb_dbname'] = 'sampleDB';

        /**
         * @var string   the DB username
         */
        $config['rb_user'] = 'sampleuser';

        /**
         * @var string   the DB user password
         */
        $config['rb_pass'] = 'samplepass';

        /**
         * @var string   Setting debug to TRUE will output the generated SQL statements
         */
        $config['rb_debug']   = FALSE;
