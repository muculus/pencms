<?php echo $form->create(null, array('action' => 'index'));?>

<fieldset>
<legend>تنظیمات ابر داده</legend>
<?php echo $form->input('meta.description',array('label'=>' توضیحات اصلی مرتبط با سایت' ,'value'=>'','type'=>'textarea')); ?>
<?php echo $form->input('meta.key',array('label'=>'کلید واژه های مرتبط با سایت' ,'value'=>'','type'=>'textarea')); ?>
<p> نمایش عنوان متا تگ </p>
<label>بلی<input type="radio" name="data[meta][title]" value="no"></label>
<label>خیر<input type="radio" name="data[meta][title]" value="yes"></label>
<p> نمایش مالک متا تگ </p>
<label>بلی<input type="radio" name="data[meta][owner]" value="no"></label>
<label>خیر<input type="radio" name="data[meta][owner]" value="yes"></label>
</legend>
</fieldset>

<fieldset>
<legend>تنظیمات کش</legend>
<label>بله<input type="radio" value="1" name=data[Cash][setting]></label>
<label>خیر<input type="radio" value="2" name=data[Cash][setting]></label>
<?php echo $form->input('Cash.time',array('label'=>' زمان کش' ,'value'=>'15 دقیقه')); ?>
<?php echo $form->input('Cash.memory',array('label'=>'نگهدارنده کش' ,'value'=>'فایل')); ?>
</legend>
</fieldset>

<fieldset>
<legend>تنظیمات جلسه</legend>
<?php echo $form->input('Session.lifetime',array('label'=>'طول عمر جلسه' ,'value'=>'15 دقیقه')); ?>
<select name="data[Session][memory]">
<option value="database">پایگاه داده</option>
<option value="null">هیچ</option>
</select>
</legend>
</fieldset>
<fieldset>
<legend>تنظیمات محلی</legend>
<label>تنظیمات زمان</label>
<select name="data[time][offset]" id="offset" class="inputbox" size="1"><option value="-12">(UTC -12:00) International Date Line West</option><option value="-11">(UTC -11:00) Midway Island, Samoa</option><option value="-10">(UTC -10:00) Hawaii</option><option value="-9.5">(UTC -09:30) Taiohae, Marquesas Islands</option><option value="-9">(UTC -09:00) Alaska</option><option value="-8">(UTC -08:00) Pacific Time (US &amp; Canada)</option><option value="-7">(UTC -07:00) Mountain Time (US &amp; Canada)</option><option value="-6">(UTC -06:00) Central Time (US &amp; Canada), Mexico City</option><option value="-5">(UTC -05:00) Eastern Time (US &amp; Canada), Bogota, Lima</option><option value="-4.5">(UTC -04:30) Venezuela</option><option value="-4">(UTC -04:00) Atlantic Time (Canada), Caracas, La Paz</option><option value="-3.5">(UTC -03:30) St. John's, Newfoundland and Labrador</option><option value="-3">(UTC -03:00) Brazil, Buenos Aires, Georgetown</option><option value="-2">(UTC -02:00) Mid-Atlantic</option><option value="-1">(UTC -01:00) Azores, Cape Verde Islands</option><option value="0" selected="selected">(UTC 00:00) Western Europe Time, London, Lisbon, Casablanca</option><option value="1">(UTC +01:00) Amsterdam, Berlin, Brussels, Copenhagen, Madrid, Paris</option><option value="2">(UTC +02:00) Istanbul, Jerusalem, Kaliningrad, South Africa</option><option value="3">(UTC +03:00) Baghdad, Riyadh, Moscow, St. Petersburg</option><option value="3.5">(UTC +03:30) تهران</option><option value="4">(UTC +04:00) Abu Dhabi, Muscat, Baku, Tbilisi</option><option value="4.5">(UTC +04:30) Kabul</option><option value="5">(UTC +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option><option value="5.5">(UTC +05:30) Bombay, Calcutta, Madras, New Delhi, Colombo</option><option value="5.75">(UTC +05:45) Kathmandu</option><option value="6">(UTC +06:00) Almaty, Dhaka</option><option value="6.3">(UTC +06:30) Yagoon</option><option value="7">(UTC +07:00) Bangkok, Hanoi, Jakarta</option><option value="8">(UTC +08:00) Beijing, Perth, Singapore, Hong Kong</option><option value="8.75">(UTC +08:00) Western Australia</option><option value="9">(UTC +09:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option><option value="9.5">(UTC +09:30) Adelaide, Darwin, Yakutsk</option><option value="10">(UTC +10:00) Eastern Australia, Guam, Vladivostok</option><option value="10.5">(UTC +10:30) Lord Howe Island (Australia)</option><option value="11">(UTC +11:00) Magadan, Solomon Islands, New Caledonia</option><option value="11.3">(UTC +11:30) Norfolk Island</option><option value="12">(UTC +12:00) Auckland, Wellington, Fiji, Kamchatka</option><option value="12.75">(UTC +12:45) Chatham Island</option><option value="13">(UTC +13:00) Tonga</option><option value="14">(UTC +14:00) Kiribati</option></select>			</td>
	
</legend>

<fieldset>
	<legend>تنظیمات پایگاه داده</legend>
		<?php echo $form->input('Database.type',array('label'=>'نوع پایگاه داده' ,'value'=>'mysql')); ?>
		<?php echo $form->input('Database.server',array('label'=>'نام هاست' ,'value'=>'localhost')); ?>
		<?php echo $form->input('Database.username',array('label'=>'نام کاربری' ,'value'=>'root')); ?>
		<?php echo $form->input('Database.password',array('label'=>'پسورد' ,'value'=>'', 'type'=>'password')); ?>
		<?php echo $form->input('Database.dbname',array('label'=>'نام پایگاه داده' ,'value'=>'')); ?>
		<?php echo $form->input('Database.dbperfix',array('label'=>'پیشوند پایگاه داده' ,'value'=>'')); ?>
	</legend>
</fieldset>




<?php echo $form->end('تنظیمات');?> 
