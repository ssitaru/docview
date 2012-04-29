<?php 
# preinit
include_once(dirname(__FILE__).'/conf.php');

# init
$p = realpath($GLOBALS['docview_docpath']);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="base.css"/>
<title>docview &ndash; Index</title>
<?php
# output meta stuff
echo '<meta name="description" content="'.$GLOBALS['docview_meta_desc'].'" />';
echo '<meta name="author" content="'.$GLOBALS['docview_meta_author'].'" />';
?>
</head>
<body>
<div id="container">
<h1>Document Index in <?php echo $GLOBALS['docview_docpath']; ?></h1>
<div id="main">
<ul>
<?php
$files = glob($p.'/*');
foreach($files as $f)
{
	$ar = explode('-', basename($f, '.md'));
	echo '<li><a href="view.php?d='.basename($f, '.md').'">'.$ar[1].' (Doc #'.$ar[0].')</a></li>';
}
?>
</ul>
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