<?php
$rut = '../';
require_once($rut.'web/config/constant.php');
//-------------------------------
$utm_id = 1;
$utm_campaign = 'CloidFlare';
$utm_source = 'vac.net.pe';
$utm_medium = 'redirect';
$utm_content = 'nombramiento en nuestra web';
$utm_term = 'redireccionamiento';
$fbclid = '';
$gclid = '';
//-------------------------------
$txt = URL.'?utm_id='.urlencode($utm_id).'&utm_campaign='.urlencode($utm_campaign).'&utm_source='.urlencode($utm_source).'&utm_medium='.urlencode($utm_medium).'&utm_content='.urlencode($utm_content).'&utm_term='.urlencode($utm_term).'&fbclid='.urlencode($fbclid).'&gclid='.urlencode($gclid);
//-------------------------------
echo $txt;
///UPDATE TABLE1 SET CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."', CAMPO1='".$campo1."' WHERE nombre LIKE '%carlos%' AND id_tabla=3