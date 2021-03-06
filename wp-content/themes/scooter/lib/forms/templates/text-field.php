<?php
$name     = $vars['key'];
$settings = $vars['settings'];
$class    = px_array_value('class', $settings);//Optional value
$placeholder = px_array_value('placeholder', $settings);//Optional value
$label    = px_array_value('label', $settings);//Optional value
?>

<div class="field text-input <?php echo $class; ?>">
    <?php if($label != ''){ ?>
        <label for="field-<?php echo $name; ?>"><?php echo $label; ?></label>
    <?php } ?>
    <input type="text" id="field-<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo esc_attr( $this->Px_GetValue($name) ); ?>" placeholder="<?php echo $placeholder; ?>" />
</div>