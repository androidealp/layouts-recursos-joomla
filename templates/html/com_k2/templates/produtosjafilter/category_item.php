<?php
/**
 * Aplicando categoria item com o filter configurado para yookit
 * @example url - desc
 * @author André Luiz Pereira <andre@next4.com.br>
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
	K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);
?>

<?php $imagem = empty($this->item->image)?'images/ckc/produtos/sem-imagem.jpg':$this->item->image ?>
<div class="uk-width-medium-1-3">
	<div class="bg_list_item_produto" style="background: rgba(0, 0, 0, 0)  url('<?=$imagem?>') no-repeat; background-size: contain; background-position: 0 10px">

		<figure class="uk-overlay uk-overlay-hover">

		    <img src="<?=$imagem?>" alt="this->item->title" class="opaciti-image" />
					<?php if($this->item->params->get('catItemIntroText')): ?>
						<a href="<?php echo $this->item->link; ?>" >
						<figcaption class="uk-overlay-panel uk-overlay-hover uk-flex uk-flex-center uk-flex-middle uk-text-center">
							<?php echo $this->item->introtext; ?>
						</figcaption>
						</a>
					<?php endif; ?>
		</figure>
	</div>
</div>
