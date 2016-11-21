<?php
session_start();
if (isset($_SESSION["manager"])) {
    header("location: inventory_list.php");
    exit();
}
?>
<?php
if (isset($_POST["username"]) && isset($_POST["password"]))
{
  $db_host = "sql.s24.vdl.pl";
  $db_username = "bleizer_rafal";
  $db_pass = "7uDntXzn";
  $db_name = "bleizer_rafal";
  mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
  mysql_select_db("$db_name") or die ("no database");
  $manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
  $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
  $sql = mysql_query("SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1");
  $existCount = mysql_num_rows($sql);
  if ($existCount == 1)
  {
    while($row = mysql_fetch_array($sql))
    {
      $id = $row["id"];
    }
    $_SESSION["id"] = $id;
    $_SESSION["manager"] = $manager;
    $_SESSION["password"] = $password;
    header("location: inventory_list.php");
    exit();
  }
  else
  {
    header("Location: blad_logowania_admin.php");
  }
}
?>
