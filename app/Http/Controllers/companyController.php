<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function listCompanies()
    {
        $companies = company::all();
        return view("dispay.list", ["comapanies" => $companies]);
    }
}
