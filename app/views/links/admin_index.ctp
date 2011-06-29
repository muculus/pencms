<div class="links index">

	<?php echo $this->element('datatable', array('controllerPath' => 'links','filters' =>$this->passedArgs));?>		
	<div class="actions">
		<ul>
			<li>
			<?php  echo $html->link(__('New Link', true), array('action'=>'add',$cat_id), array('class' => 'add bottom')); ?></li>
		</ul>
	</div>
</div>
