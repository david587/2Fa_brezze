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

    public function showCreate(){
        return view("display.create");
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

    public function createCompany(REQUEST $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'taxNumber' => 'required|max:50|min:5',
            'phone' => 'required|min:0',
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
