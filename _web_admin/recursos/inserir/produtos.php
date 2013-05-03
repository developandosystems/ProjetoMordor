<?php
ob_start();
include "conf/conexao.php";
$url_image = "";
if (isset($_POST['nomeproduto'])) {
    $grava_nome = $_POST['nomeproduto'];
}
if (isset($_POST['desproduto'])) {
    $grava_des = $_POST['desproduto'];
}
if (isset($_POST['valor'])) {
    $grava_valor = $_POST['valor'];
}
if (isset($_POST['quantidade'])) {
    $quantidade = $_POST['quantidade'];
}
$atualizado = "Atualizado com sucesso";
$deletado = "Apagado com sucesso";

if (isset($_GET['case'])) {
    if ($_GET['case'] == "cadastraimagens") {
        if (isset($_POST['upload'])) {
            $pasta = '../uploads/produtos';
            $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');
            $img = $_FILES['img'];
            $tmp = $img['tmp_name'];
            $name = $img['name'];
            $type = $img['type'];

            function upload($tmp, $nome, $largura, $pasta) {
                $img = imagecreatefromjpeg($tmp);
                $x = imagesx($img);
                $y = imagesy($img);
                $altura = ($largura * $y) / $x;

                $nova = imagecreatetruecolor($largura, $altura);
                imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
                imagejpeg($nova, "$pasta/$nome");
                imagedestroy($nova);
                imagedestroy($img);

                return($nome);
            }

            if (!empty($name) && in_array($type, $permitido)) {
                $nome = 'produtos-' . md5(uniqid(rand(), true)) . '.jpg';
                $url_image = ("$pasta/$nome");
                //echo $url_image;
                upload($tmp, $nome, 555, $pasta);
                
                $query = sprintf("INSERT INTO produtos (cd_produto,nm_produto, des_produto, preco,url, data_cadastro) VALUES (NULL,'%s','%s','%s','%s',now())", mysql_real_escape_string($grava_nome), mysql_real_escape_string($grava_des), mysql_real_escape_string($grava_valor), mysql_real_escape_string($url_image));
                $result = mysql_query($query);
            }else
                echo '<div id="mensagem"><h5>Arquivo de imagem não aceito! Tente inserindo uma imagem JPG</h5></div>';
        }
       
      

        if (!$result) {
            die('<div id="mensagem"><h5>Cadastro não pode ser realizado devido ao erro:</h5>'. mysql_error().'</div>' );
        }else{
            $item_produto = mysql_query("SELECT cd_produto FROM produtos ORDER BY cd_produto DESC LIMIT 1");
                 if (!$item_produto)
                       die('<div id="mensagem"><h5>Compra de número:'.mysql_error().'</h5></div>');
                 else  { 
                     while ($linha = mysql_fetch_array($item_produto)) {
                            $Produto_codigo = $linha['cd_produto'];
                        }
                 
                    $item_estoque = mysql_query("INSERT INTO estoque_itens_comprados(Produtos_cd_produto, Compras_cd_compra, dt_compra, quantidade_estoque, preco_compra)
                     VALUES ('" . $Produto_codigo . "','" . $_SESSION['MMnovacompra'] . "',now()," . $quantidade . "," . $grava_valor . ")");
                 }
               
             echo '<div id="mensagem"><h5>Cadastro realizado com sucesso!</h5></div>';
        
             
        }  //quer dizer que a imagem foi cadastrada com sucesso      
    }
}//se get case cadastrar
?>
<form enctype="multipart/form-data" method="post" action="nova-compra.php?case=cadastraimagens" id="conForm" name="upload">
    <label>Nome do produto:</label>
    <input type="text" name="nomeproduto" class="m-wrap fld241-green" placeholder="Nome do produto" title="Nome do produto"/>

    <label>Descrição:</label>
    <input type="text" name="desproduto" class="m-wrap" placeholder="Descrição do produto" title="Descrição do produto"/>	

    <label>Valor:</label>
    <input type="text" class="m-wrap" name="valor"  placeholder="Valor do produto" required="required" onkeydown="Mascara(this,Area);" onkeypress="Mascara(this,Area);" onkeyup="Mascara(this,Area);" />

     <label>Quantidade:</label>
    <input type="text" class="m-wrap" name="quantidade"  placeholder="Quantidade" required="required" class="m-wrap fld534" id="int" onkeydown="Mascara(this,Integer);" onkeypress="Mascara(this,Integer);" onkeyup="Mascara(this,Integer);"/>

    <?php
    include ('foto-produto.php');
    ?>

    <span class="req">* Campos requeridos</span>
    <input type="submit" name="upload" class="m-btn purple rnd" value="Cadastrar outro">

</form>

