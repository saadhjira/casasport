<?php
/*
e($rss->items($articles, 'sortieRSS'));
function sortieRSS($article)
{
	
  return array(
    'title' => utf8_encode($article['Article']['title']),
    'link'  => 'http://www.wijhatnadar.com/articles/'. date("Y", strtotime($article['Article']['dated_at']))."/".date("m", strtotime($article['Article']['dated_at']))."/".date("d", strtotime($article['Article']['dated_at']))."/".$article['Article']['id'].".html",
    'description' => utf8_encode($article['Article']['short']),
    'pubDate' => $article['Article']['dated_at']
  );
}*/
    $this->set('documentData', array(
        'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

    $this->set('channelData', array(
        'title' => __("Most Recent Posts", true),
        'link' => $this->Html->url('/', true),
        'description' => __("Most recent posts.", true),
        'language' => 'en-us'));


    foreach ($articles as $post) {
        $postTime = strtotime($post['Article']['created']);
 
        $postLink = $this->Article->paramsUrl($post);
			
        // You should import Sanitize
        App::import('Sanitize');
        // This is the part where we clean the body text for output as the description 
        // of the rss item, this needs to have only text to make sure the feed validates
        $bodyText = preg_replace('=\(.*?\)=is', '', $post['Article']['body']);
        $bodyText = $this->Text->stripLinks($bodyText);
        $bodyText = Sanitize::stripAll($bodyText);
        $bodyText = $this->Text->truncate($bodyText, 400, array(
            'ending' => '...',
            'exact'  => true,
            'html'   => true,
        ));
 
        echo  $this->Rss->item(array(), array(
            'title' => $post['Article']['title'],
            'link' => $postLink,
            'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
            'description' =>  $bodyText,
            'dc:creator' => $post['Article']['author'],
            'pubDate' => $post['Article']['dated_at']));
    }

?>

