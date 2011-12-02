<?
require_once dirname(__FILE__) . '/../config.php';
?>	
	
	<table border="2px">
	<tr><td>_SERVER[DOCUMENT_ROOT]: </td><td><?=$_SERVER['DOCUMENT_ROOT']?></td></tr>
	<tr><td>root url: </td><td><?=ROOT_URL?></td></tr>
	<tr><td>root path: </td><td><?=ROOT_PATH?></td></tr>
	<tr><td>web url: </td><td><?=WEB_URL?></td></tr>
	<tr><td>web path: </td><td><?=WEB_PATH?></td></tr>
	<tr><td>file url: </td><td><?=FILES_URL?></td></tr>
	<tr><td>file path: </td><td><?=FILES_PATH?></td></tr>
	</table>
	
	<?
		mkdir(WEB_PATH . "/test");
	?>