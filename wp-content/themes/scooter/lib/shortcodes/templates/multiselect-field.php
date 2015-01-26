<?php
$name = $vars['key'];
$settings = $vars['settings'];
$options  = $settings['options'];
$selected     = px_array_value('selected', $settings, array());//Optional value
$optionsFlags = px_array_value('option-flags', $settings, array());
$flags        = px_array_value('flags', $settings);//Optional value
?>

<div class="px-input">
    <div class="px-input-multiselect">
        <select name="<?php echo $name; ?>" multiple="" data-flags="<?php echo $flags; ?>" class="chosen">
            <?php
            foreach($options as $value => $text)
            {
                $selectedAttr = in_array($value, $selected) ? 'selected="selected"' : '';
                $flags        = px_array_value($value, $optionsFlags);
                ?>
                <option value="<?php echo esc_attr($value); ?>" data-flags="<?php echo $flags; ?>" <?php echo $selectedAttr; ?> ><?php echo $text; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<?php echo $this->PX_GetTemplate('field-label', $vars); ?>