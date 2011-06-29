
	<form id="m"  metod="post">
   	<fieldset id="personal">
        	<legend>personal information</legend>
         <p>
            <lable>نام:</lable>
            <input type="text" name="name" id="name" size="45"/>
     		</p>
     
     		<p>
            <lable>نام خانوادگی:</lable>
            <input type="text" name="fname" id="fname" size="50"/>
     		</p>
     		
     		<p>
     		   <lable>ایمیل:</lable>
     		   <input type="text" name="mail" id="mail" />
     		</p>
     		
     		<p>
     		   <lable>رشته تحصیلی:</lable>
     		   <input type="text" name="field" id="field" />
     		</p>
     		
     		<p>
     		   <lable>مقطع تحصیلی:</lable>
     		     <select name="maghta">
     		       <option>دیپلم</option>
     		       <option>کاردانی</option>
     		       <option>کارشناسی</option>
     		       <option>کارشناسی ارشد</option>
     		       <option>دکترا</option>
     		       </select>
     		 </p>
     		 
     		 <p>
     		    <lable>توضیحات</lable>
     		    <textarea name="tozih" >
     		    </textarea>
     		 </p>
     		 <input type="submit" name="send">
     		 <?php
     		 if (isset($_GET['send'])){
     		 		$to = "llrealmanll@gmail.com";
      			    $subject = "contact us";
					$headers = "From:momen573@yahoo.com \r\n";
					$headers .= "Content-type: text/html\r\n";
					$body = 'نام :'. $_GET['name'] .'<br> و نام خانوادگی نام :'. $_GET['fname'] .'<br>ایمیل :'. $_GET['mail'].'<br>رشته تحصیلی :'. $_GET['field'].'<br>مقطع تحصیلی :'. $_GET['maghta'].'<br>توضیحات :'. $_GET['tozih'];
                    if (mail($to, $subject, $body,$headers)) {
                          echo("<p>Message successfully sent!</p>");
                         } else {
                          echo("<p>Message delivery failed...</p>");
                         }
     		 }
     		 
     		 ?>
     		 
     		       
     		       
     		   
             