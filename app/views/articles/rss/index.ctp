   <?php
   $this->set('documentData', array(
   'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));
   $this->set('channelData', array(
    'title' => __("اندیشه سرا", true),
   'link' => $html->url('/', true),
   'description' => __("اندیشه سرا", true),
  'language' => 'en-us'));
    foreach ($posts as $post) {
    $postTime = strtotime($post['Article']['created']);
   
    $postLink = array(
   'controller' => 'articles',
    'action' => 'view',$post['Article']['id']
   );
  
   
   echo $rss->item(array(), array(
 'title' => $post['Article']['title'],
   'link' => $postLink,
 'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
  'description' => $post['Article']['intro'],
  'dc:creator' => $post['Article']['author'],
 'pubDate' => $post['Article']['created']));
  }
  ?>
