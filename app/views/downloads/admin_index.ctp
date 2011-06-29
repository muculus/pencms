<div class="downloads index">	
	<?php echo $this->element('datatable', array('controllerPath' => 'downloads','filters' => $this->passedArgs));?>		
	<div class="actions">
		<ul>
			<li><?php if($this->params['pass']){ echo $html->link(__('New Download', true), array('action'=>'add',$cat_id), array('class' => 'add bottom')); }?></li>
		</ul>
	</div>
</div>