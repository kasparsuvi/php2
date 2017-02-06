<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 24.01.2017
 * Time: 21:44
 */
$page_id = $http->get('page_id');
$sql = 'SELECT * FROM content WHERE content_id="'.$page_id.'"';
$res = $db->getArray($sql);
{
    $page = $res[0];
    $http->set('page_id', $page['content_id']);
    if ($page_id == 1) {
        $tmpl->set('content',$form->parse());
    } else {
        $tmpl->set('content', $page['content']);
    }
}
?>
