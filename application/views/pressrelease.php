<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="page-title" class="jumbotron-page-title pt-3">
	<div class="container">
		<div class="page-title-title">
			<h1 class="text-white">
			<?php //echo ($article['article_id']) ? 'Edit Press Release' : 'Submit Press Release'; ?>
			</h1>
		</div>
		<!--<div class="page-title-excerpt lead text-white-50">
			Your almost there. Just enter your press release and you are on your way to
			<br> becoming an official Contributing Writer!
		</div>-->
		<?php if($article['article_id']){?>
		<!--<nav class="breadcrumb mb-0">
			<a class="breadcrumb-item" href="<?php //echo site_url('/secure/content') ?>">Content</a>
			<a class="breadcrumb-item" href="<?php //echo site_url('/secure/articleslist') ?>">Articles</a>
			<a class="breadcrumb-item" href="<?php //echo site_url('/secure/articleslist') ?>">Press Release</a>
			<span class="breadcrumb-item active font-italic"><?php //echo $article['article_title']?></span>
		</nav>-->
		<?php }?>
	</div>
</div>
