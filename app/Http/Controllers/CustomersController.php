<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['edit']);
    }
    public function index(){
        $customers = Customer::orderBy('name')->paginate(20);

        return view('customers.index', compact('customers'));
    }
    public function load(Request $request){
        if($request->criteria === ""){
            $customers = Customer::all();
            return response()->json(['customers' => $customers]);
        }
        $customers = DB::table('customers')
            ->where('carModel', 'like', '%' . $request->criteria . '%')
            ->orWhere('name', 'like', '%' . $request->criteria . '%')
            ->get();
        $newCustomers = [];
        foreach ($customers as $customer){
            $newCustomers[] = $customer->carModel . " | " . $customer->name;
        }

        return response()->json(['customers' => $newCustomers]);

    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'     => 'required|min:3',
            'email'    => 'nullable',
            'plateNum' => 'required',
            'carModel' => 'required',
            'phoneNum' => 'nullable',
            'address'  => 'nullable'
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if (Customer::where('name', $request->name)->where('carModel', $request->carModel)->count() > 0) {
            return response()->json(['exists' => 'Klijent već postoji u bazi!']);
        }
        $data =array(
            'name'     => $request->name,
            'email'    => $request->email,
            'plateNum' => $request->plateNum,
            'carModel' => $request->carModel,
            'phoneNum' => $request->phoneNum,
            'address'  => $request->address
        );



        Customer::create($data);

        return response()->json(['success' => 'Klijent uspešno dodat!']);
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);

        return view('customers.edit', compact('customer'));
    }
    public function update(Request $request, $id){
        $data = $request->validate([
            'name'        => 'required',
            'carModel'    => 'required',
            'plateNum'    => 'required',
            'phoneNum'    => 'nullable',
            'address'     => 'nullable',
            'email'       => 'nullable'
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update($data);

        return redirect()->route('customers.index');
    }
    public function show($id){
        $customer = Customer::where('id', $id)->with('services')->firstOrFail();
//        dd($customer);
        return view('customers.show', compact('customer'));
    }
    public function destroy($id){
        $customer = Customer::find($id);
        $services = Service::where('customer_id', $id)->delete();

        $customer->delete();


        return redirect()->route('customers.index');
    }
}
