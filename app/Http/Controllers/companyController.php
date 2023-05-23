<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class companyController extends Controller
{
    public function listCompanies()
    {
        $companies = company::all();
        return view("display.list", ["companies" => $companies]);
    }

    public function showCreate()
    {
        return view("display.create");
    }

    public function showCompany(Company $company)
    {
        return view("display.company", ["company" => $company]);
    }   

    public function editCompany(Company $company)
    {
        return view("display.edit", ["company" => $company]);
    }

    public function updateCompany(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'taxNumber' => 'required|max:50|min:5',
            'phone' => 'required|min:10',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $company->name = $validatedData["name"];
        $company->taxNumber = $validatedData["taxNumber"];
        $company->phone = $validatedData["phone"];
        $company->email = $validatedData["email"];
        $company->save();

        return redirect()->route('list')->with('success', 'Product updated successfully!');
    }

    public function destroyCompany(Company $company)
    {
        $company->delete();

        return redirect()->route('list')->with('success', 'Product Deleted successfully!');
    }


    public function createCompany(REQUEST $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'taxNumber' => 'required|max:50|min:5',
            'phone' => 'required|min:10',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $company = new company();
        $company->name = $validatedData["name"];
        $company->taxNumber = $validatedData["taxNumber"];
        $company->phone = $validatedData["phone"];
        $company->email = $validatedData["email"];
        $company->save();
    
        return redirect()->route('list')->with('success', 'Product created successfully.');
    }
}
