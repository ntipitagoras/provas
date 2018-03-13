<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to CodeIgniter</title>
</head>
<body>

<div id="container">
  <h1>Enviar e-mail com CodeIgniter</h1>

  <div id="body">

    <form method="POST" action="http://www.pitagorasslz.com.br/provas/email/enviar">

      <span id="from">Nome</span>
      <input id="textDe" type="text" name="txt_nome"/>

      <span id="destiny">E-mail de Destino:</span>
      <input id="textPara" type="text" name="txt_para"/>

      <span id="text">Mensagem:</span>
      <textarea name="txt_msg" id="textMsg" rows=""></textarea>

      <input id="ButtonEnviar" type="submit" name="env" value="Enviar E-mail"/>

    </form>

  </div>

</div>

</body>
</html>