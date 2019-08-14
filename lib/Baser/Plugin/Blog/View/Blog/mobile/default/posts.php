<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [MOBILE] タイトル一覧
 */
?>


<?php if (!empty($posts)): ?>
	<?php foreach ($posts as $key => $post): ?>
		<span style="color:#8ABE08">■</span>&nbsp;<?php $this->Blog->postDate($post, 'y.m.d') ?><br />
		<?php $this->Blog->postTitle($post) ?>
		<hr size="1" style="width:100%;height:1px;margin:5px 0;padding:0;color:#CCCCCC;background:#CCCCCC;border:1px solid #CCCCCC;" />
	<?php endforeach; ?>
<?php else: ?>
	<p style="text-align:center">ー</p>
<?php endif; ?>