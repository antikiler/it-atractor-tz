<?php
session_start();
if ($_SESSION['public']==1) {
  require "browse.php";
}else{
?>
<script type="text/javascript">
	window.location="/site/show_404";
</script>
<?php
}

?>
