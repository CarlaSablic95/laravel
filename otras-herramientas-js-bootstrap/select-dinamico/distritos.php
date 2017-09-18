<?php
$charset=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');
$link=new PDO('mysql:host=localhost;dbname=combobox2','root','',$charset);
$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

$distrito = $_POST['distrito'];
$sql='SELECT IdDistrito,IdProvincia,Distrito FROM distritos WHERE IdProvincia='.$distrito;
$stmt=$link->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $fila) {
    ?>
    <option value="<?php echo $fila['IdDistrito']; ?>"><?php echo $fila['Distrito']; ?></option>
    <?php
}
?>