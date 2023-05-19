<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function listCompanies()
    {
        $companies = company::all();
        return view("display.list", ["companies" => $companies]);
    }

    public function showCompany($id)
    {
        $company = company::find($id);
        return view("display.company", ["company" => $company]);
    }
    
    public function editCompany($id)
    {
        $editable = company::find($id);
        return view("display.edit", ["company" => $editable]);
    }

    public function updateCompany(REQUEST $request,$id)
    {
        $company = company::findOrFail($id);
        $company->name = $request->input('name');
        $company->taxNumber = $request->input('taxNumber');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->save();
        return redirect()->route('list')->with('success', 'Product updated successfully!');
    }

    public function destroyCompany($id)
    {
        company::destroy($id);
        return redirect()->route('list')->with('success', 'Product Deleted successfully!');

    }
}
