<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;


use App\Models\Blood;
use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\{Country,City,State};

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(Request $request, Donor $donor)
    {
        $email = $request->input('email');
        $password = $request->password;



        $donor = Donor::where('email',$email)->first();
        if(empty($donor)){
            return redirect()->back()->with('errorLogin','Invalid Email!');
        }
        
        $check = Hash::check($password, $donor->password);
        $loginSuccess = "You're Logged in!";
    //    dd($donor);
        if ($donor && Hash::check($request->password, $donor->password)) {
            return view('show',compact('donor','loginSuccess'));
        } else {
           return redirect()->back()->with('errorLogin','Invalid Password!');
        }
        
        

    }
    public function index()
    {
        return view('index');
    }

    public function fatchState(Request $request)
    {
        $data['states'] = State::where('country_id',$request->country_id)->get(['name','id']);
 
        return response()->json($data);
    }
 
    public function fatchCity(Request $request)
    {
        $data['cities'] = City::where('state_id',$request->state_id)->get(['name','id']);
 
        return response()->json($data);
    }

    public function insertBloodGroups()
    {
        // Insert blood groups
        Blood::create([
            'group' => 'A+',
        ]);

        Blood::insert([
            ['group' => 'A-'],
            ['group' => 'A1+'],
            ['group' => 'A1-'],
            ['group' => 'A1B+'],
            ['group' => 'A1B-'],
            ['group' => 'A2+'],
            ['group' => 'A2-'],
            ['group' => 'A2B+'],
            ['group' => 'A2B-'],
            ['group' => 'AB+'],
            ['group' => 'AB-'],
            ['group' => 'B+'],
            ['group' => 'B-'],
            ['group' => 'Bombay Blood Group'],
            ['group' => 'O+'],
            ['group' => 'O-']
        ]);

        return 'Blood groups inserted successfully!';
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function getCountries()
    {
        return $countries = Country::get(['name','id']);
    }
    public function getBlood(){
       return $bloodGroups = Blood::all();
    }

    public function create()
    {
        $countries = $this->getCountries();
        $bloodGroups = $this->getBlood();
        // $countries = Country::get(['name','id']);

        // // return view('dropdown',compact('countries'));
        // $bloodGroups = Blood::all();
        return view('create',compact('bloodGroups','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=>'required|unique:donors,email|email',
            'password' =>'required|string|min:8|confirmed',
            'phone' => 'required|numeric|unique:donors,phone',
            'address' => 'required',
            'country'=> 'required',
            'state'=> 'required',
            'city'=> 'required',
            'bgroup'=> 'required',
            'is_avail'=> 'required'
        ],[
            'phone.unique' => 'Phone Number already exists',
            'password.confirmed' => 'Password does not match!'
        ]);

        

        $data = $request->except('_token','password_confirmation');

        $data['password'] = bcrypt($request->password);
        $data['bgroup'] = Blood::find($data['bgroup'])->group;
        $data['city'] = City::find($data['city'])->name;
        $data['country'] = Country::find($data['country'])->name;
        $data['state'] = State::find($data['state'])->name;

        if(empty($data['last_donated'])){
            $data['last_donated'] = "Not Provided";
        }
       

        // dd($request->all());
        Donor::create($data);

        return redirect()->route('donor.login')->withsuccess('Registered Successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    public function searchShow(Request $request)
    {
        $data = $request->all();
        $data['bgroup'] = Blood::find($data['bgroup'])->group;
        $data['city'] = City::find($data['city'])->name;
        $data['country'] = Country::find($data['country'])->name;
        $data['state'] = State::find($data['state'])->name;

        $search = Donor::where('city',$data['city'])
                        ->where('bgroup',$data['bgroup'])
                        ->where('is_avail','Available')
                        ->paginate(10);

        
        
        // echo $search->name;
        // echo $search->phone;
        // echo $search->city;
        // echo $search->bgroup;
        // echo $search->is_avail;
        // echo $search->last_donated;

        return view('Searchshow',compact('search'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donor $donor)
    {
        $countries = $this->getCountries();
        $bloodGroups = $this->getBlood();
        return view('edit',compact('donor','countries','bloodGroups'));
    }

    public function login()
    {
        return view('login');
    }

    

    public function search(Request $request)
    {
        $countries = $this->getCountries();
        $bloodGroups = $this->getBlood();

        if ($request->isMethod('post')) {
            return "correct";
        }
        return view('search',compact('bloodGroups','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donor $donor)
    {
        $request->validate([
            'name'=> 'required',
            'email'=>'required|unique:donors,email,'.$donor->id.'|email',
            'phone' => 'required|numeric|unique:donors,phone,'.$donor->id,
            'address' => 'required',
            'country'=> 'required',
            'state'=> 'required',
            'city'=> 'required',
            'bgroup'=> 'required',
            'is_avail'=> 'required'
        ],[
            'phone.unique' => 'Phone Number already exists',
            'password.confirmed' => 'Password does not match!'
        ]);

        $data = $request->all();

        // for seeing the data value is string or numeric
        if (preg_match('/^\d+$/', $data['country']) && preg_match('/^\d+$/', $data['state']) && preg_match('/^\d+$/', $data['city'])) {
            $data['country'] = Country::find($data['country'])->name;
            $data['state'] = State::find($data['state'])->name;
            $data['city'] = City::find($data['city'])->name;
        } 

        if(preg_match('/^\d+$/', $data['bgroup']) )
            $data['bgroup'] = Blood::find($data['bgroup'])->group;

        
       

        if(empty($data['last_donated'])){
            $data['last_donated'] = "Not Provided";
        }
        $donor->update($data);
        return redirect()->route('donor.profile.edit', $donor->id)
        ->with('updateSuccess','Employees Details updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
