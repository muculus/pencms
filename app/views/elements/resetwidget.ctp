	 <script type="text/javascript">
		$(function easywidget(){
			  // Very basic usage
				$.fn.EasyWidgets({
				behaviour : {
						  dragDelay : 100,
						  dragRevert : 400, 
						  dragOpacity : 0.8,
						  useCookies : true
						  }, 
				i18n : {
				  editText : '<img src="http://www.daneshfa.com/images/icon-setting.gif" alt="Edit" width="16" height="16" />',
				  closeText : '<img src="http://www.daneshfa.com/images/close.gif" alt="Close" width="16" height="16" />',
				  collapseText : '<img src="http://www.daneshfa.com/images/icon-min.gif" alt="Close" width="16" height="16" />',
				  cancelEditText : '<img src="http://www.daneshfa.com/images/icon-setting.gif" alt="Edit" width="16" height="16" />',
				  extendText : '<img src="http://www.daneshfa.com/images/icon-max.gif" alt="Close" width="16" height="16" />'
				},
			    effects : {
				  effectDuration : 700,
				  widgetShow : 'fade',
				  widgetHide : 'fade',
				  widgetClose : 'fade',
				  widgetExtend : 'fade',
				  widgetCollapse : 'fade',
				  widgetOpenEdit : 'fade',
				  widgetCloseEdit : 'fade',
				  widgetCancelEdit : 'fade'
				}

						  
						  
			  });
			});
	$(document).ready(function() {
 		 	$('.widget-editlink').click(function() {
			//shareID = $('#'+$(this).attr('id'));
			widgetAjax = $(this).parent().parent().parent();
			//alert(aaa.attr('id'));
			cssObj = {left: $(this).position().left+270,top: $(this).position().top+310};
			$('.ja-usersetting-options').css(cssObj);
    		$(".ja-usersetting-options").slidexyToggle(700);
 		});
	});			
	</script>
<?php if(!isset($filters['reshte'])){ ?>
                                     <div class="jazin-boxwrap jazin-theme">
                                		<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="maghale">
											<div class="jazin-section clearfix widget-header">
												<a href="#" style="float: right"><span  >مفالات</span>	</a>
											</div>
											<div class="widget-content">
												<div class="jazin-content clearfix">
												<?php  //echo "::::::::";//pr($filters);echo "::::::::";
												 echo $this->element('last', array('controllerName' => 'articles',
																			   'conditions' => array('Category.id'=> 775),
																			   'className' => '',
																			   'limit' => 1,
																			   'order' => array('Article.id DESC'),
																			   'categoryFields' => array('Category.id','Category.picture'),
																			   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date')
																			   ));?>
												</div>
												<?php
												echo $this->element('latestVScroller', array('controllerName' => 'articles',
																		   'className' => '',
																		   'limit' => 5,
																		   'order' => array('RAND()'),
																		   'fields' => array('Article.id, Article.title, Article.hits'),
																		   'categoryFields' => array('Category.id'),
																		   'conditions' => array('Category.id'=> 775)));
																		   ?>
									</div>
									</div>
								</div>

                                     <div class="jazin-boxwrap jazin-theme">
                                		<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="ebook">
											<div class="jazin-section clearfix widget-header">
												<a href="#" style="float: right"><span  >کتاب های الکترونیکی</span>	</a>
											</div>
											<div class="widget-content">
											<div class="jazin-content clearfix">
											<?php
											 echo $this->element('last', array('controllerName' => 'articles',
																		   'conditions' => array('Category.id'=> 775),
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Article.id DESC'),
																		   'categoryFields' => array('Category.id','Category.picture'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date')
																		   ));?>
											</div>
											<?php
											echo $this->element('latestVScroller', array('controllerName' => 'articles',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Article.id, Article.title, Article.hits'),
																	   'categoryFields' => array('Category.id'),
																	   'conditions' => array('Category.id'=> 775)));
																	   ?>
										</div>
									</div>
								</div>
                                     <div class="jazin-boxwrap jazin-theme">
                                		<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="jozve">
											<div class="jazin-section clearfix widget-header">
												<a href="#" style="float: right"><span  >جزوات</span>	</a>
											</div>
											<div class="widget-content">
											<div class="jazin-content clearfix">
											<?php
											 echo $this->element('last', array('controllerName' => 'articles',
																		   'conditions' => array('Category.id'=> 775),
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Article.id DESC'),
																		   'categoryFields' => array('Category.id','Category.picture'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date')
																		   ));?>
											</div>
											<?php
											echo $this->element('latestVScroller', array('controllerName' => 'articles',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Article.id, Article.title, Article.hits'),
																	   'categoryFields' => array('Category.id'),
																	   'conditions' => array('Category.id'=> 775)));
																	   ?>
									</div>
									</div>
								</div>

							<!--	<div class="jazin-boxwrap jazin-theme">
									<div class="jazin-box clearfix">
										<div class="jazin-section clearfix widget-header">
											<a href="" title=""><span>جزوات</span></a>
                                        </div>
										<div class="jazin-content widget-content clearfix">
										<?php
							 			echo $this->element('lastDownload', array('controllerName' => 'downloads',
																		   'conditions' => array('Download.widget_id'=>205, 'Download.publish' =>1), 
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Download.id DESC'),
																		   'fields' => array('Download.id', 'Download.title', 'Download.hits','Download.description','Download.picture','Download.picture_dir')
																		   ));?>
										</div>
										<?php
										echo $this->element('latestVScroller', array('controllerName' => 'downloads',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Download.id, Download.title, Download.hits'),
																	   'conditions' => array('Download.widget_id' => 205  ,"Download.publish" =>1)));
																	   ?>
								</div>
							</div>
							<div class="jazin-boxwrap jazin-theme">
								<div class="jazin-box clearfix widget movable collapsable removable editable extend">
									<div class="jazin-section clearfix widget-header">
										<a href="" title=""><span>کتاب ها</span></a>
                                     </div>
									 <div class="widget-content">
									<div class="jazin-content clearfix">
									<?php
											 echo $this->element('lastDownload', array('controllerName' => 'downloads',
																		   'conditions' => array('Download.widget_id'=>205, 'Download.publish' =>1), 
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Download.id DESC'),
																		   'fields' => array('Download.id', 'Download.title', 'Download.hits','Download.description','Download.picture','Download.picture_dir')
																		   ));?>
								</div>
								<?php
								echo $this->element('latestVScroller', array('controllerName' => 'downloads',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Download.id, Download.title, Download.hits'),
																	   'conditions' => array('Download.widget_id' => 205  ,"Download.publish" =>1)));
																	   ?>
						</div>
						</div>
					</div> -->
					<div class="jazin-boxwrap jazin-theme">
						<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="nashrie">
							<div class="jazin-section clearfix widget-header">
								<a href=""> <span>نشریات</span></a>
                             </div>
							<div class="widget-content">
							<div class="jazin-content clearfix">
							<?php
							 echo $this->element('last', array('controllerName' => 'articles',
																		   'conditions' => array('Category.id'=> 775),
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Article.id DESC'),
																		   'categoryFields' => array('Category.id','Category.picture'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date')
																		   ));?>
							</div>
							<?php
                            echo $this->element('latestVScroller', array('controllerName' => 'articles',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Article.id, Article.title, Article.hits'),
																	   'categoryFields' => array('Category.id'),
																	   'conditions' => array('Category.id'=> 775)));
																	   ?>
							</div>
					</div>
				</div>
			</div>
<?php }else{ ?>
					<div class="jazin-boxwrap jazin-theme">
						<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="<?php echo "widget".rand(); ?>">
							<div class="jazin-section clearfix widget-header">
								<a href=""> <span><?php echo $filters['title']; ?></span></a>
                             </div>
							<div class="widget-content">
							<div class="jazin-content clearfix">
							<?php
							 echo  $this->element('last', array('controllerName' => $filters['control'],
																		   'conditions' => array('Category.id'=> $filters['geraiesh']),
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => $filters['show'],
																		   'categoryFields' => array('Category.id','Category.picture'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date')
																		   	   )); ?>
							</div>
							<?php //pr($filters['show']);
                            echo  $this->element('latestVScroller', array('controllerName' => $filters['control'],
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => $filters['show'],
																	   'categoryFields' => array('Category.id','Category.picture'),
																	   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date'),
											 						    'conditions' => array('Category.id'=> $filters['geraiesh'])));
																	   ?>
							</div>
						</div>
						</div>
							
							
							
<?php } ?>
