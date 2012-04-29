<?php
$GLOBALS['docview_debug'] = false;

$GLOBALS['docview_version'] = '0.1 beta';
$GLOBALS['docview_docpath'] = './docs/';
$GLOBALS['docview_mdpath'] = '/opt/local/bin/markdown';

$GLOBALS['docview_meta_author'] = 'Sebastian Sitaru';
$GLOBALS['docview_meta_desc'] = 'a document collection';

function debug($s)
{
	if ($GLOBALS['docview_debug'])
	{
		echo '<div class="debug">DEBUG: '.$s.'</div>';
	}
}
?>