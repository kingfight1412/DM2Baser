<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
?>


<?php
$this->BcBaser->i18nScript([
	'message1' => __d('baser', 'プラグインをアップロードし、そのままインストールします。よろしいですか？'),
]);
?>

<script>
$(function(){
	$("#BtnSave").click(function(){
		if(confirm(bcI18n.message1)) {
			$.bcUtil.showLoader();
			return true;
		}
		return false;
	});
});
</script>


<p><?php echo __d('baser', 'ZIP 形式のプラグインファイルをお持ちの場合、こちらからアップロードしてインストールできます。')?></p>
<?php echo $this->BcForm->create('Plugin', ['type' => 'file']) ?>

<div class="submit">
	<?php echo $this->BcForm->file('Plugin.file', ['type' => 'file']) ?>
	<?php echo $this->BcForm->submit(__d('baser', 'インストール'), ['class' => 'button', 'div' => false, 'id' => 'BtnSave']) ?>
</div>
			
<?php echo $this->BcForm->end() ?>
