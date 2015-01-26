<?php
$name     = $vars['key'];
$settings = $vars['settings'];
$title    = px_array_value('title', $settings);//Optional value
$selected = $this->Px_GetValue($name);
$options  = $settings['options'];
$class    = px_array_value('class', $settings);//Optional value
?>
<div class="field imageSelect <?php echo $class; ?>">

	<?php if (! empty($title)) { ?>
		<div class="label"><?php echo $title; ?></div>
	<?php } ?>

	<div class="imageList">
		<?php
		foreach($options as $key => $value)
		{
			$selectedClass = $value == $selected ? 'selected' : '';
			?>
			<a href="#" class="<?php echo $key . ' ' . $selectedClass; ?>"><?php echo $value; ?></a>
		<?php
		}
		?>
	</div>
	
    <input name="<?php echo $name; ?>" type="text" value="<?php echo $selected; ?>" />
</div>