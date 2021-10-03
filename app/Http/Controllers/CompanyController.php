<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;
use App\Models\Comp;
use PDF;
use App\Models\Employee;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Comp::latest()->simplePaginate(5);
        return view('company.index', compact('companies'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        $input = $request->all();
  
        if ($image = $request->file('logo')) {
            $destinationPath = 'storage/app/company';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['logo'] = $profileImage;
        }
    
        Comp::create($input);
     
        return redirect()->route('company.index')
                        ->with('success','Company Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comp  $comp
     * @return \Illuminate\Http\Response
     */
    public function show(Comp $company)
    {
       // $emp = Employee::where('comp_id','=',$company)
        return view('company.show',compact('company'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getCompanyData(StoreRequest $request)
    {
        $companies = Comp::latest()->Paginate(5);
        return StoreRequest::ajax() ? 
                   response()->json($companies,Response::HTTP_OK) 
                   : abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comp  $comp
     * @return \Illuminate\Http\Response
     */
    public function edit(Comp $company)
    {
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comp  $comp
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request, Comp $company)
    {
        $input = $request->all();
  
        if ($image = $request->file('logo')) {
            $destinationPath = 'storage/app/company';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['logo'] = $profileImage;
        }else{
            unset($input['logo']);
        }
          
        $company->update($input);
    
        return response()->json(['code'=>200, 'message'=>'Post Created successfully','company' => $input], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comp  $comp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comp $company)
    {
        $company->delete();
     
        return redirect()->route('company.index')
                        ->with('success','Deleted successfully');
    }

    public function downloadPDF($id) {
        $company = Comp::find($id);
        $pdf = PDF::loadView('company.data', compact('company'));
        
        return $pdf->download('test.pdf');
        //return view('company.data', compact('company'));
}

      

}
