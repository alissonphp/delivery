<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function getIndex($id)
    {
        $empresa = Empresa::find($id);
        return $empresa->tickets;
    }
}
