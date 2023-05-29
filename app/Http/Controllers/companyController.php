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

    public function showCompany(company $company)
    {
        return view("display.company", ["company" => $company]);
    }

    public function editCompany(company $company)
    {
        return view("display.edit", ["company" => $company]);
    }

    public function updateCompany(Request $request, company $company)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'taxNumber' => 'required|max:8|min:8',
            'phone' => 'required|string|min:9|max:15',
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

        return redirect()->route('list')->with('success', 'company updated successfully!');
    }

    public function destroyCompany(company $company)
    {
        $company->delete();

        return redirect()->route('list')->with('success', 'company deleted successfully!');
    }

    public function createCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'taxNumber' => 'required|max:8|min:8',
            'phone' => 'required|string|min:9|max:15',
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

        return redirect()->route('list')->with('success', 'company created successfully.');
    }
}
