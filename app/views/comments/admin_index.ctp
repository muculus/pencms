<div class="comments index">
	<?php echo $this->element('datatable', array('controllerPath' => 'comments','filters' => array('widget_type'=> $widget_type , 'foreignid' =>$foreignid)));?>			
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Comment', true), array('action'=>'add'), array('class' => 'add')); ?></li>
		</ul>
	</div>
</div>
	