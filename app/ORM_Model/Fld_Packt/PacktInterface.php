<?php

namespace App\ORM_Model\Fld_Packt;

interface PacktInterface
{
    public function getproduct(string $url,string $token): array;

    public function getsingleproduct(string $url,string $token):array;
}
