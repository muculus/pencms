<div class="groups index">

	<?php echo $this->element('datatable', array('controllerPath' => 'groups'));?>		
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Group', true), array('action'=>'add'), array('class' => 'add bottom')); ?></li>
		</ul>
	</div>
</div>
