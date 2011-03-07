<?

function image_thumb_url($path)
{
  $attrs = array(
    'style'=>'border: 0px',
    'width'=>75,
    'height'=>75
  );
  $args = func_get_args();
  $attrs = assemble_attrs($attrs, $args);
  $height='';
  $width='';
  $border='';
  $filter='';
  $format='';
  $rounded='';
  $zoomcrop='&zc=1';
  
  if (array_key_exists('dropshadow',$attrs))
  {
  	$arg = $attrs['dropshadow'];
  	unset($attrs['dropshadow']);
  	$filter = "&fltr[]=drop|$arg|$arg|888888|225";
  }
  $format='png';
  if (array_key_exists('format',$attrs))
  {
  	$format = $attrs['format'];
  	unset($attrs['format']);
  }
  if (array_key_exists('width',$attrs))
  {
  	$arg = $attrs['width'];
  	unset($attrs['width']);
  	$width = "&w=$arg";
  }
  if (array_key_exists('height',$attrs))
  {
  	$arg = $attrs['height'];
  	unset($attrs['height']);
  	$height = "&h=$arg";
  }
  if (array_key_exists('border',$attrs) && $attrs['border']>=0)
  {
  	$arg = $attrs['border'];
  	unset($attrs['border']);
  	if ($arg>0)
  	{
      $border = "&fltr[]=bord|$arg|0|0|0";
    }
  }
  if (array_key_exists('rounded',$attrs) && $attrs['rounded']>0)
  {
  	$arg = $attrs['rounded'];
  	unset($attrs['rounded']);
  	$rounded = "&fltr[]=ric|$arg|$arg";
  }
  if (array_key_exists('zoomcrop',$attrs))
  {
  	$arg = $attrs['zoomcrop'];
  	unset($attrs['zoomcrop']);  	
  	if (!$arg) $zoomcrop = "";
  }

  $url = PHPTHUMB_VPATH ."/phpThumb/phpThumb.php?src=$path$width$height&far=1$border$filter$rounded&f=$format$zoomcrop";

  return $url;
}

function image_thumb($path)
{
  $attrs = array(
    'style'=>'border: 0px',
    'width'=>75,
    'height'=>75
  );
  $args = func_get_args();
  $attrs = assemble_attrs($attrs, $args);

  $height='';
  $width='';
  $border='';
  $filter='';
  $format='';
  $rounded='';
  $zoomcrop='&zc=1';
  
  if (array_key_exists('dropshadow',$attrs))
  {
  	$arg = $attrs['dropshadow'];
  	unset($attrs['dropshadow']);
  	$filter = "&fltr[]=drop|$arg|$arg|888888|225";
  }
  $format='png';
  if (array_key_exists('format',$attrs))
  {
  	$format = $attrs['format'];
  	unset($attrs['format']);
  }
  if (array_key_exists('width',$attrs))
  {
  	$arg = $attrs['width'];
  	unset($attrs['width']);
  	$width = "&w=$arg";
  }
  if (array_key_exists('height',$attrs))
  {
  	$arg = $attrs['height'];
  	unset($attrs['height']);
  	$height = "&h=$arg";
  }
  if (array_key_exists('border',$attrs) && $attrs['border']>=0)
  {
  	$arg = $attrs['border'];
  	unset($attrs['border']);
  	if ($arg>0)
  	{
      $border = "&fltr[]=bord|$arg|0|0|0";
    }
  }
  if (array_key_exists('rounded',$attrs) && $attrs['rounded']>0)
  {
  	$arg = $attrs['rounded'];
  	unset($attrs['rounded']);
  	$rounded = "&fltr[]=ric|$arg|$arg";
  }
  if (array_key_exists('zoomcrop',$attrs))
  {
  	$arg = $attrs['zoomcrop'];
  	unset($attrs['zoomcrop']);  	
  	if (!$arg) $zoomcrop = "";
  }

  $url = PHPTHUMB_VPATH ."/phpThumb/phpThumb.php?src=$path$width$height&far=1$border$filter$rounded&f=$format$zoomcrop";

  $args = array($url);
  foreach($attrs as $k=>$v)
  {
    $args[] = $k;
    $args[] = $v;
  }
  return call_user_func_array('image_tag', $args);
}



?>