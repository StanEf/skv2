<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");?><?

global $USER;
$user_groups = $USER->GetUserGroupArray();
if (!in_array(1, $user_groups)){
	echo "нет доступа";
	die();
}
?>

<?
if(isset($_GET["action"]) && $_GET["action"] == "delete_object"){
	$APPLICATION->IncludeComponent(
		"skv:lc.object.delete",
		"",
		Array()
	);
	$_REQUEST["ID"] = "";
	$_REQUEST["action"] = "";
	$_REQUEST["sessid"] = "";
	?>
	<script>
		
		console.log(window.location.href);
		window.history.pushState(window.location.href, "Title", "/lc/objects.php");
	</script>
	<?
}
?>

<?$APPLICATION->IncludeComponent(
	"skv:lc.orm.getlist.object2",
	"",
Array()
);?>

