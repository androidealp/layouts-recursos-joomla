<?php
/**
 * Aplicando categoria item com o filter configurado para yookit
 *********** OBS NÃO REMOVER O ID k2Container O FILTER NÃO ROLA *********************
 * @example url - desc
 * @author André Luiz Pereira <andre@next4.com.br>
 */

// no direct access
defined('_JEXEC') or die;
$descricao = '';
if($this->params->get('catDescription')):
	$descricao = explode('<hr id="system-readmore" />', $this->category->description);
endif;
?>
<?php if($this->params->get('catImage') && $this->category->image): ?>
<figure class="uk-overlay banner-category">
			<img alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo $this->category->image; ?>" />
			<?php if(isset($descricao[0]) && !empty($descricao[0])): ?>
					<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
						<div >
								<?=$descricao[0];?>
						</div>
					</figcaption>
			<?php endif; ?>
</figure>
<?php endif; ?>

<div class="uk-container uk-container-center tm-horizontal-padding">
	<?php if(isset($descricao[1]) && !empty($descricao[1])):?>
		<div class="border_red_bottom_10 uk-margin-large-bottom uk-margin-large-top">
			<?=$descricao[1]?>
		</div>
	<?php endif; ?>

	<div class="uk-grid">
			<div class="uk-width-medium-1-3">
				<?php echo JHtml::_('content.prepare', '{loadposition load-seletor}'); ?>
			</div>
			<div id="k2Container" class="uk-width-medium-2-3">

					<div class="uk-grid uk-grid-collapse">
								<?php
								$items = [];
								$items['leading'] = (isset($this->leading) && count($this->leading))?$this->leading:[];
								$items['primary'] = (isset($this->primary) && count($this->primary))?$this->primary:[];
								$items['secondary'] = (isset($this->secondary) && count($this->secondary))?$this->secondary:[];

								 ?>
									<?php foreach ($items['leading'] as $k => $item):?>

											<?php
												$this->item = $item;
												echo $this->loadTemplate('item');
											?>


									<?php endforeach; ?>

									<?php foreach ($items['primary'] as $k => $item):?>

												<?php
													$this->item = $item;
													echo $this->loadTemplate('item');
												?>

									<?php endforeach; ?>

									<?php foreach ($items['secondary'] as $k => $item):?>

											<?php
												$this->item = $item;
												echo $this->loadTemplate('item');
											?>

									<?php endforeach; ?>
						</div>
						<!-- end colapse -->
						<!-- Pagination -->
						<?php if($this->pagination->getPagesLinks()): ?>
						<div class="k2Pagination">
							<?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
							<div class="clr"></div>
							<?php if($this->params->get('catPaginationResults')) echo $this->pagination->getPagesCounter(); ?>
						</div>
						<?php endif; ?>


			</div>
	</div>

</div>



<!-- End K2 Category Layout -->
