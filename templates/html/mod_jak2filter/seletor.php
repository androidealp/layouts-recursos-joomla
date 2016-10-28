<?php
/**
 * Customizacao do seletor do jak2filter-form
 * uso de ferramentas para fazer replace
 *estilizacao vertical e correcao de script
 * @example url - desc
 * @author André Luiz Pereira <andre@next4.com.br>
 */

// No direct access.
defined('_JEXEC') or die;

JLoader::register('Ferramentas', JPATH_LIBRARIES . '/Ferramentas.php');

$Ferramentas = new Ferramentas;

JHtml::_('behavior.tooltip', '.ja-k2filter-tip', array('hideDelay' => 1500, 'fixed' => true, 'className' => 'jak2-tooltip'));
$formid      = 'jak2filter-form-' . $module->id;
$itemid      = $params->get('set_itemid', 0) ? $params->get('set_itemid', 0) : JRequest::getInt('Itemid');
$ajax_filter = $params->get('ajax_filter', 0);
$share_url   = $params->get('share_url_of_results_page', 0);
?>

<form id="<?php echo $formid; ?>" name="<?php echo $formid; ?>" method="POST" action="<?php echo JRoute::_('index.php?option=com_jak2filter&view=itemlist&Itemid=' . $itemid); ?>">
    <input type="hidden" name="task" value="search"/>
    <input type="hidden" name="issearch" value="1"/>
    <input type="hidden" name="swr" value="<?php echo $slider_whole_range; ?>"/>
    <?php if (!empty($theme)): ?>
        <input type="hidden" name="theme" value="<?php echo $theme ?>"/>
    <?php endif; ?>
    <?php if ($catMode): ?>
        <!-- include sub category -->
        <input type="hidden" name="isc" value="1"/>
    <?php endif; ?>
    <?php if (!$params->get('display_ordering_box', 1) && $params->get('catOrdering') != "inherit"): ?>
        <input type="hidden" id="ordering" name="ordering" value="<?php echo $params->get('catOrdering'); ?>"/>
    <?php endif; ?>

    <div id="jak2filter<?php echo $module->id; ?>" class="uk-accordion layout-seletor" data-uk-accordion="{collapse:false}">
        <?php foreach ($list as $glist): ?>
            <?php $groupid = $glist['groupid']; ?>
            <?php require JModuleHelper::getLayoutPath('mod_jak2filter', 'seletor_extrafields'); ?>
        <?php endforeach; ?>
    </div>
    <input class="uk-button uk-button-primary" type="button" name="btnReset" value="<?php echo JText::_('RESET'); ?>" onclick="jaK2Reset('<?php echo $module->id; ?>', '<?php echo $formid; ?>', true);"/>

    <?php if ($params->get('ajax_filter', 0) == 1): ?>
        <input type="hidden" name="tmpl" value="component"/>
    <?php endif; ?>
</form>

<script type="text/javascript">
    /*<![CDATA[*/

    //validate date function
    function isDate(txtDate) {
        var reg = /^(\d{4})([\/-])(\d{1,2})\2(\d{1,2})$/;
        return reg.test(txtDate);
    }

    //validate startdate and enddate before submit form
    function validateDateRange(obj) {
        if (obj.id == 'sdate_<?php echo $module->id; ?>' || obj.id == 'edate_<?php echo $module->id; ?>') {
            var sDate = jQuery('#jak2filter<?php echo $module->id;?>').getElement('#sdate_<?php echo $module->id; ?>').get('value');
            var eDate = jQuery('#jak2filter<?php echo $module->id;?>').getElement('#edate_<?php echo $module->id; ?>').get('value');
            if (sDate != '' && eDate != '') {
                if (isDate(sDate) && isDate(eDate)) {
                    obj.removeClass('date-error');
                    jQuery('#<?php echo $formid; ?>').fireEvent('submit');
                }
                else {
                    obj.addClass('date-error');
                }
            }
        }
        else {
            jQuery('#<?php echo $formid; ?>').fireEvent('submit');
        }
    }

    // multi ordering and sortable order.
    jQuery(document).ready(function () {
        if (jQuery('.fsname').length) {
            jQuery('.fsname').each(function () {
                jQuery(this).text(jQuery('#jak2filter<?php echo $module->id;?>').find('option[value=' + jQuery(this).text() + ']').text());
            });
        }
    });

    window.addEvent('load', function () {
        // if (jQuery('#jak2filter<?php echo $module->id;?>').getElement('#category_id')) {
        //     jak2DisplayExtraFields(<?php echo $module->id;?>, jQuery('#jak2filter<?php echo $module->id;?>').getElement('#category_id'), <?php echo $selected_group; ?>);
        // }

        <?php if($auto_filter): ?>
        var f = jQuery('#<?php echo $formid; ?>');
        var parents = jQuery('#<?php echo $formid; ?> input');


        parents.each(function(i,el) {
            el.addEvent('change', function () {
                if (this.id == 'sdate_<?php echo $module->id; ?>' || this.id == 'edate_<?php echo $module->id; ?>') {
                    var sDate = jQuery('#jak2filter<?php echo $module->id;?>').getElement('#sdate_<?php echo $module->id; ?>').get('value');
                    var eDate = jQuery('#jak2filter<?php echo $module->id;?>').getElement('#edate_<?php echo $module->id; ?>').get('value');
                    if (sDate != '' && eDate != '') {
                        if (isDate(sDate) && isDate(eDate)) {
                            this.removeClass('date-error');
                            jQuery('#<?php echo $formid; ?>').submit();
                        }
                        else {
                            this.addClass('date-error');
                        }
                    }
                }
                else {
                    jQuery('#<?php echo $formid; ?>').submit();
                }

            });
        });
        // f.getElements('select').each(function (el) {
        //     el.addEvent('change', function () {
        //         if (this.id == 'dtrange' && this.value == 'range') {
        //             var sDate = jQuery('#jak2filter<?php echo $module->id;?>').getElement('#sdate_<?php echo $module->id; ?>');
        //             var eDate = jQuery('#jak2filter<?php echo $module->id;?>').getElement('#edate_<?php echo $module->id; ?>');
        //             if (sDate.get('value') != '' && eDate.get('value') != '') {
        //                 var isStartDate = isDate(sDate.get('value'));
        //                 var isEndDate = isDate(eDate.get('value'));
        //                 if (isStartDate && isEndDate) {
        //                     jQuery('#<?php echo $formid; ?>').fireEvent('submit');
        //                 }
        //                 else {
        //                     if (!isStartDate)
        //                         sDate.addClass('date-error');
        //                     if (!isEndDate)
        //                         eDate.addClass('date-error');
        //                 }
        //             }
        //         }
        //         else {
        //             jQuery('#<?php echo $formid; ?>').fireEvent('submit');
        //         }
        //     });
        // });
        // f.getElements('textarea').each(function (el) {
        //     el.addEvent('change', function () {
        //         jQuery('#<?php echo $formid; ?>').fireEvent('submit');
        //     });
        // });
        <?php endif; ?>

        <?php if($ajax_filter): ?>
        jQuery('#<?php echo $formid; ?>').submit(function () {
            jak2AjaxSubmit(this, '<?php echo JURI::root(true).'/'; ?>');
            <?php if($share_url): ?>
            jak2GetUrlSharing(this);
            <?php endif; ?>
            return false;
        });
        jQuery('#<?php echo $formid; ?>').on('submit', function (event) {
            event.preventDefault();
            jak2AjaxSubmit(this, '<?php echo JURI::root(true).'/'; ?>');
            <?php if($share_url): ?>
            jak2GetUrlSharing(this);
            <?php endif; ?>
        });
        if (jQuery('#k2Container')) {
            jak2AjaxPagination(jQuery('#k2Container'), '<?php echo JURI::root(true).'/'; ?>');
            <?php if($share_url): ?>
            jak2GetUrlSharing(this);
            <?php endif; ?>
        }

        <?php else: ?>
        jQuery('#<?php echo $formid; ?>').addEvent('submit', function () {
            jQuery('#<?php echo $formid; ?>').submit();
        });
        <?php endif; ?>
    });
    /*]]>*/
</script>
