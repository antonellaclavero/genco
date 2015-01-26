<?php
$name        = $vars['key'];
$settings    = $vars['settings'];
$class       = px_array_value('class', $settings);//Optional value
$label       = px_array_value('label', $settings);//Optional value
$placeholder = px_array_value('placeholder', $settings);//Optional value
$flags    = px_array_value('flags', $settings);//Opt
?>
<div class="px-input">
    <div class="px-input-color <?php echo $class; ?>">
        <input type="text" name="<?php echo $name; ?>" class="colorinput" placeholder="<?php echo $placeholder; ?>" data-flags="<?php echo $flags; ?>" />
   </div>
</div>
<?php echo $this->PX_GetTemplate('field-label', $vars); ?>
