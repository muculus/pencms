<?php 
			if($session->check('Message.error')){
				$session->flash('error');
			}
			if($session->check('Message.info')){
				$session->flash('info');
			}
			if ($session->check('Message.flash')){
				$session->flash();
			}
			if ($session->check('Message.auth')){
				$session->flash('auth');
			}
            echo $content_for_layout;
			
        ?>