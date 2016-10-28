<?php

/**
 * Customizacao do seletor do jak2filter-form
 * uso de ferramentas para fazer replace
 *estilizacao vertical e correcao de script
 * @example url - desc
 * @author André Luiz Pereira <andre@next4.com.br>
 */

$i = 0;
$j = 0;
foreach ($glist['items'] as $key => $exfield):
	$magicSelect = '';
	$fieldTypes = explode("_",$key);
	if($fieldTypes[0] == 'magicSelect'){
		$magicSelect = ' class="magic-select"';
	}
	$last = ($i == count($list)-1)?'class="li-last"':'';
	$i++;
	$style = '';
	if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
		$clear = " clear:both;";
	}
	if($ja_column || $clear){
		$style ='style="'.$ja_column.$clear.'"';
	}
	$j++;

	?>


		<?php $exfield = $Ferramentas->TratarFields($exfield); ?>
		<h3 class="uk-accordion-title"><i class="uk-icon-arrow-circle-o-down uk-icon-small"></i> <?php echo $exfield['label']; ?></h3>
		<div class="uk-accordion-content uk-form">
			<ul class="seletor-fieldslist">
				<?php echo $exfield['checkbox']; ?>
			</ul>

		</div>


	<?php
	$clear = '';
endforeach;
?>
