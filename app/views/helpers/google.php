<?php
class GoogleHelper extends AppHelper {

    var $BaseUrl = 'http://ajax.googleapis.com/ajax/services/language/translate';
    var $FromLang = 'he';
    var $ToLang = 'en';
    var $Version = '1.0';

    var $CallUrl;

    var $Text = 'שלו�? עול�?!';

    var $TranslatedText;
    var $DebugMsg;
    var $DebugStatus;

    function makeCallUrl(){
        $this->CallUrl = $this->BaseUrl;
        $this->CallUrl .= "?v=" . $this->Version;
        $this->CallUrl .= "&q=" . urlencode($this->Text);
        $this->CallUrl .= "&langpair=" . $this->FromLang;
        $this->CallUrl .= "%7C" . $this->ToLang;
    }

    function translate($text = ''){
        if($text != ''){
            $this->Text = $text;
        }
        $this->makeCallUrl();
        if($this->Text != '' && $this->CallUrl != ''){
            $handle = fopen($this->CallUrl, "rb");
            $contents = '';
            while (!feof($handle)) {
            $contents .= fread($handle, 8192);
            }
            fclose($handle);

            $json = json_decode($contents, true);

            if($json['responseStatus'] == 200){ //If request was ok
                $this->TranslatedText = $json['responseData']['translatedText'];
                $this->DebugMsg = $json['responseDetails'];
                $this->DebugStatus = $json['responseStatus'];
                return $this->TranslatedText;
            } else { //Return some errors
                return false;
                $this->DebugMsg = $json['responseDetails'];
                $this->DebugStatus = $json['responseStatus'];
            }
        } else {
            return false;
        }
    }
}//END OF CLASS
?>