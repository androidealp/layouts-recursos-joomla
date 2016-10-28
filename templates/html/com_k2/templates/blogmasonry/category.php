<?php
/**
 * Layout para blog usando ajax e masonry
 * usar js masonry no thema
 * @author André Luiz Pereira <andre@next4.com.br>
 */
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$document->addScript('templates/yoo_edge/js/masonry.min.js');

$items = [
'leading'=>(isset($this->leading) && count($this->leading))?$this->leading:[],
'primary'=>(isset($this->primary) && count($this->primary))?$this->primary:[],
'secondary'=>(isset($this->secondary) && count($this->secondary))?$this->secondary:[],
];

?>

<!-- Start K2 Category Layout -->
<div class="itemListView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

<!-- Inicio do banner da categoria -->
<?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
	<!-- Blocks for current category and subcategories -->
	<figure class="uk-overlay banner-category">

		<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->event->K2CategoryDisplay )): ?>

			<?php if($this->params->get('catImage') && $this->category->image): ?>
			<!-- Category image -->
			<img alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo $this->category->image; ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px; height:auto;" />
			<?php endif; ?>
			    <figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
			        <div>
						<?php if($this->params->get('catTitle')): ?>
						<!-- Category title -->
						<h1><?php echo $this->category->name; ?></h1>
						<?php endif; ?>

						<?php if($this->params->get('catDescription')): ?>
						<!-- Category description -->
						<div>
							<?php echo $this->category->description; ?>
							<!-- K2 Plugins: K2CategoryDisplay -->
							<?php echo $this->category->event->K2CategoryDisplay; ?>
						</div>
						<?php endif; ?>

			        </div>
			    </figcaption>
		<?php endif; ?>
	</figure>
<?php endif; ?>
</div>
<!-- Fim do banner da categoria -->

<!-- Item list -->
<div class="uk-container uk-container-center tm-horizontal-padding">
		<div class="uk-block uk-block-default ">
			<div class="box-mason" data-uk-grid="{gutter: 20}">
				<!-- <div data-uk-grid="{gutter: 20}"> -->
					<?php foreach ($items['leading'] as $k => $item): ?>
					<?php $this->item = $item;
						echo $this->loadTemplate('item');
					?>
					<?php endforeach; ?>
			<!-- lista principal -->
					<?php foreach ($items['primary'] as $k => $item): ?>
					<?php $this->item = $item;
						echo $this->loadTemplate('item');
					?>
				<?php endforeach; ?>
			<!-- lista primary -->
					<?php foreach ($items['secondary'] as $k => $item): ?>
					<?php $this->item = $item;
						echo $this->loadTemplate('item');
					?>
					<?php endforeach; ?>
				</div>
			<!-- lista secondary -->
		</div>
</div>




	<!-- Pagination -->
	<?php if($this->pagination->getPagesLinks()): ?>
	<div class="k2Pagination">
		<?php if($this->params->get('catPagination'))
			echo $this->pagination->getPagesLinks();
		?>

		<?php if($this->params->get('catPaginationResults'))
			echo $this->pagination->getPagesCounter();
		?>
	</div>
	<?php endif; ?>


<!-- End K2 Category Layout -->
