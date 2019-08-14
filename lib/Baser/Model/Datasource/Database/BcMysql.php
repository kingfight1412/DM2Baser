<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Model.Datasource.Database
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

App::uses('Mysql', 'Model/Datasource/Database');

/**
 * MySQL DBO拡張
 *
 * @package Baser.Model.Datasource.Database
 */
class BcMysql extends Mysql {
// COSTOMIZE ADD 2014/07/02 ryuring
// >>>
/**
 * テーブル名のリネームステートメントを生成
 *
 * @param string $sourceName
 * @param string $targetName
 * @return string
 */
	public function buildRenameTable($sourceName, $targetName) {
		return "ALTER TABLE `" . $sourceName . "` RENAME `" . $targetName . "`";
	}
// <<<
}
