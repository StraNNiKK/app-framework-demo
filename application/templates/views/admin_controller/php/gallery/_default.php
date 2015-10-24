sections "gallery"
<br />
<?php echo time() ?><br />
<?php if (is_array($this->Data['valInMemoryStore'])) { ?>
	<?php d($this->Data['valInMemoryStore'])?>
<?php } else { ?>
	<?php echo $this->Data['valInMemoryStore']?>
<?php } ?>