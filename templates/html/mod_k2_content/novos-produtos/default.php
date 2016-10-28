<?php
/**
 * Outro metodo para aplicar o conteúdo principalmente na home
 * @example url - desc
 * @author André Luiz Pereira <andre@next4.com.br>
 */

// no direct access
defined('_JEXEC') or die;
$title = "";
$subtitle = "";
$paramTitle = $params->get('itemPreText');
if(!empty($paramTitle))
{
	$gettitlesub = explode('||',$paramTitle);
	$title = $gettitlesub[0];
	$subtitle = $gettitlesub[1];
}


?>


<div class="uk-block fundofaixa" data-uk-parallax="{bg: '-500'}">
	<div class=" tm-container uk-container-center tm-horizontal-padding">
		<h3 class="uk-panel-title uk-text-center"><?=$title?></h3>
		<div class="uk-text-center text-white uk-margin">
			<?=$subtitle?>
		</div>
		<!-- uk-width-1-1 uk-row-first -->
		<!--  -->
		<!-- data-uk-grid="{gutter: ' 20'}" -->
		<div id="novos-produtos"
		data-uk-scrollspy="{cls:'uk-animation-slide-left', repeat: true,target:'.box-prod',delay:600}"
		class="uk-grid-width-1-1 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-3 uk-grid uk-grid-match uk-text-left uk-margin-large-bottom "
		data-uk-grid-match="{target:'> div > .uk-panel', row:true}" data-uk-grid-margin=""
		>

			<?php foreach ($items as $key=>$item):
				$extra_fields = '';
				if(isset($item->extra_fields))
				{

					foreach ($item->extra_fields as $k => $field) {
						if($field->alias == 'image_destaque')
						{
							$extra_fields = $field->value;
						}
					}

				}


					?>
				<!--  data-grid-prepared="true" -->
			<div class="box-prod" >
				<div class="uk-panel painel-white">
					<?php if($extra_fields): ?>
						<div class="uk-text-center uk-panel-teaser">
							<div class="uk-overlay uk-overlay-hover ">
								<?=str_replace('<img','<img class="uk-overlay-scale" ',$extra_fields);  ?>
								<div class="uk-overlay-panel uk-overlay-background uk-overlay-icon uk-overlay-fade"></div>
								<a class="uk-position-cover" href="<?php echo $item->link; ?>"></a>
							</div>
						</div>
					<?php endif; ?>

					<?php if($params->get('itemIntroText')): ?>

						<div class="padding-horizontal">
							<h3 class="uk-panel-title black"><?=$item->title;?></h3>
							<?php echo $item->introtext; ?>
							<?php if($params->get('itemReadMore') && $item->fulltext): ?>
								<div>

									<p><a class="red_text with-icon" href="#">
                <i class="uk-icon-arrow-circle-o-right uk-icon-small"></i>
                <?php echo JText::_('VISITE_A_PAGINA_DO_PRODUTO'); ?></a></p>

							</div>
							<?php endif; ?>
						</div>


					<?php endif; ?>


				</div>
			</div>
			<?php endforeach; ?>


		</div>
		<!-- lista dos produtos -->

<div class="uk-grid ">
	<div class="uk-width-1-1">
		<a href="index.php?option=com_k2&view=itemlist&layout=category&task=category&id=2&Itemid=258" class="uk-button uk-button-white uk-margin-large-top"> <?php echo JText::_('CONFIRA_TODOS_OS_PRODUTOS'); ?></a>
	</div>
</div>


		<!-- end module -->
		<!-- fim conteudo produto -->
	</div>
</div>
