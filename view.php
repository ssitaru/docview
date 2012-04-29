<?php 
# preinit
include_once(dirname(__FILE__).'/conf.php');

# init
if(!isset($_REQUEST['d'])) 
{
	echo 'ERROR! Param d missing.';
	return;
}

$ar = explode('-', $_REQUEST['d']);

if(count($ar) != 2) 
{
	echo 'ERROR! Param is malformatted.';
	return;
}
$id = $ar[0];
$name = $ar[1];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="base.css"/>
<?php
# output title
echo '<title>docview | ';
echo preg_replace('/([A-Z])/', ' $1', $name);
echo '</title>';

# output meta stuff
echo '<meta name="description" content="'.$GLOBALS['docview_meta_desc'].'" />';
echo '<meta name="author" content="'.$GLOBALS['docview_meta_author'].'" />';
?>
</head>
<body>
<div id="container">
<?php
# output h1
echo '<h1>';
echo preg_replace('/([A-Z])/', ' $1', $name);
echo '</h1>';
?>
<div id="main">
<?php
# try to find file
$file = $GLOBALS['docview_docpath'].'/'.$id.'-'.$name.'.md';
debug('file is '.$file);

# security check
$p = realpath($file);
debug('realpath -> '.$p);
if(!$p) 
{
	echo "ERROR! Requested path ('$file') does not exist.";
	return;
} else if(substr($p, 0, strlen(realpath($GLOBALS['docview_docpath']))) != realpath($GLOBALS['docview_docpath']))
{
	echo "ERROR! Requested path ('$p') outside of docview_docpath.";
	return;
}

# run markdown, capture output
$cmd = $GLOBALS['docview_mdpath'].' '.$p;
$output = array();
exec($cmd, $output);

echo implode('', $output);

?>
</div>
<div id="footer">
<?php
# footer
echo 'docview v'.$GLOBALS['docview_version'];
?>
</div>
</div>
</body>
</html>