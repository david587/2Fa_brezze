<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            return view("display.company", ["company" => $company]);
        } 
        catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function editCompany(Company $company)
    {
        try {
            return view("display.edit", ["company" => $company]);
        } 
        catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function updateCompany(Request $request, Company $company)
    {
        try{
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
        catch (ModelNotFoundException $e){
            return abort(404);
        }
        
        
    }

    public function destroyCompany(Company $company)
    {
        try{
            $company->delete();

            return redirect()->route('list')->with('success', 'Product Deleted successfully!');
        }
        catch (ModelNotFoundException $e){
            return abort(404);
        }
        
       
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
