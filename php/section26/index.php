<?php
require('lib/print.php');
require('view/top.php');
?>
<a href="create.php">create</a>
<?php if (isset($_GET['id'])) { ?>
  <!-- 리스트 목록을 클릭하고 주소에 해당 아이디가 있을 경우를 의미한다. -->
  <a href="update.php?id=<?php echo $_GET['id']; ?>">update</a>
  <form action="delete_process.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <input type="submit" value="delete">
  </form>
<?php } ?>
<h2>
  <?php
  print_title();
  ?>
</h2>
<?php
print_description();
?>
<?php
require('view/bottom.php')
?>