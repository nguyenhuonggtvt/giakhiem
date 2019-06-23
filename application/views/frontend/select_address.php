<?php
	if($type == 2) {
		$title = 'Quận huyện';
		$key = 'maqh';
	} else if($type == 3){
		$title = 'Phường xã';
		$key = 'xaid';
	}
?>
<option value="" disabled selected><?php echo $title; ?></option>
<?php if($aryAdd): ?>
	<?php foreach ($aryAdd as $add): ?>
		<option  value="<?php echo $add[$key]; ?>"><?php echo $add['type']; ?> <?php echo $add['name']; ?></option>
	<?php endforeach; ?>
<?php endif; ?>