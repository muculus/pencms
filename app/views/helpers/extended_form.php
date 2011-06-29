<?php
class ExtendedFormHelper extends FormHelper {
	function input($fieldName, $options = array()) {
		if(!empty($this->params['named']) && !empty($this->params['named'][$fieldName])){
			$options['value'] = $this->params['named'][$fieldName];
		}
		$fieldType = $fieldName;
		$pos = strrpos($fieldType, '.');
		if(!($pos === false)) $fieldType = substr($fieldType, $pos + 1);
		switch($fieldType){
			case "file":
			case "movie":
			case "image":
			case "thumbnail":
			case "thumb":
			case "logo":
			case "afbeelding":
			case "foto":
			case "photo":
				$options['type'] = 'file';
				break;
		}
		return parent::input($fieldName, $options);
	}
	/**
	 * Creates file input widget.
	 *
	 * @param string $fieldName Name of a field, like this "Modelname.fieldname", "Modelname/fieldname" is deprecated
	 * @param array $options Array of HTML attributes.
	 * @return string
	 * @access public
	 */
	function file($fieldName, $options = array()) {
		$options = $this->_initInputField($fieldName, array_merge(array('type' => 'text'), $options));
		$code = $this->text($fieldName, $options);
		$fieldType = $fieldName;
		$pos = strrpos($fieldType, '.');
		if(!($pos === false)) $fieldType = substr($fieldType, $pos + 1);
		switch($fieldType){
			case 'image':
			case 'thumbnail':
			case 'thumb':
			case "logo":
			case "afbeelding":
			case "foto":
			case "photo":
				$type = 'Images';
				$typedir = 'images';
				break;
			case 'movie':
				$type = 'Flash';
				$typedir = 'flash';
				break;
			default:
				$type = 'Files';
				$typedir = 'files';
				break;
		}
		$id = $options['id'];
		$code .= '<script type="text/javascript">';
		$code .= "//<![CDATA[\n";
		$code .= "function openFileBrowser{$id}(){\n";
		$code .= "var url = '{$this->webroot}js/ckfinder/ckfinder.html?type={$type}&action=js&func=SetFileField{$id}';\n";
		$code .= "var sOptions = 'toolbar=no,status=no,resizable=yes,dependent=yes,scrollbars=yes,width=640,height=480';\n";
		$code .= "var oWindow = window.open(url, 'ckfinder', sOptions);\n";
		$code .= "}\n";
		$code .= "function SetFileField{$id}(fileUrl){\n";
		$code .= "var pos = fileUrl.toLowerCase().indexOf('webroot/files/{$typedir}');\n";
		$len = 1 + strlen("webroot/files/{$typedir}");
		$code .= "fileUrl = fileUrl.substr(pos + {$len});\n";
		$code .= "document.getElementById('{$id}').value = fileUrl;\n";
		$code .= "}\n";
		$code .= "//]]>\n";
		$code .= '</script>';
		$code .= '<a href="#" onclick="openFileBrowser'.$id.'(); return false;">selecteer...</a>';
		return $code;
	}
	/**
	 * FCK editor instance maken van textfield
	 *
	 * @param string $fieldName
	 * @param array $options
	 * @return string
	 */
	function textarea($fieldName, $options = array()) {
		$code = parent::textarea($fieldName, $options);
		$options = $this->_initInputField($fieldName, $options);
		$did = $options['id'];
		$js = $this->webroot.'js/fck/';
		if(!empty($this->params['admin']) && $this->params['admin'] == 1){
			$code .= '<script type="text/javascript">'."\n";
			$code .= "fckLoader_{$did} = function () {\n";
			$code .= "var bFCKeditor_{$did} = new FCKeditor('{$did}');\n";
			$code .= "bFCKeditor_{$did}.BasePath = '{$js}';\n";
			$code .= "bFCKeditor_{$did}.ToolbarSet = 'Default';\n";
			$code .= "bFCKeditor_{$did}.Skin = 'silver';\n";
			$code .= "bFCKeditor_{$did}.ReplaceTextarea();\n";
			$code .= "}\n";
			$code .= "fckLoader_{$did}();\n";
			$code .= "</script>";
		} else {
			$code .= '<script type="text/javascript">'."\n";
			$code .= "fckLoader_{$did} = function () {\n";
			$code .= "var bFCKeditor_{$did} = new FCKeditor('{$did}');\n";
			$code .= "bFCKeditor_{$did}.BasePath = '{$js}';\n";
			$code .= "bFCKeditor_{$did}.ToolbarSet = 'Basic';\n";
			$code .= "bFCKeditor_{$did}.Skin = 'silver';\n";
			$code .= "bFCKeditor_{$did}.ReplaceTextarea();\n";
			$code .= "}\n";
			$code .= "fckLoader_{$did}();\n";
			$code .= "</script>";
		}
		return $code;
	}
	
	function dateTime($fieldName, $dateFormat = 'DMY', $timeFormat = '12', $selected = null, $attributes = array(), $showEmpty = true) {
		$options = $this->_initInputField($fieldName, array('type' => 'text'));
		$code = $this->text($fieldName, $options);
		$code .= $this->hidden($fieldName, array_merge($options, array('id' => $options['id'].'Hidden')));
		$code .= '<script type="text/javascript">'."\n";
		$code .= '$("#'.$options['id'].'Hidden").datepicker({dateFormat: "yy-mm-dd", beforeShow: beforeShow'.$options['id'].', onSelect: selected'.$options['id'].', showOn: "both", buttonImage: "'.$this->url('/img/admin/calendar.gif').'", buttonImageOnly: true});' . "\n";
		$code .= "function beforeShow{$options['id']}()\n";
		$code .= "{\n";
		$code .= "$('#{$options['id']}Hidden').val($('#{$options['id']}').val());\n";
		$code .= "}\n";
		$code .= "function selected{$options['id']}(date)\n";
		$code .= "{\n";
		$code .= "$('#{$options['id']}').val(date + $('#{$options['id']}').val().substr(10));\n";
		$code .= "}\n";
		$code .= '</script>'."\n";
		return $code;
	}

	function select($fieldName, $options = array(), $selected = null, $attributes = array(), $showEmpty = '') {
		$attributes = $this->_initInputField($fieldName, $attributes);
		$code = parent::select($fieldName, $options, $selected, $attributes, $showEmpty);
		if(!empty($attributes['autocomplete']) && $attributes['autocomplete'] == true)
		{
			$code .= "<script type=\"text/javascript\">\n";
			$code .= "var {$attributes['id']}Data = new Array();\n";
			$code .= "\$('#{$attributes['id']}').before('<input type=\"text\" id=\"{$attributes['id']}Text\" />');\n";
			$code .= "\$('#{$attributes['id']}').css('display', 'none');\n";
			$code .= "\$('#{$attributes['id']} option').each(function(i){\n";
			$code .= "{$attributes['id']}Data.push({label: this.innerHTML, value: this.value});\n";
			$code .= "if(\$('#{$attributes['id']}').val() == this.value) \$('#{$attributes['id']}Text').val(this.innerHTML);\n";
			$code .= "});\n";
			$code .= "\$('#{$attributes['id']}Text').autocomplete({$attributes['id']}Data, {\n";
			$code .= "max: 20,\n";
			$code .= "matchContains: true,\n";
			$code .= "formatItem: function(item) {\n";
			$code .= "return item.label;\n";
			$code .= "}\n";
			$code .= "}).result(function(event, item) {\n";
			$code .= "\$('#{$attributes['id']}').val(item.value);\n";
			$code .= "\$('#{$attributes['id']}').change();\n";
			$code .= "});\n";
			$code .= "</script>\n";
		}
		return $code;
	}
}
?>