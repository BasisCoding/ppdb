<?php
if (! function_exists('hitung_umur')) {
    function hitung_umur($tgl)
    {
        $tanggal = new DateTime($tgl);
        $today = new DateTime('today');
        $y = $today->diff($tanggal)->y;
        $m = $today->diff($tanggal)->m;
        $d = $today->diff($tanggal)->d;
        return $y . " Tahun, " . $m . " Bulan, " . $d . " Hari";
    }
}