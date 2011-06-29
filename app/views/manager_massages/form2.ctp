<?php if(!empty($managerMassage)) {?>

 <h2> سوال شما :</h2>
        <?php echo $managerMassage['ManagerMassage']['question']; ?>
		
        <hr>
		 <h2>پاسخ شما:</h2>
		 <?php echo $managerMassage['ManagerMassage']['answer']; ?>
		
<?php
}
?>