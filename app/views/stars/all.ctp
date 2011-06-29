<?php
$i = 0;
?>
<div class="modContent">
                    <table cellpadding="0" cellspacing="0" width="100%" class="maintbl">
                        <tr>
						 <?php foreach ($stars as $star): ?>
                            <td>
							<?php $i++; ?>
                                <table cellpadding="0" cellspacing="0" class="advertbl">
                                    <tr class="picsRow">
									
                                    	<td class="picCell"><?php echo $html->image('satar_adver.png')?></td>
                                        <td class="starCell">
										<?php echo $html->image('stars/'.$star['Star']['star'].'.png')?>
										</td>
                                    </tr>
                                    <tr class="descRow">
                                    	<td colspan="2" class="descCell"><span> 
										<?php echo $html->link( $star['Star']['title'], '/stars/view/'.$star['Star']['id']);?>
										                                </span></td>                        </tr>
                                </table>     
                            </td>
                             <?php if($i%2==0) echo "</tr><tr>"; ?>
   					    <?php endforeach ?>
					</table>
</div>                            
	
<div class="paging" id="starsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>