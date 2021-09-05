<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarisBarang;
class InventarisController extends Controller
{
    public function index()
    {
        $inventaris_barangs = InventarisBarang::all();
        return view('inventaris',['inventaris_barangs'=>$inventaris_barangs ],compact('inventaris_barangs'));
    }
}
