  <?php session_start();
      
  if (!isset($_GET['go'])){
    echo "<form>
      Login: <input type=text name=username>
      Password: <input type=password name=password>
      <input type=submit name=go value=Go> </form>";
  }
  else {
    $_SESSION['username']=$_GET['username'];
    
    $_SESSION['password']=$_GET['password'];
    
      if ($_GET['username']=="pit" && $_GET['password']=="pit") {

          Header("Location: secret_info.php");
          
      } else echo "Неверный ввод, попробуйте еще раз<br>";
  } print_r($_SESSION);
  ?>
