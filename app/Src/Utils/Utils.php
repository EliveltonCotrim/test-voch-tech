<?php

namespace App\Src\Utils;

class Utils
{
    public static function formatCnpj($valor): string
    {
        return substr($valor, 0, 2) . '.' . substr($valor, 2, 3) . '.' . substr($valor, 5, 3) . '/' . substr($valor, 8, 4) . '-' . substr($valor, 12, 2);
    }

    public static function formatCpf($valor): string
    {
        return substr($valor, 0, 3) . '.' . substr($valor, 3, 3) . '.' . substr($valor, 6, 3) . '-' . substr($valor, 9, 2);
    }

    public static function removeCaracters($valor): string
    {
        return preg_replace('/[^0-9]/im', '', $valor);
    }

}
