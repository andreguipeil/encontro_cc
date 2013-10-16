<?php

if (in_array($_SERVER['HTTP_HOST'] == "http://www.ufpel.edu.br/faurb/laburb/evento"){
	header("Location: http://ufpel.edu.br/faurb/laburb/evento/index.html");	
}

if ( in_array($_SERVER['HTTP_HOST'], array( 'localhost', 'servidor' )) ):
	$baseurl = 'http://'.$_SERVER['HTTP_HOST'].'/laburb/';
	$root = $_SERVER['DOCUMENT_ROOT'].'/laburb/';
/*
elseif ($_SERVER['HTTP_HOST'] == 'faurb.ufpel.edu.br'):
	$baseurl = 'http://www.ufpel.edu.br/faurb/laburb/'; 
	$root = '/home/www/html/faurb/laburb/';
//*/
else :
	$baseurl = 'http://www.ufpel.edu.br/faurb/laburb/'; 
	$root = $_SERVER['DOCUMENT_ROOT'].'faurb/laburb/';
endif;
?>
<?php

//echo '<!-- '.$baseurl.' - '.$root.' | '.$_SERVER['HTTP_HOST'].' - '.$_SERVER['DOCUMENT_ROOT'].' -->'."\n";

$id = isset($_GET['id']) ? $_GET['id'] : null;
$ext = isset($_GET['ext']) ? $_GET['ext'] : null;
$offset = isset($_GET['offset']) ? $_GET['offset'] : null;
$adm = isset($_GET['adm']) ? $_GET['adm'] : null;
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : null;


$q = isset($_GET['q']) ? $_GET['q'] : null;
$qw = $q;
$q = str_replace('-',' ',$q);
$tabela = isset($_GET['tab']) ? $_GET['tab'] : null;

$pagCAN = isset($pagina) && !empty($pagina) ? $pagina : '';
$extCAN = isset($ext) && !empty($ext) ? '/'.$ext : '';
$idCAN  = isset($id) && !empty($id) ? '/'.$id : '';

include './set/config.php';
include './set/slug.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <title>Labor&aacute;t&oacute;rio de Urbanismo FAURB - UFPel</title>
  <meta name="title" content="<?php echo $titpag; ?>" />
  <meta name="description" content="<?php echo $descpag; ?>" />
  <meta name="keywords" content="<?php echo $keypag; ?>" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta name="robots" content="all" />
  <meta name="language" content="pt-br" />

  <?php echo '<base href="'.$baseurl.'" />'."\n"; ?>
  <link rel="canonical" href="<?php echo $baseurl.$pagCAN.$extCAN.$idCAN; ?>" />

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <!-- <link rel="alternate" type="application/rss+xml" title="RSS2.0 - �ltimas Not�cias" href="feed.php" /> -->

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/sigales.js"></script>
  <style type="text/css" media="all">
  @import "css/site.css";
  @import "css/site-head.css";
  @import "css/pessoa.css";
  @import "css/produto.css";
  </style>
</head>

<body>

<div id="total">
<?php
$path_hom = 'bg/';
if ($dir_hom = @opendir($path_hom)) {
while (($file_hom = readdir($dir_hom)) !== false) {
    if($file_hom !== ".." && $file_hom !== "."){
      if(is_file($path_hom.$file_hom)){
        $arq_hom['file'][] = $file_hom;
        $arq_hom['f_date'][] = filemtime($path_hom.$file_hom);
        clearstatcache();
      }
     }
  }
  closedir($dir_hom);
}
//print_r($arq_hom['file']);
$imgRand = array_rand($arq_hom['file'], 1);
//print_r($imgRand);
//echo $arq_hom['file'][$imgRand];
?>


<div id="imgRand" style="background:url('bg/<?php echo $arq_hom['file'][$imgRand]; ?>') center right no-repeat;">
<div id="cabecalho">

<a href="<?php echo $baseurl; ?>" class="logo"><img src="img/logo-site.jpg" alt="Logo-LABURB" title="Laboratorio de Urbanismo LABURB - UFPel"/></a>

<div id="banner">
<a href="http://www.ufpel.edu.br/faurb/laburb/produto/saci-simulador-do-ambiente-da-cidade/238"><img src="img/banner-468x60.jpg" alt="SACI Simulador do Ambiente da Cidade" title="Banner 468x60" /></a></div>

</div><!--#cabecalho-->
</div><!--#imgRand-->

<div id="caminho">
<fieldset>    
<form name="busca" method="get" action="javascript:BuscaSite();" >
	<input type="hidden" name="root" id="root" value="<?php echo $baseurl; ?>

" />
    <input type="text" name="q" id="q" value="<?php echo $qw; ?>" /> 
    <select name="tabela">
    	<option value="produtos">Selecione aqui</option>
    	<option value="pessoas" <?php if($tabela=='pessoas'){ echo 'selected="selected"'; } ?> >Pessoas</option>
    	<option value="grupos" <?php if($tabela=='grupos'){ echo 'selected="selected"'; } ?>>Grupos</option>
    	<option value="projetos" <?php if($tabela=='projetos'){ echo 'selected="selected"'; } ?>>Projetos</option>
    	<option value="produtos" <?php if($tabela=='produtos'){ echo 'selected="selected"'; } ?>>Produtos</option>
    	<option value="noticias" <?php if($tabela=='noticias'){ echo 'selected="selected"'; } ?>>Noticias</option>
    	<option value="paginas" <?php if($tabela=='paginas'){ echo 'selected="selected"'; } ?>>Paginas</option>
    </select> 
    <input type="submit" value="ok" class="buscar"  />
    </form>
</fieldset>


<ol>
<li><a href="#" title="Mapa do Site">Mapa do Site</a></li>
<li><a href="geren" title="Login">Login</a></li>
</ol>

</div><!--#caminho-->



<div id="geral">


<div id="centro">
<div id="menu" class="clear">
<ol>
<li><a href="<?php echo $baseurl; ?>" title="P�gina Inicial">P&aacute;gina Inicial</a></li>
<li><a href="quem-somos" title="Quem Somos">Quem Somos</a></li>
<li><a href="noticias" title="Not�cias">Not&iacute;cias</a></li>
<li><a title="Pessoas">Pessoas</a>
	<ol>
<?php        
$sPessoas = " SELECT tipo FROM tipos LEFT JOIN especies ON (tipos.idEspecie=especies.id) WHERE especie LIKE 'integra%' ";
$qPessoas = mysql_query($sPessoas);
while($dy = mysql_fetch_array($qPessoas) ) { 
echo '<li><a href="pessoas/'.subs($dy['tipo']).'" title="'.$dy['tipo'].'">'.$dy['tipo'].'</a></li>';
}
?>
    </ol>
</li>
<li><a href="grupos/" title="Grupos">Grupos</a></li>
<li><a href="projetos/" title="Projetos">Projetos</a></li>
<li><a href="produtos/" title="Produtos">Produtos</a></li>
<li><a href="links/" title="Links">Links</a></li>
<li><a href="contato/" title="Contato">Contato</a></li>
<li> </li>
<li class="extra">Atalhos </li>

<?php
$sPagina = " SELECT * FROM noticias WHERE ativo=1 AND tipo>=1 AND home=1 ORDER BY titulo ";
//echo $sPagina;
$qPagina = mysql_query($sPagina);
while($d = mysql_fetch_array($qPagina)) {
if($d['tipo']==1) {
echo '<li class="extra"><a href="pagina/'.subs($d['titulo']).'" title="'.$d['titulo'].'">'.$d['titulo'].'</a></li>';
} else {
echo '<li class="extra"><a href="'.$d['subtitulo'].'" title="'.$d['titulo'].'">'.$d['titulo'].'</a></li>';
}
}
?>
</ol>
<br />

</div><!--#menu-->


<div id="conteudo">


<?php if (isset($pagina)) {
$pageid = $root.'php/'.strip_tags($pagina).'.php';
if (!@include($pageid)){ echo ' <h1><a href="'.$baseurl.'">Ops! P&aacute;gina n&atilde;o encontrada.</a></h1> <br class="clear" />';}
} else {
$pageid = $root.'/php/index.php';
include ($pageid); }
?>


</div><!--#conteudo-->

</div><!--#centro-->


<div id="coluna">
<em><a href="http://www.ufpel.edu.br/prg/sisbi"><img src="img/banner-biblioteca.jpg" alt="Biblioteca"  /></a></em>
<strong><a href="http://www.ufpel.edu.br/faurb/laburb/pagina/projeto-ciclofaixa/"><img src="img/banner-ciclo-faixa.png" alt="Ciclo Faixa"  /></a></strong>
<em><img src="img/banner-espaco.jpg" alt="Banner"  /></em></div>
<!--#coluna-->



<br class="clear" />
<br class="clear" />

<div id="rodape">
<div class="bgFFF">
<div id="info" class="clear">
  <p class="left">
  <a href="http://www.cnpq.br"><img src="img/cnpq.jpg" alt="Financiador CNPq" /></a>
  <a href="http://www.ufpel.edu.br"><img src="img/ufpel.jpg" alt="UFPEL" /></a>
  <a href="http://www.ufpel.edu.br/faurb/prograu/"><img src="img/prograu.jpg" alt="PROGRAU" /></a>
  <a href="http://www.ufpel.edu.br/faurb"><img src="img/faurb.jpg" alt="FAURB" /></a> </p>
  <p class="right tright"><br />
    Laborat&oacute;rio de Urbanismo - FAURB - UFPel<br />
    Rua Benjamim Constant, 1117. Pelotas/RS - Brasil<br />
    Telefone 53 3284-5500 - Email: laburb@ufpel.edu.br<br />
    <br />
    <a href="http://www.tavoladesign.com">Site por T&aacute;vola</a></p>
  <br class="clear" />
</div>

</div>
</div><!--#rodape-->
            
           
            
</div><!--#geral-->

</div><!--#geral-->



<?php if ($_SERVER['HTTP_HOST'] == 'www.ufpel.edu.br' || $_SERVER['HTTP_HOST'] == 'ufpel.edu.br'){ ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>  <noscript><p> Labor&aacute;t&oacute;rio de Urbanismo FAURB - UFPel - GA </p> </noscript>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-354065-44");
pageTracker._trackPageview();
} catch(err) {}</script>  <noscript><p> Labor&aacute;t&oacute;rio de Urbanismo FAURB - UFPel - GA II</p> </noscript>

<script type="text/javascript" src="http://sigales.com/clickheat/js/clickheat.js"></script>
<noscript><p> Labor&aacute;t&oacute;rio de Urbanismo FAURB - UFPel  </p> </noscript>
<script type="text/javascript"><!--
clickHeatSite = 'Tavola>LabUrb';clickHeatGroup = '<?php if(empty($pagina)){echo 'home';}else{echo $pagina;}?>';clickHeatServer = 'http://sigales.com/clickheat/click.php';initClickHeat(); //--> </script>
<noscript><p> Labor&aacute;t&oacute;rio de Urbanismo FAURB - UFPel </p> </noscript>
<?php } ?>


</body>
</html>
