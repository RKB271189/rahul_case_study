<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ORM_Model\Fld_Packt\PacktInterface;
use Exception;
use Illuminate\Http\Request;

class PacktController extends Controller
{
    private $packtRepository;
    private $token;
    public function __construct(PacktInterface $packtInterface)
    {
        $this->packtRepository = $packtInterface;
        $this->token = config('packt.auth_token');
    }
    public function productList()
    {
        try {
            $url = config('packt.get_product');
            $product = $this->packtRepository->getproduct($url, $this->token);
            return response()->json($product);
        } catch (Exception $ex) {
            $this->WriteGeneralException($ex);
            return response()->json($this->ExceptionResponse($ex), 500);
        }
    }
    public function productlistperpage($pagenumber)
    {
        try {
            $url = config('packt.get_product');
            $product = $this->packtRepository->getproductperpage($url, $this->token,$pagenumber);
            return response()->json($product);
        } catch (Exception $ex) {
            $this->WriteGeneralException($ex);
            return response()->json($this->ExceptionResponse($ex), 500);
        }
    }
    public function productDetails($id)
    {
        try {
        } catch (Exception $ex) {
        }
    }
}
