<?php

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

if (isset($this->dados['form'])) {
    $valueForm = $this->dados['form'];
    extract($valueForm);
}

echo "<h2>Cadastro de Cliente</h2>";

if(isset($_SESSION['msg'])){
    echo "<h3 style='color: red;'>". $_SESSION['msg'] ."</h3><br>";
    unset($_SESSION['msg']);
}
?>

<form method="POST" action="" style='color: black;'>
    <label>Nome Completo:</label><br>
   <input name="name" type="text" placeholder="Nome completo" value="<?php if(isset($name)) { echo $name; } ?>"><br><br>
   
   <label>Endereço:</label><br>
   <input name="address" type="text" placeholder="Endereço" value="<?php if(isset($address)) { echo $address;}?>" readonly><br><br>
      
   <label>Nº:</label><br>
   <input name="number_address" type="text" placeholder="Número" value="<?php if(isset($number_address)) { echo $number_address;}?>"><br><br>

   <label>Bairro:</label><br>
   <input name="district" type="text" placeholder="Bairro" value="<?php if(isset($district)) { echo $district;}?>" readonly><br><br>
   
   <label>CEP: </label><br>
   <input name="zip_code" type="text" placeholder="CEP" value="<?php if(isset($zip_code)) { echo $zip_code;}?>"><br><br>
   
   <label>Cidade:</label><br>
   <input name="city" type="text" placeholder="Cidade" value="<?php if(isset($city)) { echo $city;}?>" readonly><br><br>
   
   <label>UF:</label><br>
   <input name="fu" type="text" placeholder="Estado" value="<?php if(isset($fu)) { echo $fu;}?>" readonly><br><br>
   

   <input name="CreateNewClint" type="submit" value="Salvar">
</form>