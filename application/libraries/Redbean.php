<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Redbean
 *
 * ORM integration with redbean (http://www.redbeanphp.com/)
 *
 * @package		Codeigniter-Redbean
 * @author		valedaemon (https://github.com/valedaemon)
 * @version		1.0
 * @based on	        Redbean, written by Gabor de Mooij (http://www.redbeanphp.com/)
 * @license		Follows Redbean's license of New BSD (http://www.redbeanphp.com/manual/license)
 */

require_once(APPPATH.'vendors/redbean/rb.php');

class Redbean
{
        function __construct()
        {
                $this->ci =& get_instance();
                $this->ci->load->config('redbean');
                
                if (ENVIRONMENT == "production") {
                        $frozen = TRUE;
                } else {
                        $frozen = FALSE;
                }
                $this->_setup($this->ci->config->item('rb_driver'), $this->ci->config->item('rb_path'),
                                       $this->ci->config->item('rb_host'), $this->ci->config->item('rb_dbname'),
                                       $this->ci->config->item('rb_user'), $this->ci->config->item('rb_pass'));
                
                if ($this->ci->config->item('debug') && $this->ci->config->item('debug') == TRUE) {
                        R::debug(TRUE);
                }
                
                R::freeze($frozen);
                
        }
        
        /**
         * Class protected function to call R::setup
         *
         * @param string        driver
         * @param string        path to the sqlite DB
         * @param string        host
         * @param string        DB name
         * @param string        username
         * @param string        password
         */
        protected function _setup($driver, $path='', $host, $db, $user, $pass) {
                if ($driver == 'sqlite') {
                        if ($path == '') {
                                show_error('You have configured Redbean to use sqlite, but a path has not been set to the DB.');
                        }
                        $connectString = $driver.':'.$path.$db;
                } else {
                        $connectString = $driver.':host='.$host.';dbname='.$db;
                }
               R::setup($connectString, $user, $pass);
        }
}
