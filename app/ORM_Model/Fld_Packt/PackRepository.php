<?php

namespace App\ORM_Model\Fld_Packt;

use App\Usables_Extensions\ClientURL;

final class PackRepository implements PacktInterface
{
    use ClientURL;
    public final function getproduct(string $url,string $token): array
    {
        $product = [];
        $product=$this->getGuzzleRequest($url.$token);
        return json_decode($product,true);
    }
    public function getsingleproduct(string $url,string $token): array
    {
        $product = [];
        return $product;
    }
}
