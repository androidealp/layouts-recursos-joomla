<?php
/**
 * Layout para blog usando ajax e masonry
 * usar js masonry no thema
 * @author André Luiz Pereira <andre@next4.com.br>
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
 K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->
<div id="box-id<?=$this->item->id?>" class="uk-width-medium-3-10 uk-width-small-1-1">

  <div class="box-conteudo blog-ajuste">

    <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
    <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />

  	<?php endif; ?>
    <div class="padding-all-small">
          <h3><?php echo $this->item->title; ?></h3>
          <?php if($this->item->params->get('catItemIntroText')): ?>
          <!-- Item introtext -->
            <?php echo $this->item->introtext; ?>
            <?php if ($this->item->params->get('catItemReadMore')): ?>
              <a data-boxid = "#box-id<?=$this->item->id?>" class="uk-button uk-button-medium uk-button-primary item-masory" href="<?php echo $this->item->link; ?>">
                <?php echo JText::_('K2_READ_MORE'); ?>
              </a>
            <?php endif; ?>

          <?php endif; ?>
      </div>
  </div>

</div>
