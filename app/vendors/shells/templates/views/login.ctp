<div id="tabpanel" class="usual"> 
	<ul class="tabbar"> 
		<li><a href="#tab1"><?php echo "<?php  __('Login');?>";?></a></li>
	</ul>
	<div id="tab1">
		<?php echo "<?php\n";?>
			<?php echo "echo \$form->create('User', array('action'=>'login'));\n"; ?>
			<?php echo "echo \$form->input('User.email');\n"; ?>
			<?php echo "echo \$form->input('User.password', array('type'=>'password','value'=>''));\n"; ?>
		    <?php echo "echo \$form->submit('Login');\n"; ?>
		    <?php echo "echo \$form->end();\n"; ?>
		<?php echo "?>\n";?>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel ul").idTabs();
</script>