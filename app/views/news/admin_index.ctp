<div class="news index">
	<?php echo $this->element('datatable', array('controllerPath' => 'news', 'filters' => array('widget_id'=> $cat_id )));?>		
	<div class="actions">
		<ul>
			<li><?php if($this->params['pass']){ echo $html->link(__('New News', true), array('action'=>'add',$cat_id), array('class' => 'add bottom')); }?></li>
		</ul>
	</div>
</div>
