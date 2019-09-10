<?php


namespace App\Models\Repository\Traits;

trait ParamsChecker
{
    public function doParamsExist(string $key, array $params): bool
    {
        return isset($params[$key]);
    }
}