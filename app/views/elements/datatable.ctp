<?php
	//$controllerPath is passed (underscored)
	//$filters are passed
	if(!isset($idName)) $idName = Inflector::variable($controllerPath);
	if(!isset($action)) $action = 'paging';
	if(!isset($filters)) $filters = array();
	if(!isset($filterOptions)) $filterOptions = array();
	$url = $html->url(array_merge(array('controller'=>$controllerPath,'action'=>$action), $filters));
	$jsMethod = 'load' . Inflector::camelize($idName);
?>
		<script type="text/javascript">
		
			function <?php echo $jsMethod;?>(href,divName) {
				$(divName + 'Preloader').show();
				$(divName).fadeTo(1, 0);
			    $(divName).load(href, {}, function(){
			    	$(divName + 'Preloader').css('position', 'absolute');
			    	$(divName + 'Preloader').hide();
			    	$(divName).fadeTo(300, 1);
			        var divPaginationLinks = divName+" #<?php echo $idName;?>Paging a, "+divName+" #<?php echo $idName;?>Sorting a";
			        $(divPaginationLinks).click(function() {
			            var thisHref = $(this).attr("href");
			            <?php echo $jsMethod;?>(thisHref,divName);
			            return false;
			        });
			    });
			}
		
			$(document).ready(function() {
				<?php echo $jsMethod;?>('<?php echo $url;?>','#<?php echo $idName;?>List');
			});
		</script>
		<?php
			if(!empty($filterOptions))
			{
		?>
		<div id="<?php echo $idName;?>FilterOptions">
			<h3>Filter</h3>
			<form action="<?php echo $url;?>" method="get" onsubmit="<?php echo $idName;?>Filter(); return false;" />
				<?php
					foreach($filterOptions as $filter)
					{
						$field = (is_array($filter)) ? $filter['field'] : $filter;
						$label = (is_array($filter)) ? $filter['label'] : null;;
						$fieldId = $idName . $field;
						$fieldId = str_replace('.', '_', $fieldId);
						echo $extendedForm->input($field, array('id' => $fieldId, 'label' => $label));
					} 
				?>
				<input type="submit" value="Filter" />
			</form>
			
			<script type="text/javascript">
				function <?php echo $idName;?>Filter()
				{
					var url = '<?php echo $url;?>';
					<?php
					foreach($filterOptions as $filter)
					{
						$field = (is_array($filter)) ? $filter['field'] : $filter;
						$fieldId = $idName . $field;
						$fieldId = str_replace('.', '_', $fieldId);
						echo "url += '/$field:' + escape(\$('#{$fieldId}').val());\n";
					}
					?>
					<?php echo $jsMethod;?>(url,'#<?php echo $idName;?>List');
				}
			</script>
		</div>
		<?php
			}
		?>
		<div id="<?php echo $idName;?>ListPreloader" style="height: 50px;"><?php echo $html->image('admin/loading.gif'); ?></div>
		<div id="<?php echo $idName;?>List">
		</div>