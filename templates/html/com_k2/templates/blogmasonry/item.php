<?php
/**
 * Layout para blog usando ajax e masonry
 * usar js masonry no thema
 * OBS USEI EXIT NO FINAL PARA RODAR O AJAX SEM CARREGAR O TEMA
 * @author André Luiz Pereira <andre@next4.com.br>
 */

// no direct access
defined('_JEXEC') or die;

?>
<div class="content-box">



	<?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
			<!-- Item Image -->
			<div class="itemImageBlock">
				<span class="itemImage">
					<a href="#" class="uk-button uk-button-primary bt-close" data-closebox="#box-id<?=$this->item->id?>"><i class="uk-icon uk-icon-times"></i></a>
					<!-- <a data-k2-modal="image" href="<?php echo $this->item->imageXLarge; ?>" title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>"> -->
					<img src="<?php echo $this->item->image; ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
				</span>
			</div>
		<?php else: ?>
			<a href="#" class="uk-button uk-button-primary uk-float-right" data-closebox="#box-id<?=$this->item->id?>"><i class="uk-icon uk-icon-times"></i></a>
	<?php endif; ?>

	<h3>
		<?php echo $this->item->title; ?>
	</h3>

	<?php if(!empty($this->item->fulltext)): ?>

	<?php if($this->item->params->get('itemIntroText')): ?>
	<!-- Item introtext -->
	<div class="">
		<?php $intro = strip_tags($this->item->introtext); ?>
		<p>
			<strong><?=$intro;?></strong>
		</p>
	</div>
	<?php endif; ?>

	<?php if($this->item->params->get('itemFullText')): ?>
	<!-- Item fulltext -->
	<div class="itemFullText">
		<?php echo $this->item->fulltext; ?>
	</div>
	<?php endif; ?>

	<?php else: ?>

	<!-- Item text -->
	<div class="itemFullText">
		<?php echo $this->item->introtext; ?>
	</div>

	<?php endif; ?>

</div>

	<?php exit; ?>
