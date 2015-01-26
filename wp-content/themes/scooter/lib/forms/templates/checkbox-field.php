<?php
$name     = $vars['key'];
$settings = $vars['settings'];
$class    = px_array_value('class', $settings);//Optional value
$checked = px_array_value('checked', $settings);//Optional value
$label    = px_array_value('label', $settings);//Optional value
$value       = ( ( esc_attr( $this->Px_GetValue($name) ) == "") && (px_array_value('value', $settings) != "") ) ? px_array_value('value', $settings) : esc_attr( $this->Px_GetValue($name) );

$current_value = get_post_meta(get_the_ID(), $name, true);
?>

<div class="field checkbox-input <?php echo $class; ?>">
    <input type="checkbox" id="field-<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php echo ($current_value != '')?'checked="checked"':''; ?> />

	<?php if($label != ''){ ?>
        <label for="field-<?php echo $name; ?>"><?php echo $label; ?></label>
    <?php } ?>
	
</div>
<?php if (strpos ($class,'related')!== false){ ?>
    <div class="clearfix"></div>
<?php }