<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('isDone', 0)->with('customer')->orderBy('id', 'desc')->paginate(20);
        return view('services.index', compact('services'));
    }

    public function finished()
    {
        $services = Service::where('isDone', 1)->with('customer')->orderBy('id', 'desc')->paginate(20);
        return view('services.finished', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();

        return view('services.create', compact('customers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'description' => 'required'
        ]);
        $customerData = explode(" | ", $request->customer_id);
        $customer = Customer::where('name', $customerData[1])
            ->where('carModel', $customerData[0])->firstOrFail();


        $data = array(
            'description' => $request->description
        );
        $customer->services()->create($data);


        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::where('id', $id)->with('customer')->firstOrFail();

        return view('services.edit', compact('service'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->done){
            $request->validate([
                'done' => 'required',
                'description' => 'required'
            ]);
            $data = [
                'done'        => $request->done,
                'isDone'      => 1,
                'description' => $request->description
            ];
            $service = Service::find($id);
            $service->update($data);

            return redirect()->route('services.index');
        }
        $request->validate([
            'name'        => 'required',
            'carModel'    => 'required',
            'plateNum'    => 'required',
            'description' => 'required',
            'customer_id' => 'required',
            'phoneNum'    => 'nullable',
            'address'     => 'nullable',
            'email'       => 'nullable'
        ]);

        $customer = Customer::findOrFail($request->customer_id);
        $customerData = [
            'name'        => $request->name,
            'carModel'    => $request->carModel,
            'plateNum'    => $request->plateNum,
            'phoneNum'    => $request->phoneNum,
            'address'     => $request->address,
            'email'       => $request->email
        ];
        $customer->update($customerData);

        $service = Service::findOrFail($id);
        $serviceData = [
            'description' => $request->description
        ];
        $service->update($serviceData);





        return redirect()->route('services.index');

    }

    public function finish($id){
        $service = Service::where('id', $id)->with('customer')->firstOrFail();

        return view('services.finish', compact('service'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('services.index');
    }
}
