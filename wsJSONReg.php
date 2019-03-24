<!--
    Luis Adolfo Pimentel Colon | @lapc18 | @devlegnd | WebService
    Web Service for save the info of friends from android app by lapc18 - devlegnd
    App_get{
        Documento
        Nombre
        Apellido
        Descripcion
    }
-->

<?PHP
  $hostname = "lapc18.local";
  $databaseName = "db_amigos";
  $userName_host = "root";
  $pass_host = "";
  $json = array();

  if(isset($_GET["documento"]) && isset($_GET["nombre"]) && isset($_GET["apellido"]) && isset($_GET["descripcion"])){
    $documento = $_GET("documento");
    $nombre = $_GET("nombre");
    $apellido = $_GET("apellido");
    $descripcion = $_GET("descripcion");

    $cnn = mysqli_connect($hostname, $userName_host, $pass_host, $databaseName);
    $query_insert = "insert into table Personas(Nombre, Apellido, Descripcion, Documento) values ('{$nombre}', '{$apellido}', '{$descripcion}', '{$documento}')";
    $resultset_insert = msqli_query($cnn, $query_insert);
    if($resultset_insert){
      $resultset_select = mysqli_query($cnn, "select * from Personas where Documento = '{$documento}'");
      if ($reg=mysqli_fetch_array($resultset_select)) {
        $json['Personas'][] = $reg;
      }
      mysqli_close($cnn);
      echo json_encode($json);
    } else {
      echo "not registering";
    }
  } else {
    echo "not returning";
  }
?>
