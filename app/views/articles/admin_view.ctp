<h2><?php  __('Article');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Article');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="articles view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $article['Article']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $article['Article']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Content'); ?></td>
					<td><?php echo $article['Article']['content']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Author'); ?></td>
					<td><?php echo $article['Article']['author']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($article['Article']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $article['Article']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $article['Article']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($article['Article']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Copyright'); ?></td>
					<td><?php echo $article['Article']['copyright']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Source'); ?></td>
					<td><?php echo $article['Article']['source']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Image'); ?></td>
					<td><?php echo $article['Article']['image']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publishdate'); ?></td>
					<td><?php echo $article['Article']['publishdate']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('pages'); ?></td>
					<td><?php echo $article['Article']['pages']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('formats'); ?></td>
					<td><?php echo $article['Article']['formats']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Article Category'); ?></td>
					<td><?php echo $html->link($article['ArticleCategory']['title'], array('controller'=> 'article_categories', 'action'=>'view', $article['ArticleCategory']['id'])); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Article', true), array('action'=>'edit', $article['Article']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Article', true), array('action'=>'delete', $article['Article']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $article['Article']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Articles', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Article', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>