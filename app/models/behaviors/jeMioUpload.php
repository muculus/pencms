<?php
/**
 * MeioUpload Behavior
 * 
 * This behavior is designed to extend Juan Basso's version
 * http://github.com/jrbasso/MeioUpload/tree/master
 *  of Vincius Mendes'  MeioUpload Behavior
 *  (http://www.meiocodigo.com/projects/meioupload/)
 * Which is in turn based upon Tane Piper's improved uplaod behavior
 *  (http://digitalspaghetti.tooum.net/switchboard/blog/2497:Upload_Behavior_for_CakePHP_12)
 * 
 * @author John Elliott http://www.flipflops.org
 * @package app
 * @subpackage app.models.behaviors
 * @filesource http://github.com/josegonzalez/MeioUpload/tree/master
 * @version 1.0
 * @lastmodified 2009-06-29
 *
 * Overview:
 * This behaviour extends the MeioUpload Behaviour and is designed to add several 
 * features to this behaviour. It is designed to be used in a Polymorphic Context 
 * where uploads for all the models in your system are stored in a single
 * uploads table and any variants (e.g. Thumbnails) are stored in a seperate table
 * the polymorphic association is uses the fields 'class' and 'foreign_id' to refernce the 
 * assocaited table where 'class' is the associated model name e.g. Product
 * 
 * Other Changes:
 * 1) Filenames can be generated randomly on upload by setting the 'random_filename' flag to true
 * 
 * 2) phpThumb options can be set on a per thumbnail basis. This definately works for ZoomCrop / zc 
 * 	  it should work for other options but you will need to try this out on a case by case basis see example below
 * 	  set as an array called 'image_options' e.g. 'image_options' => array('zc' => 1)
 * 
 * 3) File width and height are saved in the table for images
 * 
 * 4) All thumbnail images are also saved in a child model UploadVariant
 * 
 * 5) File Type saved by group e.g. Image, Document, Media to allow for simple filtering
 * 
 * 
 * Usage:
 * 1) Download this the MeioUpoad behavior and place it in your models/behaviors/meio_upload.php
 * 
 * 2) Download the JeUpload behaviour and place it in models/behaviors/je_upload.php
 * 
 * 3) If you require thumbnails for image generation, download the latest copy of 
 *     phpThumb and extract it into your vendors directory. Should end up like: /vendors/phpThumb/{files}.
 *    (http://phpthumb.sourceforge.net)
 * 
 * 4) Insert the following SQL into your database.  These are basic models you can expand on:
 *		
 *	CREATE TABLE `upload_variants` (
 *	 `id` int(11) NOT NULL auto_increment,
 *	 `upload_id` int(11) default NULL,
 *	 `variant` varchar(255) default NULL,
 *	 `filename` varchar(255) default NULL,
 *	 `width` int(4) default NULL,
 *	 `height` int(4) default NULL,
 *	 `created` datetime default NULL,
 *	 `modified` datetime default NULL,
 *	  PRIMARY KEY  (`id`)
 *	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
 *	
 *
 * 
 *	
 *	CREATE TABLE `uploads` (
 *	  `id` int(8) unsigned NOT NULL auto_increment,
 *	  `class` varchar(255) default 'Upload',
 *	  `foreign_id` int(11) default NULL,
 *	  `alt` varchar(255) default NULL,
 *	  `filename` varchar(255) default NULL,
 *	  `dir` varchar(255) default NULL,
 *	  `mimetype` varchar(255) default NULL,
 * 	  `quick_type` varchar(50) default NULL,
 *	  `filesize` int(11) unsigned default NULL,
 *	  `position` int(11) default '0',
 *	  `height` int(11) default NULL,
 *	  `width` int(11) default NULL,
 *	  `created` datetime default NULL,
 *	  `modified` datetime default NULL,
 *	  PRIMARY KEY  (`id`),
 *	  KEY `class` (`class`,`foreign_id`)
 *	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
 * 
 * 5) In your model that you want to have the upload behavior work, place the below code.  This example is for an Upload model:
 *
 *		var $actsAs = array(
 *			'JeUpload' => array(
 *				'filename' => array(
 *					'dir' => 'files/images',
 *					'create_directory' => false,
 *					'max_size' => 2097152,
 *					'max_dimension' => 'w',
 *					'thumbnailQuality' => 50,
 *					'useImageMagick' => true,
 *					'imageMagickPath' => '/usr/bin/convert',
 *					'allowed_mime' => array( 'image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'),
 *					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.gif'),
 *					'thumbsizes' => array(
 *						'small'  => array('width' => 80, 'height' => 80, 'image_options' => array('zc' => 1)),
 *						'medium' => array('width' => 220, 'height' => 220),
 *						'large'  => array('width' => 800, 'height' => 600)
 *					),
 *				)
 *			)
 *		);
 * 
 * The above code will save the uploaded file's name in the 'filename' field in database,
 * it will not overwrite existing files, instead it will create a new filename based on the original
 * plus a counter.
 * Allowed Mimetypes and extentions should be pretty explanitory.
 * For thumbnails, when the file is uploaded, it will create 3 thumbnail sizes and prepend the name
 * to the thumbfiles (i.e. image_001.jpg will produced thumb.small.image_001.jpg, thumb.medium.image_001.jpg, etc)
 *
 * 6) Create your upload view, make sure it's a multipart/form-data form, and the filename field is of type $form->file
 *		<?
 *			echo $form->create('Upload', array('type' => 'file'));
 *				echo $form->input('filename', array('type' => 'file'));
 *			echo $form->end('Submit');
 *		?>
 * 
 * 7) Make sure your directory is at least CHMOD 775, also check your php.ini MAX_FILE_SIZE is enough to support the filesizes you are uploading
 *
 * Version Details
 *
 * 1.0
 * + Initial release.
 */

App::Import('Behavior', 'MeioUpload'); 

class JeMeioUploadBehavior extends MeioUploadBehavior {
	
	function __construct() {
		
    	parent::__construct();
    
	}
	
	public $defaultOptions = array(
		'dir' => '',
		'allowed_mime' => array(),
		'allowed_ext' => array(),
		'create_directory' => true,
		'max_size' => 104857600, // 2MB
		'thumbsizes' => array(),
		'default' => false,
		'max_dimension' => null,
		'zoomCrop' => false,
		'thumbnailQuality' => 75,
		'useImageMagick' => false,
		'imageMagickPath' => '/usr/bin/convert',
		'fields' => array(
			'dir' => 'dir',
			'filesize' => 'filesize',
			'filename' => 'filename',
			'mimetype' => 'mimetype',
			'quick_type' => 'quick_type'
		),
		'length' => array(
			'min_width' => 0, // 0 for not validates
			'max_width' => 0,
			'min_height' => 0,
			'max_height' => 0
		),
		'validations' => array(),
		'default_class' => 'Upload', 
 		'random_filename' => true
	);
	
	/**
	 * Array that matches mime types to simple file types that can be stored in the 
	 * Database and which can be used for filtering
	 *
	 * @var array
	 */
	protected $fileTypes = array(
					'image' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
					'documnent' => array('application/pdf', 'application/msword', 'application/mspowerpoint', 'application/excel'),
					'media' => array('application/x-shockwave-flash', 'audio/x-mp3', 'audio/x-mpeg-3', 'audio/mpeg', 'audio/mpeg3', 'video/mpeg','video/x-mpeg', 'video/quicktime'));
	
	
	/**
	 * Uploads the files before saving the record.
	 * Pass through image_options array so that we can set phpThumb parameters on a per thumbnail basis
	 *
	 * @author Vinicius Mendes
	 * @author John Elliott
	 * @param $model Object
	 */
	public function beforeSave(&$model) {
		foreach ($this->__fields as $fieldName => $options) {
			// if the file is marked to be deleted, use the default or set the field to null
			if (!empty($model->data[$model->name][$fieldName]['remove'])) {
				if ($options['default']) {
					$model->data[$model->name][$fieldName] = $options['default'];
				} else {
					$model->data[$model->name][$fieldName] = null;
				}
				//if the record is already saved in the database, set the existing file to be removed after the save is sucessfull
				if (!empty($model->data[$model->name][$model->primaryKey])) {
					$this->setFileToRemove($fieldName);
				}
				continue;
			}

			// If no file has been upload, then unset the field to avoid overwriting existant file
			if (!isset($model->data[$model->name][$fieldName]) || !is_array($model->data[$model->name][$fieldName]) || empty($model->data[$model->name][$fieldName]['name'])) {
				if (!empty($model->data[$model->name][$model->primaryKey]) || !$options['default']) {
					unset($model->data[$model->name][$fieldName]);
				} else {
					$model->data[$model->name][$fieldName] = $options['default'];
				}
				continue;
			}
			//if the record is already saved in the database, set the existing file to be removed after the save is sucessfull
			if (!empty($model->data[$model->name][$model->primaryKey])) {
				$this->setFileToRemove($fieldName);
			}

			// Fix the filename, removing bad characters and avoiding from overwriting existing ones
			$this->_includeDefaultReplacement($options['default']);
			$this->fixName($fieldName);
			$saveAs = $options['dir'].DS.$model->data[$model->name][$fieldName]['name'];

			// Attempt to move uploaded file
			if (!move_uploaded_file($model->data[$model->name][$fieldName]['tmp_name'], $saveAs)) {
				$model->validationErrors[$field] = __d('meio_upload', 'Problems in the copy of the file.', true);
				return false;
			}
			
			if(file_exists($options['dir']. DS . $model->data[$model->name][$fieldName]['name'])) {
				$d = getimagesize($options['dir']. DS . $model->data[$model->name][$fieldName]['name']);
				$model->data[$model->name]['width'] = $d[0];
				$model->data[$model->name]['height'] = $d[1];
			}

			// Update model data
			$model->data[$model->name][$options['fields']['dir']] = $options['dir'];
			$model->data[$model->name][$options['fields']['mimetype']] = $model->data[$model->name][$fieldName]['type'];
			// Get the quick type of the file for filtering		
			$model->data[$model->name][$options['fields']['quick_type']] = $this->getType($model->data[$model->name][$options['fields']['mimetype']]);
			$model->data[$model->name][$options['fields']['filesize']] = $model->data[$model->name][$fieldName]['size'];
			$model->data[$model->name][$options['fields']['filename']] = $model->data[$model->name][$fieldName]['name'];

			
			// If the file is an image, try to make the thumbnails
			$i = 0; // count the number of thumnail variants (i.e. UploadVariants)
			if (count($options['allowed_ext']) > 0 && ($model->data[$model->name][$options['fields']['quick_type']] == 'image')) {
				
				foreach ($options['thumbsizes'] as $key => $value) {
					
		
					
					// If a 'normal' thumbnail is set, then it will overwrite the original file
					if($key == 'normal'){
						$thumbSaveAs = $saveAs;
					// Otherwise, set the thumb filename to thumb.$key.$filename.$ext
					} else {
						$thumbSaveAs = $options['dir'].DS.'thumb.'.$key.'.'.$model->data[$model->name][$options['fields']['filename']];
					}
					
					
					
					if(!isset($value['image_options'])){
						$value['image_options'] = null;
					}
					
					$flag = false; // tracking flag to see if thumbnail generation was a success
					
					if (isset($value['max_dimension'])) {
						if($this->createThumbnail($saveAs, $thumbSaveAs, $fieldName, array('thumbWidth' => $value['width'], 'thumbHeight' => $value['height'], 'imageOptions' => $value['image_options'], 'maxDimension' => $value['max_dimension']))){					
							$flag = true;
						}
					} else {
						if($this->createThumbnail($saveAs, $thumbSaveAs, $fieldName, array('thumbWidth' => $value['width'], 'thumbHeight' => $value['height'], 'imageOptions' => $value['image_options']))){
							$flag = true;
						}
					}
					
					if($flag == true){ // add the data for another UploadVariant
						if(file_exists($thumbSaveAs)) {
							$d = getimagesize($thumbSaveAs);
							$model->data['UploadVariant'][$i]['width'] = $d[0];
							$model->data['UploadVariant'][$i]['height'] = $d[1];					
							$model->data['UploadVariant'][$i]['variant'] = $key;
							$model->data['UploadVariant'][$i]['filename'] = 'thumb.'.$key.'.'.$model->data[$model->name][$options['fields']['filename']];
							$i++;
						}
					}
				}
			}
			
			

		}
		return true;
	}
	
	
	/**
	 * Replace the existing createThumbnail function so that we can set an array
	 * Pass through image_options array so that we can set phpThumb parameters on a per thumbnail basis
	 * 
	 * @author Vinicius Mendes
	 * @author John Elliott
	 * @param String source file name (without path)
	 * @param String target file name (without path)
	 * @param String path to source and destination (no trailing DS)
	 */
	public function createThumbnail($source, $target, $fieldName, $params = array()) {
		
		
		
		$params = array_merge(
			array(
				'thumbWidth' => 150, 
				'thumbHeight' => 225, 
				'imageOptions' => null,
				'maxDimension' => ''),
				$params);
		
		// Import phpThumb class
		App::import('Vendor','phpthumb', array('file' => 'phpThumb'.DS.'phpthumb.class.php'));
		
		// Configuring thumbnail settings
		$phpThumb = new phpthumb;
		$phpThumb->setSourceFilename($source);
		
		if (($params['maxDimension'] != 'h') | ($params['maxDimension'] != 'w')) {
			$phpThumb->w = $params['thumbWidth'];
			$phpThumb->h = $params['thumbHeight'];
		} else {
			if ($params['maxDimension'] == 'w') {
				$phpThumb->w = $params['thumbWidth'];
			} else if ($params['maxDimension'] == 'h') {
				$phpThumb->h = $params['thumbHeight'];
			}
		}
		
		$phpThumb->setParameter('zc', $this->__fields[$fieldName]['zoomCrop']);
		$phpThumb->q = $this->__fields[$fieldName]['thumbnailQuality'];
		
		
		if(is_array($params['imageOptions'])){
			foreach($params['imageOptions'] as $key => $value){
				$phpThumb->setParameter($key, $value);
			}
		}
		

		$imageArray = explode(".", $source);
		$phpThumb->config_output_format = $imageArray[1];
		unset($imageArray);

		$phpThumb->config_prefer_imagemagick = $this->__fields[$fieldName]['useImageMagick'];
		$phpThumb->config_imagemagick_path = $this->__fields[$fieldName]['imageMagickPath'];

		// Setting whether to die upon error
		$phpThumb->config_error_die_on_error = true;

		// Creating thumbnail
		if ($phpThumb->GenerateThumbnail()) {
			if (!$phpThumb->RenderToFile($target)) {
				$this->addError('Could not render image to: '.$target);
			} else {
				return true;
			}
		}
	}
	
	
	/**
	 * Removes the bad characters from the $filename and replace reserved words. It updates the $model->data.
	 *
	 * @author Vinicius Mendes
	 * @author John Elliott
	 * @return null
	 * @param $fieldName String
	 */
	public function fixName($fieldName) {
		// updates the filename removing the keywords thumb and default name for the field.
		list ($filename, $ext) = $this->splitFilenameAndExt($this->__model->data[$this->__model->name][$fieldName]['name']);
		$filename = str_replace($this->patterns, $this->replacements, $filename);
		$filename = Inflector::slug($filename);
		$i = 0;
		$newFilename = $filename;
		
		
		/*
		 * do we create a random filename or not ?
		 */
		if($this->__fields[$fieldName]['random_filename'] == true){
			
			$newFilename = low($this->generatePassword());
			
			$class = low($this->__model->data[$this->__model->name]['class']);
			// if this is a polymorphic upload
			if(isset($this->__model->data[$this->__model->name]['foreign_id'])){
				$foreign_id = $this->__model->data[$this->__model->name]['foreign_id'];
			}
			
			
			if(isset($foreign_id)){
				$newFilename = $foreign_id . '.' . $newFilename;
			}
			
			if(isset($class)){
				$newFilename = $class . '.' . $newFilename;
			}
			
		} else {
		
			while (file_exists($this->__fields[$fieldName]['dir'] . DS . $newFilename . '.' . $ext)) {
				$newFilename = $filename . $i++;
			}
		}
		
		
		
		
		
		
		
		
		$this->__model->data[$this->__model->name][$fieldName]['name'] = $newFilename . '.' . $ext;
	}
	
	
/**
	* Generate a random string of given length
	* (no idea who wrote this function, but thanks)
	* @param $passwordlength int
	* @return string 
	*/
	public function generatePassword($passwordLength = 8) {
		mt_srand((double) microtime() * 1000000);
		$randomPassword="";
	
		for ($i=0; $i<$passwordLength; $i++) {
			$chrID = mt_rand(1,62);
			if ($chrID>=1 && $chrID<=10) {$chrID = $chrID + 47;}
			elseif ($chrID>=11 && $chrID<=36) {$chrID = $chrID + 54;}
			elseif ($chrID>=37 && $chrID<=62) {$chrID = $chrID + 60;}
			$randomPassword = $randomPassword . chr($chrID);
		}
		return $randomPassword;
	}
	
	/**
	 * Check the mime type of a file and return a simple type 
	 * that can be used for quick filtering e.g. find all images
	 *
	 * @param string $str - the mimetype to check against
	 * @return string -simple type e.g. image / document / media
	 */
	public function getType($str = null){
		if($str){
			foreach($this->fileTypes as $key => $array){
				$array = array_flip($array);
				if(array_key_exists($str, $array)){
					return $key;
				}
			}
		} else {
			return null;
		}
	}
	

	/**
	 * Deletes the files marked to be deleted in the save method. A file can be marked to be deleted if it is overwriten by another or if the user mark it to be deleted.
	 * Populates the UploadVariant Model
	 * @author Vinicius Mendes
	 * @author John Elliott
	 * @param $model Object
	 */
	function afterSave(&$model) {
		foreach ($this->__filesToRemove as $file) {
			if ($file['name']) {
				$this->_deleteFiles($file['name'], $file['dir']);
			}
		}
		// Reset the filesToRemove array
		$this->__filesToRemove = array();
		
		if(isset($model->data['UploadVariant'])){
			$c = count($model->data['UploadVariant']);
			$thumbs = ClassRegistry::init('UploadVariant');
			for($i = 0; $i < $c; $i++){
				$model->data['UploadVariant'][$i]['upload_id'] = $model->id;
				$thumbs->create();
				$thumbs->save($model->data['UploadVariant'][$i]);
			}
		}
	}
	
	
	
	
}
?>