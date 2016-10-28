<?php
/**
 * Formas de aplicar layout neste content usando uk-grid
 * @example url - desc
 * @author André Luiz Pereira <andre@next4.com.br>
 */

// no direct access
defined('_JEXEC') or die; ?>

<div class="uk-grid uk-grid-match box-noticias" data-uk-grid-match="{target:'.uk-panel'}" data-uk-scrollspy="{cls:'uk-animation-slide-left', repeat: true,target:'.uk-width-medium-1-3',delay:600}">
		<?php foreach ($items as $key=>$item):	?>
		<div class="uk-width-medium-1-3">
			<div class="uk-panel uk-panel-box">
					<div class="noticia-title">
						<?php if($params->get('itemTitle')): ?>
			      <h3><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h3>
			      <?php endif; ?>
					</div>
						<?php if($params->get('itemIntroText')): ?>
							<p>
								<?php echo strip_tags($item->introtext); ?>
								<?php if($params->get('itemReadMore') && $item->fulltext): ?>
									<a class="moduleItemReadMore" href="<?php echo $item->link; ?>">
										<?php echo JText::_('COM_CONTENT_FEED_READMORE'); ?>
									</a>
								<?php endif; ?>
							</p>
						<?php endif; ?>

			</div>
		</div>
		<?php endforeach; ?>
		<!-- uk-width-medium-1-3 -->
</div>
<!-- grid -->
