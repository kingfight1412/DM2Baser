<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Console.Command
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

App::uses('Shell', 'Console');

/**
 * baserCMSシェル
 * 
 * [cakeにパスが通っている場合]
 * cake -app /absolute/path/to/myapp bc_manager install
 * 
 * [cakeにパスが通っていない場合]
 * /absolute/path/to/cake/console/cake -app /absolute/path/to/myapp bc_manager install
 * 
 * [phpにパスが通っていない場合]
 * /absolute/path/to/php /absolute/path/to/cake/console/cake.php -app /absolute/path/to/myapp bc_manager install
 * 
 * @package Baser.Console.Command
 */
class BcAppShell extends Shell {

/**
 * startup
 */
	public function startup() {
		$this->clear();
		$this->out("<info>Welcome to baserCMS v" . getVersion() . " Console</info>");
		$this->hr();
		$this->out('App : ' . APP_DIR);
		$this->out('Path: ' . APP);
		$this->hr();
	}

}
