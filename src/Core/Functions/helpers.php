<?php

use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\Response;

use function PHPSTORM_META\type;

if (!function_exists('render_template')) {

    /**
     * Render template
     *
     * @param string $page
     * @param array $data
     * @param Request $request
     * @return Response
     */
    function render_template($page, $data = [], $request = null)
    {
        if (!is_null($request)) {
            extract($request->attributes->all(), EXTR_SKIP);
        }

        $isPermited = function ($userpermissions = [], $permissions, $option = 'required-all') {
            $result = false;

            // jika memiliki semua akses
            if ($userpermissions == '*') {
                return true;
            }

            // option "required-all"
            if ($option == 'required-all') {
                $permissionAmount = count($permissions);
                foreach ($userpermissions as $key => $value) {
                    foreach ($permissions as $key1 => $value1) {
                        if ($value == $value1) {
                            $permissionAmount--;
                        }
                    }
                }
                $result = $permissionAmount == 0 ? true : false;
            } else {
                // option "required-one"
                foreach ($userpermissions as $key => $value) {
                    if (in_array($value, $permissions)) {
                        $result = true;
                        break;
                    }
                }
            }

            return $result;
        };

        extract($data, EXTR_SKIP);

        ob_start();
        include sprintf(__DIR__ . '/../../../src/pages/%s.php', $page);

        return new Response(ob_get_clean());
    }
}

if (!function_exists('env')) {

    /**
     * Get the value of an environment variable
     */
    function env($key, $default = '')
    {
        $value = '';
        if (isset($_ENV[$key])) {
            $value = $_ENV[$key];
        } else {
            $value = $default;
        }

        return $value;
    }
}

if (!function_exists('str_slug')) {

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string $string
     * @param  string $separator
     * @return string
     */
    function str_slug(string $string, string $separator = '-')
    {
        $lowercase_judul = strtolower($string);
        $replacespasi = str_replace(' ', $separator, $lowercase_judul);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $replacespasi);

        return $slug;
    }
}

if (!function_exists('show')) {
    /**
     * Show value of variable
     *
     * @param mixed $var
     * @return void
     */
    function show($var)
    {
        return isset($var) ? $var : '';
    }
}

if (!function_exists('session')) {
    /**
     * Get session
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function session($key = null)
    {
        return $key == null ? SessionData::get()->all() : SessionData::get($key);
    }
}

if (!function_exists('arr_offset')) {
    /**
     * Get offset of array
     *
     * @return mixed
     */
    function arr_offset($array, $offset)
    {
        return $array && isset($array[$offset]) ? $array[$offset] : null;
    }
}

if (!function_exists('storage_path')) {
    /**
     * Get storage path
     *
     * @param string $path
     * @return string
     */
    function storage_path($path = '')
    {
        return __DIR__ . '/../../../web/assets/media/' . $path;
    }
}

if (!function_exists('fonts_path')) {
    /**
     * Get fonts path
     *
     * @param string $path
     * @return string
     */
    function fonts_path($path = '')
    {
        return __DIR__ . '/../../../web/assets/fonts/' . $path;
    }
}

if (!function_exists('component')) {
    /**
     * Get component
     *
     * @param string $path
     * @param array $datas
     * @return string
     */
    function component(string $path = '', array $datas)
    {
        $base_path = 'cms';
        $component_path = file_get_contents(__DIR__ . '/../../pages/' . $base_path . '/' . $path . '.php');

        extract($datas, EXTR_SKIP);

        $component_final = $component_path;
        foreach ($datas as $key => $value) {
            $component_final = str_replace('{' . $key . '}', $value, $component_final);
        }

        return html_entity_decode($component_final);
    }
}

if (!function_exists('str_limit')) {
    /**
     * Limit string
     *
     * @param string $string
     * @param int $limit
     * @param string $end
     * @return string
     */
    function str_limit($string, $limit, $end = '...')
    {
        return strlen($string) > $limit ? substr($string, 0, $limit) . $end : $string;
    }
}

if (!function_exists('what_date_is')) {
    /**
     * Find spesific date
     * 
     * @param array $option ['hour' => 0, 'day' => 0, 'week' => 0, 'month' => 0, 'year' => 0]
     * @param string $from (optional) format: 'yyyy-mm-dd'
     */
    function what_date_is(array $option)
    {
        $param = func_get_args();
        $hour = 3600;
        $day = $hour * 24;
        $week = $day * 7;
        $month = $week * 4;
        $year = $month * 12;
        $date_var = get_defined_vars();

        $total_time = 0;
        foreach ($option as $key => $value) {
            if (isset($date_var[$key])) {
                $total_time += $date_var[$key] * $value;
            }
        }

        $from = isset($param[1]) ? strtotime($param[1]) : strtotime(date('Y-m-d'));
        $date = $from + $total_time;

        return date('Y-m-d', $date);
    }
}

if (!function_exists('diff_date')) {
    /**
     * Find spesific date
     * 
     * @param string $created_at format: 'yyyy-mm-dd'
     * @param bool $complete_version
     */
    function diff_date()
    {
        $param = func_get_args();
        $created_at = $param[0];
        $time = time() - strtotime($created_at);
        $a = ['dekade' => 315576000, 'tahun' => 31557600, 'bulan' => 2629800, 'minggu' => 604800, 'hari' => 86400, 'jam' => 3600, 'menit' => 60, 'detik' => 1];

        $result = '';
        $arr_division_result = [];
        foreach ($a as $key => $value) {
            foreach ($param[1] as $key1 => $value1) {
                if (strtolower($key) == strtolower($value1)) {
                    $division_result = floor($time / $value);
                    $time = $time - ($division_result * $value);
                    $words = $division_result . ' ' . ucwords($key) . ' ';
                    $result .= $words;
                    $arr_division_result[$key] = $division_result;
                }
            }
        }

        $count_zero_result = 0;
        foreach ($arr_division_result as $key => $value) {
            $count_zero_result += $value == 0 ? 1 : 0;
        }
        if (count($arr_division_result) == $count_zero_result) {
            $result = isset($param[2]) ? $param[2] : 'Recent';
        }

        return $result;
    }
}

if (!function_exists('num')) {
    /**
     * Show integer data with default value
     * 
     * @param int $number
     */
    function num($number)
    {
        return $number > 0 ? $number : 0;
    }
}

if (!function_exists('template')) {
    /**
     * Get template
     * 
     * @param 
     * @param array $datas
     */
    function template(string $path = '', array $datas = [])
    {
        extract($datas, EXTR_SKIP);

        ob_start();
        include sprintf(__DIR__ . '/../../pages/%s.php', $path);

        $template = new Response(ob_get_clean());
        return $template->getContent();
    }
}

if (!function_exists('asset')) {
    /**
     * Get assets
     * 
     * @param string $path
     */
    function asset($path = '')
    {
        $app_url = $_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1' ? 'http://' . $_SERVER['HTTP_HOST'] : 'https://' . $_SERVER['HTTP_HOST'];

        return env('APP_MEDIA_URL', $app_url) . '/assets/media/' . $path;
    }
}

if (!function_exists('currency')) {
    /**
     * Convert currency format
     * 
     * @param $number
     */
    function currency($number, int $decimal = 0)
    {
        return $number != null ? number_format($number, $decimal, '.', ',') : '';
    }
}

if (!function_exists('number_to_words')) {
    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = "" . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " puluh " . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " ratus " . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " ribu " . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . " juta " . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    /**
     * Convert number to words
     * 
     * @param int $nilai
     */
    function number_to_words(int $nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return ucwords($hasil);
    }
}

if (!function_exists('get_month_in_romawi')) {
    /**
     * Get month in romawi
     * 
     * @param string $month
     */
    function get_month_in_romawi($month)
    {
        $result = '';
        if ($month == '1') {
            $result = 'I';
        } else if ($month == '2') {
            $result = 'II';
        } else if ($month == '3') {
            $result = 'III';
        } else if ($month == '4') {
            $result = 'IV';
        } else if ($month == '5') {
            $result = 'V';
        } else if ($month == '6') {
            $result = 'VI';
        } else if ($month == '7') {
            $result = 'VII';
        } else if ($month == '8') {
            $result = 'VIII';
        } else if ($month == '9') {
            $result = 'IX';
        } else if ($month == '10') {
            $result = 'X';
        } else if ($month == '11') {
            $result = 'XI';
        } else if ($month == '12') {
            $result = 'XII';
        }

        return $result;
    }
}

if (!function_exists('count_no_urut')) {
    /**
     * Count no urut
     * 
     * @param string $last_count
     * @param int $num_amount
     */
    function count_no_urut($last_count, $num_amount = 3)
    {
        $result = '';

        $no_urut_baru = strval(intval($last_count) + 1);
        $angka_nol = '';
        for ($i = 0; $i < ($num_amount - strlen($no_urut_baru)); $i++) {
            $angka_nol .= '0';
        }
        $result = $angka_nol . $no_urut_baru;

        return $result;
    }
}
