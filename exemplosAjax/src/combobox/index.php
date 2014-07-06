
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Teste Ajax</title>
    <meta charset="UTF-8" />
    <script type="text/javascript" language="javascript"src="../../../../jquery1.11.1/jqueryUncom.js"></script>

  </head>
    <style>
      label {
        display:block;
      }
      label span {
        font-weight:bold;
        display:block;
      }
      select {
        width:150px;
      }
    </style>
  </head>
<body >
  <form name="frm_country" id="frm_country">
    <h1>Localizações</h1>
    <label><span>País:</span>
      <select name="pais" id="pais">
      <option value="0" id="pais_0">--País--</option>
      </select>
    </label>
    <label><span>Estado:</span>
      <select name="estado" id="estado"><option value="0">--Estado--</option></select>
    </label>
    <label><span>Cidade:</span>
     <select name="cidade" id="cidade"><option value="0">--Cidade--</option></select>
    </label>
    <label><span>Bairro:</span>
      <select name="bairro" id="bairro"><option value="0">--Bairro--</option></select>
    </label>
    <br />
    <label><input type="submit" value="Procurar"  />
  </form>
  <div id="teste"></div>
<?php
 /* if ($_POST) {

   echo "<pre>";
   print_r($_POST);
   echo"</pre>";
  }*/
?>

<script type="text/javascript" language="javascript" src="testeAjax.js"></script>
  </body>


</html>
