<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Controller
 * @since			baserCMS v 4.0.0
 * @license			http://basercms.net/license/index.html
 */

App::uses('BcContentsController', 'Controller');

/**
 * リンク コントローラー
 *
 * @package Baser.Controller
 */
class ContentLinksController extends AppController {

/**
 * コンポーネント
 * @var array
 *
 * @deprecated useViewCache 5.0.0 since 4.0.0
 * 	CakePHP3では、ビューキャッシュは廃止となる為、別の方法に移行する
 */
	public $components = ['Cookie', 'BcAuth', 'BcAuthConfigure', 'BcContents' => ['useForm' => true, 'useViewCache' => true]];

/**
 * Before Filter
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->BcAuth->allow('view');
	}

/**
 * コンテンツを登録する
 *
 * @return void
 */
	public function admin_add() {
		if(!$this->request->data) {
			$this->ajaxError(500, __d('baser', '無効な処理です。'));
		}
		$data = $this->ContentLink->save($this->request->data);
		if ($data) {
			$this->setMessage(sprintf(__d('baser', 'リンク「%s」を追加しました。'), $this->request->data['Content']['title']), false, true, false);
			echo json_encode($data['Content']);
		} else {
			$this->ajaxError(500, __d('baser', '保存中にエラーが発生しました。'));
		}
		exit();
	}

/**
 * コンテンツを更新する
 *
 * @return void
 */
	public function admin_edit($entityId) {
		$this->pageTitle = __d('baser', 'リンク編集');
		if(!$this->request->data) {
			$this->request->data = $this->ContentLink->read(null, $entityId);
			if(!$this->request->data) {
				$this->setMessage(__d('baser', '無効な処理です。'), true);
				$this->redirect(['plugin' => false, 'admin' => true, 'controller' => 'contents', 'action' => 'index']);
			}
		} else {
			if ($this->ContentLink->save($this->request->data)) {
				clearViewCache();
				$this->setMessage(sprintf(__d('baser', 'リンク「%s」を更新しました。'), $this->request->data['Content']['title']), false, true);
				$this->redirect([
					'plugin' => '',
					'controller' => 'content_links',
					'action' => 'edit',
					$entityId
				]);
			} else {
				$this->setMessage(__d('baser', '保存中にエラーが発生しました。入力内容を確認してください。'), true, true);
			}
		}
		$site = BcSite::findById($this->request->data['Content']['site_id']);
		$this->set('publishLink', $this->Content->getUrl($this->request->data['Content']['url'], true, $site->useSubDomain));
	}

/**
 * コンテンツを削除する
 *
 * @param $entityId
 */
	public function admin_delete() {
		if(empty($this->request->data['entityId'])) {
			return false;
		}
		if($this->ContentLink->delete($this->request->data['entityId'])) {
			return true;
		}
		return false;
	}

/**
 * コンテンツを表示する
 *
 * @param $entityId
 * @return void
 */
	public function view() {
		$data = $this->ContentLink->find('first', ['conditions' => ['ContentLink.id' => $this->request->params['entityId']]]);
		$this->set(compact('data'));
	}

}