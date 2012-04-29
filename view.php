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
echo '<title>';
echo '['.$id.']';
echo preg_replace('/([A-Z])/', ' $1', $name);
echo '</title>';

# output meta stuff
echo '<meta name="description" content="'.$GLOBALS['docview_meta_desc'].'" />';
echo '<meta name="author" content="'.$GLOBALS['docview_meta_author'].'" />';
?>
</head>
<body>

</body>
</html>