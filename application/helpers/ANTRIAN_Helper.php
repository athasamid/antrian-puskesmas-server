<?php
function terbilang($bilangan)
{
    $angka = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0',
        '0', '0', '0');
    $kata = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh',
        'delapan', 'sembilan');
    $tingkat = array('', 'ribu', 'juta', 'milyar', 'triliun');

    $panjang_bilangan = strlen($bilangan);

    /* pengujian panjang bilangan */
    if ($panjang_bilangan > 15)
    {
        $kalimat = "Diluar Batas";
        return $kalimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan,
    dimasukkan ke dalam array */
    for ($i = 1; $i <= $panjang_bilangan; $i++)
    {
        $angka[$i] = substr($bilangan, -($i), 1);
    }

    $i = 1;
    $j = 0;
    $kalimat = "";


    /* mulai proses iterasi terhadap array angka */
    while ($i <= $panjang_bilangan)
    {
        $subkalimat = "";
        $kata1 = "";
        $kata2 = "";
        $kata3 = "";

        /* untuk ratusan */
        if ($angka[$i + 2] != "0")
        {
            if ($angka[$i + 2] == "1")
            {
                $kata1 = "seratus";
            }
            else
            {
                $kata1 = $kata[$angka[$i + 2]] . " ratus";
            }
        }

        /* untuk puluhan atau belasan */
        if ($angka[$i + 1] != "0")
        {
            if ($angka[$i + 1] == "1")
            {
                if ($angka[$i] == "0")
                {
                    $kata2 = "sepuluh";
                }
                elseif ($angka[$i] == "1")
                {
                    $kata2 = "sebelas";
                }
                else
                {
                    $kata2 = $kata[$angka[$i]] . " belas";
                }
            }
            else
            {
                $kata2 = $kata[$angka[$i + 1]] . " puluh";
            }
        }

        /* untuk satuan */
        if ($angka[$i] != "0")
        {
            if ($angka[$i + 1] != "1")
            {
                $kata3 = $kata[$angka[$i]];
            }
        }

        /* pengujian angka apakah tidak nol semua,
        lalu ditambahkan tingkat */
        if (($angka[$i] != "0") or ($angka[$i + 1] != "0") or ($angka[$i + 2] != "0"))
        {
            $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
        }

        /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
        ke variabel kalimat */
        $kalimat = $subkalimat . $kalimat;
        $i = $i + 3;
        $j = $j + 1;

    }

    /* mengganti satu ribu jadi seribu jika diperlukan */
    if (($angka[5] == "0") and ($angka[6] == "0"))
    {
        $kalimat = str_replace("satu ribu", "seribu", $kalimat);
    }
    return trim($kalimat);
}

/**
 * Return environment variable.
 * TODO: support untuk parameter dot / garing untuk env berupa array / object
 *
 * @param  string       $key        Key dari environment variable yang ingin dpanggil
 * @param  null|mixed   $default    Default value untuk variable yang tidak ditemukan
 * @return mixed                    You know what it is
 */
function app_env($key, $default = null) {
    if (isset($_ENV[$key]))
        return $_ENV[$key];

    $ci =& get_instance();

    // var_dump($ci->db); die;
    // if ($row = $ci->db->where('nama', $key)->get('pengaturan')->row()) {
    //     $nilai = $row->nilai;

    //     if (($decode = json_decode($nilai, true)) !== null) {
    //         $nilai = $decode;
    //     } elseif (in_array(strtolower($nilai), array('0', '1', 'true', 'false'))) {
    //         $nilai = (boolean) $nilai;
    //     }

    //     return $nilai;
    // }

    return $default;
}