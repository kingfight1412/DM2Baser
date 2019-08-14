<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Model
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * DBログモデル
 *
 * @package Baser.Model
 */
class Dblog extends AppModel {

/**
 * クラス名
 *
 * @var string
 */
	public $name = 'Dblog';

/**
 * ビヘイビア
 * 
 * @var array
 */
	public $actsAs = ['BcCache'];

/**
 * belongsTo
 * 
 * @var array
 */
	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id'
	]];

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = [
			'name' => [
				['rule' => ['notBlank'],
					'message' => __d('baser', 'ログ内容を入力してください。'),
					'required' => true]
			]
		];
	}

}
