<?php
/*------------------------------------------------------------------------
# Cobalt
# ------------------------------------------------------------------------
# @author Cobalt
# @copyright Copyright (C) 2012 cobaltcrm.org All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website: http://www.cobaltcrm.org
-------------------------------------------------------------------------*/
// no direct access
defined( '_CEXEC' ) or die( 'Restricted access' );

    $custom = DropdownHelper::generateCustom($this->type,$this->item['id']);
    foreach ($custom as $field => $value) {
        if ($value['type'] != 'forecast') {
            $custom_field_filter = array_key_exists('selected',$value) ? $value['selected'] : "";
            echo '<div class="control-group">';
            echo '<label class="control-label" for="custom_'.$value['id'].'">'.$value['name'].'</label>';
            echo '<div class="controls">';
                //determine type of input
                switch ($value['type']) {
                    case "text": ?>
                    <input class="form-control" type="text" name="custom_<?php echo $value['id']; ?>" value="<?php echo $custom_field_filter; ?>" />
                    <?php break;
                    case "picklist": ?>
                            <select id="custom_<?php echo $value['id']; ?>" class="form-control" name="custom_<?php echo $value['id']; ?>">
                                <?php echo JHtml::_('select.options', $value['values'], 'value', 'text', $custom_field_filter, true); ?>
                            </select>
                    <?php break;
                    case "number": ?>
                    <input class="form-control" type="text" name="custom_<?php echo $value['id']; ?>" value="<?php echo $custom_field_filter; ?>" />
                    <?php break;
                    case "currency": ?>
                    <div class="">
                        <span class="input-group-addon"><?php echo ConfigHelper::getCurrency(); ?></span>
                        <input class="form-control" type="text" name="custom_<?php echo $value['id']; ?>" value="<?php echo $custom_field_filter; ?>" />
                    </div>
                    <?php break;
                    case "date": ?>
                    <!-- make this a custom date picker -->
                    <div class="input-group">
                        <input id="custom_<?php echo $value['id']; ?>" name="custom_<?php echo $value['id']; ?>_input" class="form-control filter_input date_input" type="text" value="<?php echo DateHelper::formatDate($custom_field_filter); ?>"  />
                        <input id="custom_<?php echo $value['id']; ?>_hidden" name="custom_<?php echo $value['id']; ?>" type="hidden" value="<?php echo $custom_field_filter; ?>" />
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                    </div>
                    <?php break; ?>
                <?php }
            echo '</div>';
            echo '</div>';
    } }
