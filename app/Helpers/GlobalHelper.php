<?php

/**
 *  Name         : Global Helper.
 *  Description  : This function global.
 *  @copyright   : Badri Zaki
 *  @version     : 1.8
 *  @author      : Badri Zaki - badrizaki@gmail.com
**/

if (! function_exists('image'))
{
    function image($filename = '', $dir = '')
    {
        if ($filename != '')
        {
            $image      = url($filename);
            $path_parts = pathinfo($filename);
            $filenameWithoutExt = isset($path_parts['filename']) ? $path_parts['filename'] : '' ;
            $fileExt    = isset($path_parts['extension']) ? $path_parts['extension'] : '' ;

            if (file_exists($dir.'/'.$filename))
            {
                $image = url($dir.'/'.$filename);
            }
            else if (file_exists($filename))
            {
                $image = url($filename);
            }
            else if (count(glob($dir.'/'.$filenameWithoutExt.'.*')) > 0)
            {
                $globImage = glob($dir.'/'.$filenameWithoutExt.'.*');
                $newFilename = isset($globImage[0]) ? $globImage[0] : '';
                $image = url($newFilename);
            }
            else
            {
                $image = url('assets/img/no_image_available.jpg');
            }
            return $image;
        }
        else {
            $image = url('assets/img/no_image_available.jpg');
            return $image;
        }
    }
}

if (! function_exists('getTextLang'))
{
    function getTextLang($text = '', $textInd = '')
    {
        $domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/minnapadi';
        if (Session::get('lang', 'eng') == 'eng') {
            return str_replace('../../../files/images', $domain . '/files/images', $text);
        } else {
            if ($textInd) {
                return str_replace('../../../files/images', $domain . '/files/images', $textInd);
            } else {
                return str_replace('../../../files/images', $domain . '/files/images', $text);
            }
        }
    }
}

if (! function_exists('getTextLangConstant'))
{
    function getTextLangConstant($text = '')
    {
        if (Session::get('lang', 'eng') == 'eng') {
            return Lang::get('text.'.$text, [], 'en');
        } else {
            if (Lang::get('text.'.$text, [], 'id')) {
                return Lang::get('text.'.$text, [], 'id');
            } else {
                // return $text;
                return Lang::get('text.'.$text, [], 'en');
            }
        }
    }
}

if (! function_exists('is_dir_empty'))
{
    function is_dir_empty($dir)
    {
        if (!is_readable($dir)) return NULL; 
        return (count(scandir($dir)) == 2);
    }
}

if (! function_exists('getRoleMenu'))
{
    /**
    * Get role menu from config
    *
    * @return code
    */
    function getRoleMenu($page = 'dashboard.index')
    {
        return implode(',', Config::get('menu.role.'.$page));
    }
}

if (! function_exists('getAge'))
{
    /**
    * Get role menu from config
    *
    * @param  birthdate
    * @param  date (optiona;)
    * @return age
    */
    function getAge($birthdate = '', $date = '')
    {
        $from = new DateTime($birthdate);
        if ($date != '')
        {
            $to   = new DateTime($date);
        } else {
            $to   = new DateTime('today');
        }
        return $from->diff($to)->y;
    }
}

if (! function_exists('generateUniqueString'))
{
    /**
    * Create unique code using random and time.
    *
    * @param  string $prefix(optional)
    * @return code
    */
    function generateUniqueString($prefix = '')
    {
        // return $prefix . date('Ymds') . rand(100,999);
        return $prefix . rand(100,999) . str_replace('.', '', time(true)) . rand(100,999);
    }
}

if (! function_exists('generateTransactionCode'))
{
    /**
    * Create a transaction code.
    *
    * @param  company/transaction name
    * @return company/transaction code
    */
    function generateTransactionCode($company = '')
    {
        $transaction = new \App\Models\Customer();
        $DB = new \DB();

        $initialCompany = explode(' ', $company);
        $transactionCodePrefix = "";
        foreach ($initialCompany as $w) {
            $transactionCodePrefix .= $w[0];
        }
        // $transactionCodePrefix = $transactionCodePrefix;
        $position = 3+strlen($transactionCodePrefix);
        $result = $transaction::where($DB::raw('SUBSTRING(transactionCode,-'.$position.','.strlen($transactionCodePrefix).')'), $transactionCodePrefix)
        ->orderBy('transactionCode', 'desc')
        ->first();
        if ($result)
            $lastCounter = str_replace($transactionCodePrefix, '', $result->transactionCode);
        else
            $lastCounter = '000';

        $counter = (int)$lastCounter+1;
        if (strlen($counter) == 1)
            $counter = '00'.$counter;
        elseif (strlen($counter) == 2)
            $counter = '0'.$counter;

        $transactionCode = $transactionCodePrefix.$counter;
        return $transactionCode;
    }
}

if (! function_exists('toArray'))
{
    /**
    * JSON to Array.
    *
    * @param  string json
    * @return array
    */
    function toArray($string = '')
    {
        if (isJSON($string))
        {
            $string = json_decode($string, true);
        }
        return $string;
    }
}

if (! function_exists('isJSON'))
{
    /**
    * Check JSON
    *
    * @param  string json
    * @return boolean
    */
    function isJSON($string = '')
    {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }
}

if (! function_exists('my_array_map'))
{
    /**
    * MULTIDIMENSION array map
    *
    * @param  string 'array_map'
    * @param  array array
    * @return boolean
    */
    function my_array_map($function, $arr)
    {
        $result = array();
        foreach ($arr as $key => $val)
            $result[$key] = (is_array($val) ? $this->my_array_map($function, $val) : $function($val));

        return $result;
    }
}

if (! function_exists('parseDataSearch'))
{
    /**
    * Parameter param1=param1&param2=param2 ...
    *
    * @param  string value
    * @return array
    */
    function parseDataSearch($value = '')
    {
        $params = array();
        $valueArr = explode('&', $value);
        foreach ($valueArr as $k => $data)
        {
            $dataArr = explode("=", $data);
            if (count($dataArr) > 1)
            {
                $params[$dataArr[0]] = $dataArr[1];
            }
        }
        return $params;
    }
}

if (! function_exists('in_array_r'))
{
    /**
    * In array multidimension
    *
    * @param  string needle
    * @param  array multidimension haystack
    * @param  boolean
    * @return boolean
    */
    function in_array_r($needle, $haystack, $strict = false)
    {
        foreach ($haystack as $item)
        {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }
}

if (! function_exists('createImageFromBase64'))
{
    /**
    * Create image from base64
    *
    * @param  string base64
    * @param  integer maxSize
    * @return image.png/boolean
    */
    function createImageFromBase64($base64, $maxSize=5000)
    {
        $img = imagecreatefromstring(base64_decode($base64));
        if (!$img) return false;

        $destFile = tempnam("/tmp","transport");
        imagepng($img, $destFile);
        $info = getimagesize($destFile);
        
        if ($info[0] > 0 && $info[1] > 0 && $info['mime'])
        {
            $width_ori = $info[0];
            $height_ori = $info[1];
            $type = $info['mime'];
            
            $ratio_ori = $width_ori / $height_ori;

            $width  = $maxSize; 
            $height = $maxSize;

            # resize to height (portrait) 
            if ($ratio_ori < 1)
                $width = $height * $ratio_ori;
            # resize to width (landscape)
            else
                $height = $width / $ratio_ori;
            
            ini_set('memory_limit', '512M'); 
            
            $image = imagecreatefrompng($destFile);
            # create a new blank image
            $newImage = imagecreatetruecolor($width, $height);

            # Copy the old image to the new image
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $width_ori, $height_ori);
            imagepng($newImage, $destFile);

            imagedestroy($newImage);

            if (is_file($destFile))
            {
                $data = file_get_contents($destFile);

                # Remove the tempfile
                unlink($destFile);
                return $data;
            }
        }
        return false;
    }
}

if (! function_exists('createImageFromBase64New'))
{
    /**
    * Create image from base64
    *
    * @param  string base64
    * @param  string directory
    * @return array  [boolean, directory+filename]
    */
    function createImageFromBase64New($base64, $directory = 'files/image/base64')
    {
        $image_parts = explode(";base64,", $base64);

        if (!is_dir($directory)) mkdir($directory, 0777, true);
        if (count($image_parts) >= 2)
        {
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $directory . '/' . uniqid() . '.png';
            file_put_contents($file, $image_base64);
            return [true, $file];
        }
        else {
            $image_base64 = base64_decode(trim($image_parts[0]));
            $file = $directory . '/' . uniqid() . '.png';
            file_put_contents($file, $image_base64);
            return [true, $file];
        }
        return [false, ''];
    }
}

if (! function_exists('createImageToBase64'))
{
    function createImageToBase64($path)
    {
        if ($path)
        {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            return $base64;
        } else {
            return "";
        }
    }
}

if (! function_exists('formatDate'))
{
    /**
    * Change date format default to format date Indonesia
    *
    * @param  string date
    * @param  string formatdate (Y-m-d) (Optional)
    * @return string result date
    */
    function formatDate($date="", $format = "")
    {
        if (($date == '' && $format != "monthInd") || ($date == '-' && $format != "monthInd"))
        {
            return '0000-00-00';
            // return $date;
        }

        # Month in indonesia
        $bulanText = array(
            "Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        );

        $result = $date;
        if ($format == "")
        {
            if (strtotime($date) > 0)
            {

                # Get year
                $tahun = substr($date, 0, 4);
                # Get Month
                $bulan = substr($date, 5, 2);
                # Get Date
                $tgl   = substr($date, 8, 2);
                
                # Convert format date to (9 Agustus 2015)
                if ($bulan > 0)
                {
                    $result = $tgl . " " . $bulanText[(int)$bulan-1] . " ". $tahun;                    
                }
            }
        } elseif ($format == "monthInd") {
            // $date = 1;
            $result = $bulanText[$date];
        } else {
            $result = date($format, strtotime($date));
        }
        return $result;
    }
}

if (! function_exists('getDayName'))
{
    /**
    * Change date format default to format date Indonesia
    *
    * @param  string date
    * @param  string formatdate (Y-m-d) (Optional)
    * @return string result date
    */
    function getDayNameFromDate($date="")
    {
        if ($date == '')
        {
            return '';
        }
        $day = date('w', strtotime($date));
        $dayText = array( "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu" );
        $result = $day;
        if (isset($dayText[$day]))
        {
            $result = $dayText[$day];
        }
        return $result;
    }
}

if (! function_exists('monthName'))
{
    /**
    * Change date format default to format date Indonesia
    *
    * @param  string date
    * @param  string monthName (m) (Optional)
    * @return string result month name
    */
    function monthName($month="")
    {
        if ($month == '' || $month == '-')
            return '';

        $result = $month;
        if ($month > 0)
        {
            $bulanText = [
                "1" => "Januari",
                "2" => "Februari",
                "3" => "Maret",
                "4" => "April",
                "5" => "Mei",
                "6" => "Juni",
                "7" => "Juli",
                "8" => "Agustus",
                "9" => "September",
                "10" => "Oktober",
                "11" => "November",
                "12" => "Desember"
            ];
            $result = isset($bulanText[$month]) ? $bulanText[$month]:'';
        }
        return $result;
    }
}

if (! function_exists('maxWords'))
{
    /**
    * Limit words.
    *
    * @param  string  content
    * @param  Integer Length, default 100 (Optional)
    * @param  string  End of words, default ... (Optional)
    * @return string  result content
    */
    function maxWords($content = '', $maxLength = 100, $endWords = ' ... ')
    {
        $words = explode(' ', $content);
        if (count($words) > $maxLength)
        {
            $pos = strpos($content, ' ', $maxLength);
            $content = substr($content, 0, $pos).$endWords;
        }
        return $content;
    }
}

if (! function_exists('formatRupiah'))
{
    /**
    * Change number to rupiah.
    *
    * @param  string  price/number
    * @return string  result price/number
    */
    function formatRupiah($price = 0)
    {
        if (!is_numeric($price)) $price = 0;
        $result = "Rp " . number_format($price,0,',','.');
        return $result;
    }
}

if (! function_exists('formatNumber'))
{
    /**
    * Change number to rupiah.
    *
    * @param  string  price/number
    * @return string  result price/number
    */
    function formatNumber($price = 0)
    {
        if (!is_numeric($price)) $price = 0;
        $result = number_format($price,0,',','.');
        return $result;
    }
}

if (! function_exists('rupiahToNumber'))
{
    /**
    * Change number to rupiah.
    *
    * @param  string  price/number
    * @return string  result price/number
    */
    function rupiahToNumber($price)
    {
        $result = str_replace(" ", "", $price);
        $result = str_replace("Rp", "", $result);
        $result = str_replace(".", "", $result);
        $result = str_replace(",", "", $result);
        return $result;
    }
}

if (! function_exists('plusDate'))
{
    /**
    * Plus date.
    *
    * @param  string  date
    * @param  integer plus
    * @param  string  type number, second/hour/day/month/year
    * @return string  result date
    */
    function plusDate($date = '', $plus = '5', $type = 'hour')
    {
        return date('Y-m-d H:i:s',strtotime('+'.$plus.' '.$type,strtotime($date)));
    }
}

if (! function_exists('minusDate'))
{
    /**
    * Plus date.
    *
    * @param  string  date
    * @param  integer plus
    * @param  string  type number, second/hour/day/month/year
    * @return string  result date
    */
    function minusDate($date = '', $minus = '5', $type = 'hour')
    {
        return date('Y-m-d H:i:s',strtotime('-'.$minus.' '.$type,strtotime($date)));
    }
}

if (! function_exists('createFile'))
{
    function createFile($fileName = "", $content = "", $folder = "", $overwrite = false, $FILE_APPEND = "")
    {
        if ($fileName != "" && $folder != "")
        {
            if (is_array($content)) {
                $content = json_encode($content) . "\n";
            }

            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            if ($overwrite) {
                if (file_exists($folder."/".$fileName)) {
                    unlink($folder."/".$fileName);
                }
            }

            if ($FILE_APPEND == "")
            {
                file_put_contents($folder.'/'.$fileName, $content);
            } else {
                file_put_contents($folder.'/'.$fileName, $content, FILE_APPEND);
            }
            return array('status' => true, 'fileUrl' => $folder.'/'.$fileName);

        }
        else {
            return array('status' => false, 'fileUrl' => '');
        }
    }
}

if (! function_exists('getFile'))
{
    function getFile($file = "", $remove = false)
    {
        if ($file != "")
        {
            if (file_exists($file))
            {
                $result = file_get_contents($file);
                if ($remove)
                {
                    unlink($file);
                }
                return array('status' => true, 'content' => $result);
            } else {
                return array('status' => false, 'content' => '');
            }
        }
        else {
            return array('status' => false, 'content' => '');
        }
    }
}

if (! function_exists('parseParameter'))
{
    function parseParameter($params = "")
    {
        if ($params != "")
        {
            $param = array();
            $arrayParam = explode('&', $params);
            foreach ($arrayParam as $value)
            {
                $arrayValue = explode('=', $value);
                $key = isset($arrayValue[0])?$arrayValue[0]:'';
                if ($key != '')
                    $param[$key] = isset($arrayValue[1])?$arrayValue[1]:'';
            }
            return $param;
        }
    }
}

if (! function_exists('_http_response_code'))
{
    /**
    * Set status code http.
    *
    * @param  integer code
    * @return string  code
    */
    function _http_response_code($code = NULL)
    {
        if ($code !== NULL)
        {
            switch ($code) {
                case 100: $text = 'Continue'; break;
                case 101: $text = 'Switching Protocols'; break;
                case 200: $text = 'OK'; break;
                case 201: $text = 'Created'; break;
                case 202: $text = 'Accepted'; break;
                case 203: $text = 'Non-Authoritative Information'; break;
                case 204: $text = 'No Content'; break;
                case 205: $text = 'Reset Content'; break;
                case 206: $text = 'Partial Content'; break;
                case 300: $text = 'Multiple Choices'; break;
                case 301: $text = 'Moved Permanently'; break;
                case 302: $text = 'Moved Temporarily'; break;
                case 303: $text = 'See Other'; break;
                case 304: $text = 'Not Modified'; break;
                case 305: $text = 'Use Proxy'; break;
                case 400: $text = 'Bad Request'; break;
                case 401: $text = 'Unauthorized'; break;
                case 402: $text = 'Payment Required'; break;
                case 403: $text = 'Forbidden'; break;
                case 404: $text = 'Not Found'; break;
                case 405: $text = 'Method Not Allowed'; break;
                case 406: $text = 'Not Acceptable'; break;
                case 407: $text = 'Proxy Authentication Required'; break;
                case 408: $text = 'Request Time-out'; break;
                case 409: $text = 'Conflict'; break;
                case 410: $text = 'Gone'; break;
                case 411: $text = 'Length Required'; break;
                case 412: $text = 'Precondition Failed'; break;
                case 413: $text = 'Request Entity Too Large'; break;
                case 414: $text = 'Request-URI Too Large'; break;
                case 415: $text = 'Unsupported Media Type'; break;
                case 500: $text = 'Internal Server Error'; break;
                case 501: $text = 'Not Implemented'; break;
                case 502: $text = 'Bad Gateway'; break;
                case 503: $text = 'Service Unavailable'; break;
                case 504: $text = 'Gateway Time-out'; break;
                case 505: $text = 'HTTP Version not supported'; break;
                default:
                exit('Unknown http status code "' . htmlentities($code) . '"');
                break;
            }
            $this->httpStatusMessage = $text;
            $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
            header($protocol . ' ' . $code . ' ' . $text);
            $GLOBALS['http_response_code'] = $code;
        }
        else {
            $code = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);
        }
        return $code;
    }
}

if (! function_exists('image_thumb'))
{
    /**
     * Create thumbnail
     *
     * @param string $image_path image full path
     * @param int $width resize width
     * @param int $height resize height
     * @param boolean $zc zoom crop ? true | false
     * @param string $ret return what ? 'filename' | '' (default)
     * @return string
     */
    function image_thumb($image_path, $width, $height, $zc='', $ret='')
    {
        // Get the CodeIgniter super object
        $image_lib = new \ImageLib();
        $image_lib->clear();

        if (!file_exists($image_path))
            return '<img src="/assets/images/not_available.gif" alt="Image not available ('.$image_path.')" title="Image not available" width="'.$width.'" height="'.$height.'" />';

        if (is_dir($image_path))
            $image_path = $image_path."/blank.gif";

        // Path to image thumbnail
        $dirname  = dirname($image_path);
        $srcname  = str_replace($dirname,'',$image_path);
        $ext      = pathinfo($srcname, PATHINFO_EXTENSION);
        // $ext      = substr($srcname,-4);
        $filename = substr(str_replace($ext,'',$srcname),1);

        if (! is_dir($dirname . '/thumb'))
            @mkdir($dirname . '/thumb');

        $image_thumb = $dirname . '/thumb/' . $filename . '__' . $width . '_' . $height . '.' . $ext;

        if(!file_exists($image_thumb))
        {
            // CONFIGURE IMAGE LIBRARY
            $config['image_library'] = 'gd2';
            $config['source_image']  = $image_path;
            $config['new_image']         = $image_thumb;

            if(file_exists($image_path))
            {
                if ($zc)
                {
                    $img_size = getimagesize($image_path);

                    $t_ratio = $width/$height;

                    $o_width = $img_size[0];
                    $o_height = $img_size[1];

                    if ($t_ratio > $o_width/$o_height)
                    {
                        $config['width'] = $width;
                        $config['height'] = round( $width * ($o_height / $o_width));
                        $y_axis = round(($config['height']/2) - ($height/2));
                        $x_axis = 0;
                    }
                    else
                    {
                        $config['width'] = round( $height * ($o_width / $o_height));
                        $config['height'] = $height;
                        $y_axis = 0;
                        $x_axis = round(($config['width']/2) - ($width/2));
                    }

                    $image_lib->clear();
                    $image_lib->initialize($config);
                    $image_lib->resize();

                    $config['source_image'] = $config['new_image'];
                    $config['maintain_ratio'] = false;
                    $config['width']  = $width;
                    $config['height'] = $height;
                    $config['x_axis'] = $x_axis;
                    $config['y_axis'] = $y_axis;

                    $image_lib->clear();
                    $image_lib->initialize($config);
                    $image_lib->crop();

                    if ($ret=='filename') return $image_thumb;
                    return '<img src="'. $image_thumb . '" alt="" width="'.$width.'" height="'.$height.'" />';
                }
                else
                {
                    $attr     = @getimagesize($image_path);
                    $o_width  = $attr[0];
                    $o_height = $attr[1];
                    //$scale  = $width / $height;

                    if (empty($o_width) || empty($o_height)) return;

                    if ($width==$o_width && $height==$o_height)
                    {
                        if ($ret=='filename') return $image_path;
                        return '<img src="'. $image_path . '" alt="" width="'.$o_width.'" height="'.$o_height.'" />';
                    }
                    else
                    {
                        $o_scale  = $o_width/$o_height;

                        if ($width=='auto' && $height<$o_height)
                        {
                            $n_height = $height;
                            $n_width  = round($n_height * $o_scale);
                        }
                        elseif ($height=='auto' && $width<$o_width)
                        {
                            $n_width  = $width;
                            $n_height = round($n_width / $o_scale);
                        }
                        else
                        {
                            $n_width  = $width;
                            $n_height = $height;
                        }

                        //echo $scale . ' - ';
                        //echo $n_width . ' x ' .  $n_height;

                        $config['maintain_ratio']   = false;
                        $config['height']           = $n_height;
                        $config['width']            = $n_width;
                        $image_lib->initialize($config);
                        $image_lib->resize();
                        $image_lib->clear();

                        if ($ret=='filename')
                        {
                            return $image_thumb;
                        }
                        else
                        {
                            if ($ret=='filename') return $image_thumb;
                            return '<img src="'. $image_thumb . '" alt="" width="'.$n_width.'" height="'.$n_height.'" />';
                        }
                    }
                }
            }
            else
            {
                if ($ret=='filename') return '';
                return '<img src="/assets/images/not_available.gif" alt="Image not available ('.$image_path.')" title="Image not available" width="'.$width.'" height="'.$height.'" />';
            }
        }
        else
        {
            if ($ret=='filename') return $image_thumb;
            return '<img src="'. $image_thumb . '" alt="'.$filename.$ext.'" width="'.$width.'" height="'.$height.'" />';
        }
    }
}

if (! function_exists('resize_crop'))
{
    function resize_crop($image_path, $width, $height)
    {
        // Get the CodeIgniter super object
        $image_lib = new \ImageLib();
        $image_lib->clear();

        // CONFIGURE IMAGE LIBRARY
        $config['image_library'] = 'gd2';
        $config['source_image']  = $image_path;
        $config['new_image']     = $image_path;

        if(file_exists($image_path) && is_file($image_path))
        {
            $img_size = getimagesize($image_path);
            $o_width  = $img_size[0];
            $o_height = $img_size[1];

            if ($width=='*')
            {
                $width = ($height/$o_height) * $o_width;
            }
            elseif ($height=='*')
            {
                $height = ($width/$o_width) * $o_height;
            }


            $t_ratio = $width/$height;

            if ($t_ratio > $o_width/$o_height)
            {
                $config['width'] = $width;
                $config['height'] = round( $width * ($o_height / $o_width));
                $y_axis = round(($config['height']/2) - ($height/2));
                $x_axis = 0;
            }
            else
            {
                $config['width'] = round( $height * ($o_width / $o_height));
                $config['height'] = $height;
                $y_axis = 0;
                $x_axis = round(($config['width']/2) - ($width/2));
            }

            $image_lib->clear();
            $image_lib->initialize($config);
            $image_lib->resize();

            $config['source_image'] = $config['new_image'];
            $config['maintain_ratio'] = false;
            $config['width']  = $width;
            $config['height'] = $height;
            $config['x_axis'] = $x_axis;
            $config['y_axis'] = $y_axis;

            $image_lib->clear();
            $image_lib->initialize($config);
            $image_lib->crop();
        }
    }
}

if (! function_exists('scale'))
{
    function scale($imagepath, $maxwidth, $maxheight,$reverse=FALSE)
    {
        list($width,$height) = getimagesize($imagepath);
        $rate  = $width / $height;
        $rate2 = $maxwidth / $maxheight;

        if (!$reverse)
        {
            if (($width/$maxwidth>$height/$maxheight))
            {
                $w = $maxwidth;
                $h = round($maxwidth/$rate);
            }
            else
            {
                $w = round($maxheight*$rate);
                $h = $maxheight;
            }
        }
        else
        {
            if (($width/$maxwidth<$height/$maxheight))
            {
                $w = $maxwidth;
                $h = round($maxwidth/$rate);
            }
            else
            {
                $w = round($maxheight*$rate);
                $h = $maxheight;
            }
        }

        return array($w,$h);
    }
}

if (! function_exists('image_exist'))
{
    function image_exist($file)
    {
        $basename = basename($file);

        if (!empty($basename) && file_exists($file) && is_file($file))
        {
            return TRUE;
        }
        return FALSE;
    }
}

if (! function_exists('getTextConfig'))
{
    function getTextConfig($text = '')
    {
        if ($text)
        {
            $result = $text;

            ## ARRAY FROM CONFIG
            $arrayText = Config::get('text');

            ## SET TO LOWER TEXT AND TRIM
            // $text = strtolower(trim($text));
            $result = strtoupper(trim($text));
            $result = trim($result);

            ## CHECK TO ARRAY TEXT EXIST OR NOT
            $result = isset($arrayText[$result]) ? $arrayText[$result] : $result ;

            ## RETURN RESULT
            return trim($result);
        }
        else {
            return $text;
        }
    }
}

if (! function_exists('issetArray'))
{
    /**
     * Isset Array
     *
     * @param string variable
     * @param string key array
     * @param string return if null
     * @return value
     */
    function issetArray($var = '', $key = '', $returnNull = '')
    {
        return isset($var[$key]) ? $var[$key] :$returnNull;
    }
}

if (! function_exists('normalizeMsisdn'))
{
    function normalizeMsisdn($msisdn = "")
    {
        if (preg_match("/^0\d+$/", $msisdn) == 1)
        {
            $msisdn = preg_replace("/^0/", "62-", $msisdn);
        }
        return $msisdn;
    }
}

if (! function_exists('getOperator'))
{
    function getOperator($msisdn)
    {
        if ( preg_match("/^(0|62)8(17|18|19|31|32|38|59|74|76|77|78|79)\d+$/",$msisdn) == 1 )
        {
            return "xl";
        }
        else if ( preg_match("/^(0|62)8(14|15|16|55|56|57|58)\d+$/",$msisdn) == 1 )
        {
            return "isat2";
        }
        else if( preg_match("/^(0|62)8(11|12|13|21|22|23|51|52|53)\d+$/",$msisdn) == 1 )
        {
            return "tsel2";
        }
        return "unknown";
    }
}