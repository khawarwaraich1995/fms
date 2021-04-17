<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::all();
        return view('admin.company.company_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.company_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $update_id = $request->id;
        
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->post_code = $request->post_code;
        $company->country = $request->country;
        $company->city = $request->city;
        $company->smtp_username = $request->smtp_username;
        $company->smtp_password = $request->smtp_password;
        $company->smtp_host = $request->smtp_host;
        $company->smtp_port = $request->smtp_port;
        $company->paypal_email = $request->paypal_email;
        $company->paypal_currency = $request->paypal_currency;
        $company->stripe_publish_key = $request->stripe_publish_key;
        $company->stripe_secret_key = $request->stripe_secret_key;
        $company->stripe_email = $request->stripe_email;
        $company->stripe_country = $request->stripe_country;
        $company->stripe_currency = $request->stripe_currency;
        $company->facebook_link = $request->facebook_link;
        $company->twitter_link = $request->twitter_link;
        $company->insta_link = $request->insta_link;
        $company->google_link = $request->google_link;

        if(isset($update_id) && !empty($update_id) && $update_id != 0)
        {
            $company_data = Company::where('id', $update_id)->first();
            $company_data->update($request->all());
            return redirect()->route('admin:company')->with('success', 'Data Updated successfully!');
        }else{
            $company->status = 1;
            $company->save();
            $last_id = $company->id;
            if(isset($last_id) && !empty($last_id))
            {
              return redirect()->route('admin:company')->with('success', 'Company created successfully!');
            }else {
                return back()->with('error', 'Something Went wrong!');
            } 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_data = Company::find($id);
        return view('admin.company.company_form', compact('company_data', $company_data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    public function change_status(Request $request)
    {
        $status = false;
        $message = "Error in Changing Status";
        $company_id = $request->company_id;
        $company_status = $request->status;
        if(isset($company_id) && !empty($company_id))
        {
            if($company_status == 0)
            {
                $company_status = 1;
            }else{
                $company_status = 0;
            }

            $company = Company::find($company_id);

            if($company) {
                $company->status = $company_status;
                $company->save();
                $status = true;
                $message = "Status Changed";
            }
        }
        return response()->json(['status' => $status, 'message' => $message]);
    }
}