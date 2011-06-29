<?php 
class PaginationHelper extends Helper {
  /**
   * Parses a string of content for [page] blocks, and replaces them 
   * with div tags for dynamic control over content section 
   * visibility.
   * 
   * @access public
   * @since 1.0.0
   * @param string $strContent The content to parse and paginate
   * @return string The paginated content
   * 
   **/
  function paginateContent($strContent) {
    $strPaginated = '';
    $arrSections = explode('[page]', $strContent);
    if (count($arrSections) > 0) {
    	for ($i = 0; $i < count($arrSections); $i++) {
			if ($i == 0){
				$strPaginated .= '<div id="pageBreakContainer" class="clearfix">';
				$strPaginated .= "\n";
			}
			$strPaginated .= "\t\t".'<div class="longPageBreak">'."\n\t".$arrSections[$i]."</div>\n";
			if ($i == count($arrSections)){
				$strPaginated .= '</div>';
			}
		}
	return $strPaginated;
    }
  return $strContent;
  } 
} 
?>