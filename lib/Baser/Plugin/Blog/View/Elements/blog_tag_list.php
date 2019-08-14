<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 4.0.5
 * @license			http://basercms.net/license/index.html
 */

/**
 * @var \BcAppView $this
 * @var int $blogContentId
 */
?>


<?php if(!empty($tags)): ?> 
<ul class="bc-blog-tags">
    <?php foreach($tags as $tag): ?> 
        <li>
        	<?php $this->Blog->tagLink($blogContentId, $tag) ?>
        	<?php if($postCount): ?>
        		(<?php echo $tag['BlogTag']['post_count'] ?>)
        	<?php endif ?>
        </li>
	<?php endforeach ?> 
</ul>
<?php endif ?>