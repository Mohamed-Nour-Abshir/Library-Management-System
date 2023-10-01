<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    //
    public function generate() {
        $url = 'http://127.0.0.1:8000/';
        $qrCode = QrCode::size(200)->generate($url);
        return response($qrCode);
 
    }
}
