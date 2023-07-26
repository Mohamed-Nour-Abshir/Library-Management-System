<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    //
    public function generate() {
        $url = 'https://mohamednurabshir.kaizenitbd.com/';
        $qrCode = QrCode::size(200)->generate($url);
        return response($qrCode);
 
    }
}
