<?php

###############################################################
# File Download 1.3
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
###############################################################
# Sample call:
#    download.php?f=phptutorial.zip
#
# Sample call (browser will try to save with new file name):
#    download.php?f=phptutorial.zip&fc=php123tutorial.zip
###############################################################

// Allow direct file download (hotlinking)?
// Empty - allow hotlinking
// If set to nonempty value (Example: example.com) will only allow downloads when referrer contains this text
define('ALLOWED_REFERRER', '');

// Download folder, i.e. folder where you keep all files for download.
// MUST end with slash (i.e. "/" )
define('BASE_DIR','expo/upload;media/;files/;');

// log downloads?  true/false
define('LOG_DOWNLOADS',true);

// log file name
define('LOG_FILE','downloads.log');

// Allowed extensions list in format 'extension' => 'mime type'
// If myme type is set to empty string then script will try to detect mime type 
// itself, which would only work if you have Mimetype or Fileinfo extensions
// installed on server.
$allowed_ext = array (

  // archives
'ai' => 'application/postscript',
'aif' => 'audio/x-aiff',
'aifc' => 'audio/x-aiff',
'aiff' => 'audio/x-aiff',
'aiff'=> 'audio/x-aiff',
'asc' => 'text/plain',
'atom' => 'application/atom+xml',
'au' => 'audio/basic',
'avi' => 'video/x-msvideo',
'bcpio' => 'application/x-bcpio',
'bin' => 'application/octet-stream',
'bmp' => 'image/bmp',
'cdf' => 'application/x-netcdf',
'cgm' => 'image/cgm',
'class' => 'application/octet-stream',
'cpio' => 'application/x-cpio',
'cpt' => 'application/mac-compactpro',
'csh' => 'application/x-csh',
'css' => 'text/css',
'dcr' => 'application/x-director',
'dif' => 'video/x-dv',
'dir' => 'application/x-director',
'djv' => 'image/vnd.djvu',
'djvu' => 'image/vnd.djvu',
'dll' => 'application/octet-stream',
'dmg' => 'application/octet-stream',
'dms' => 'application/octet-stream',
'doc' => 'application/msword',
'docx' => 'application/msword',
'dtd' => 'application/xml-dtd',
'dv' => 'video/x-dv',
'dv' => 'video/x-dv',
'dvi' => 'application/x-dvi',
'dxr' => 'application/x-director',
'eps' => 'application/postscript',
'etx' => 'text/x-setext',
'exe' => 'application/octet-stream',
'ez' => 'application/andrew-inset',
'gif' => 'image/gif',
'gram' => 'application/srgs',
'grxml' => 'application/srgs+xml',
'gtar' => 'application/x-gtar',
'hdf' => 'application/x-hdf',
'hqx' => 'application/mac-binhex40',
'htm' => 'text/html',
'html' => 'text/html',
'ice' => 'x-conference/x-cooltalk',
'ico' => 'image/x-icon',
'ics' => 'text/calendar',
'ief' => 'image/ief',
'ifb' => 'text/calendar',
'iges' => 'model/iges',
'igs' => 'model/iges',
'jnlp' => 'application/x-java-jnlp-file',
'jp2' => 'image/jp2',
'jpe' => 'image/jpeg',
'jpeg' => 'image/jpeg',
'jpg' => 'image/jpeg',
'js' => 'application/x-javascript',
'kar' => 'audio/midi',
'key' => 'application/x-iWork-keynote-sffkey',
'kth'    => 'application/x-iWork-keynote-sffkth',
'latex' => 'application/x-latex',
'lha' => 'application/octet-stream',
'lzh' => 'application/octet-stream',
'm3u' => 'audio/x-mpegurl',
'm4a' => 'audio/mp4a-latm',
'm4b' => 'audio/mp4a-latm',
'm4p' => 'audio/mp4a-latm',
'm4u' => 'video/vnd.mpegurl',
'm4v' => 'video/mpeg',
'm4v' => 'video/x-m4v',
'mac' => 'image/x-macpaint',
'man' => 'application/x-troff-man',
'mathml' => 'application/mathml+xml',
'me' => 'application/x-troff-me',
'mesh' => 'model/mesh',
'mid' => 'audio/midi',
'midi' => 'audio/midi',
'mif' => 'application/vnd.mif',
'mov' => 'video/quicktime',
'movie' => 'video/x-sgi-movie',
'mp2' => 'audio/mpeg',
'mp3' => 'audio/mpeg',
'mp4' => 'video/mp4',
'mp4' => 'video/mpeg',
'mpe' => 'video/mpeg',
'mpeg' => 'video/mpeg',
'mpg' => 'video/mpeg',
'mpga' => 'audio/mpeg',
'ms' => 'application/x-troff-ms',
'msh' => 'model/mesh',
'mxu' => 'video/vnd.mpegurl',
'nc' => 'application/x-netcdf',
'numbers' => 'application/x-iwork-numbers-sffnumbers',
'oda' => 'application/oda',
'ogg' => 'application/ogg',
'pages'   => 'application/x-iwork-pages-sffpages',
'pbm' => 'image/x-portable-bitmap',
'pct' => 'image/pict',
'pdb' => 'chemical/x-pdb',
'pdf' => 'application/pdf',
'pgm' => 'image/x-portable-graymap',
'pgn' => 'application/x-chess-pgn',
'pic' => 'image/pict',
'pict' => 'image/pict',
'pictclipping' => 'image/pict',
'png' => 'image/png',
'pnm' => 'image/x-portable-anymap',
'pnt' => 'image/x-macpaint',
'pntg' => 'image/x-macpaint',
'ppm' => 'image/x-portable-pixmap',
'ppsx' => 'application/vnd.ms-powerpoint',
'ppt' => 'application/vnd.ms-powerpoint',
'pptx' => 'application/vnd.ms-powerpoint',
'ps' => 'application/postscript',
'qt' => 'video/quicktime',
'qti' => 'image/x-quicktime',
'qtif' => 'image/x-quicktime',
'ra' => 'audio/x-pn-realaudio',
'ram' => 'audio/x-pn-realaudio',
'ras' => 'image/x-cmu-raster',
'rdf' => 'application/rdf+xml',
'rgb' => 'image/x-rgb',
'rm' => 'application/vnd.rn-realmedia',
'rm' => 'audio/x-pn-realaudio',
'roff' => 'application/x-troff',
'rtf' => 'text/rtf',
'rtx' => 'text/richtext',
'sgm' => 'text/sgml',
'sgml' => 'text/sgml',
'sh' => 'application/x-sh',
'shar' => 'application/x-shar',
'silo' => 'model/mesh',
'sit' => 'application/x-stuffit',
'skd' => 'application/x-koan',
'skm' => 'application/x-koan',
'skp' => 'application/x-koan',
'skt' => 'application/x-koan',
'smi' => 'application/smil',
'smil' => 'application/smil',
'snd' => 'audio/basic',
'so' => 'application/octet-stream',
'spl' => 'application/x-futuresplash',
'src' => 'application/x-wais-source',
'sv4cpio' => 'application/x-sv4cpio',
'sv4crc' => 'application/x-sv4crc',
'svg' => 'image/svg+xml',
'swf' => 'application/x-shockwave-flash',
't' => 'application/x-troff',
'tar' => 'application/x-tar',
'tcl' => 'application/x-tcl',
'tex' => 'application/x-tex',
'texi' => 'application/x-texinfo',
'texinfo' => 'application/x-texinfo',
'tif' => 'image/tiff',
'tiff' => 'image/tiff',
'tr' => 'application/x-troff',
'tsv' => 'text/tab-separated-values',
'txt' => 'text/plain',
'ustar' => 'application/x-ustar',
'vcd' => 'application/x-cdlink',
'vrml' => 'model/vrml',
'vxml' => 'application/voicexml+xml',
'wav' => 'audio/x-wav',
'wbmp' => 'image/vnd.wap.wbmp',
'wbmxl' => 'application/vnd.wap.wbxml',
'wml' => 'text/vnd.wap.wml',
'wmlc' => 'application/vnd.wap.wmlc',
'wmls' => 'text/vnd.wap.wmlscript',
'wmlsc' => 'application/vnd.wap.wmlscriptc',
'wrl' => 'model/vrml',
'xbm' => 'image/x-xbitmap',
'xht' => 'application/xhtml+xml',
'xhtml' => 'application/xhtml+xml',
'xls' => 'application/vnd.ms-excel',
'xml' => 'application/xml',
'xpm' => 'image/x-xpixmap',
'xsl' => 'application/xml',
'xslt' => 'application/xslt+xml',
'xul' => 'application/vnd.mozilla.xul+xml',
'xwd' => 'image/x-xwindowdump',
'xyz' => 'chemical/x-xyz',
'zip' => 'application/zip'

);



####################################################################
###  DO NOT CHANGE BELOW
####################################################################

// If hotlinking not allowed then make hackers think there are some server problems
if (ALLOWED_REFERRER !== ''
&& (!isset($_SERVER['HTTP_REFERER']) || strpos(strtoupper($_SERVER['HTTP_REFERER']),strtoupper(ALLOWED_REFERRER)) === false)
) {
  die("Internal server error. Please contact system administrator.");
}

// Make sure program execution doesn't time out
// Set maximum script execution time in seconds (0 means no limit)
set_time_limit(0);

if (!isset($_GET['f']) || empty($_GET['f'])) {
  die("Please specify file name for download.");
}

// Get real file name.
// Remove any path info to avoid hacking by adding relative path, etc.
if(strstr($_GET['f'],".."))
	die("Not valid");
	
$fname = $_GET['f'];

// Check if the file exists
// Check in subfolders too
function find_file ($dirname, $fname, &$file_path) {

  $dir = opendir($dirname);
  if(file_exists($dirname.$fname))
	$file_path = $dirname.$fname;
	
  while ($file = readdir($dir)) {
    if (empty($file_path) && $file != '.' && $file != '..') {
      if (is_dir($dirname.'/'.$file)) {
        find_file($dirname.'/'.$file, $fname, $file_path);
      }
      else {
        if (file_exists($dirname.'/'.$fname)) {
          $file_path = $dirname.'/'.basename($fname);
          return;
        }
      }
    }
  }

} // find_file

// get full file path (including subfolders)
$file_path = '';
$tokens = explode(";",BASE_DIR);

foreach($tokens as $token){
	if(!$file_path){
		find_file($token, $fname, $file_path);
	}
}

if (!is_file($file_path)) {
  die("File does not exist. Make sure you specified correct file name."); 
}

// file size in bytes
$fsize = filesize($file_path); 

// file extension
$fext = strtolower(substr(strrchr($fname,"."),1));

// check if allowed extension
if (!array_key_exists($fext, $allowed_ext)) {
  die("Not allowed file type."); 
}

// get mime type
if ($allowed_ext[$fext] == '') {
  $mtype = '';
  // mime type is not set, get from server settings
  if (function_exists('mime_content_type')) {
    $mtype = mime_content_type($file_path);
  }
  else if (function_exists('finfo_file')) {
    $finfo = finfo_open(FILEINFO_MIME); // return mime type
    $mtype = finfo_file($finfo, $file_path);
    finfo_close($finfo);  
  }
  if ($mtype == '') {
    $mtype = "application/force-download";
  }
}
else {
  // get mime type defined by admin
  $mtype = $allowed_ext[$fext];
}

// Browser will try to save file with this filename, regardless original filename.
// You can override it if needed.

if (!isset($_GET['fc']) || empty($_GET['fc'])) {
  $asfname = basename($fname);
}
else {
  // remove some bad chars
  $asfname = str_replace(array('"',"'",'\\','/'), '', $_GET['fc']);
  if ($asfname === '') $asfname = 'NoName';
}

// set headers
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Type: $mtype");
header("Content-Disposition: attachment; filename=\"$asfname\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: " . $fsize);

// download
// @readfile($file_path);
$file = @fopen($file_path,"rb");
if ($file) {
  while(!feof($file)) {
    print(fread($file, 1024*8));
    flush();
    if (connection_status()!=0) {
      @fclose($file);
      die();
    }
  }
  @fclose($file);
}

// log downloads
if (!LOG_DOWNLOADS) die();

$f = @fopen(LOG_FILE, 'a+');
if ($f) {
  @fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']."  ".$fname."\n");
  @fclose($f);
}

?>