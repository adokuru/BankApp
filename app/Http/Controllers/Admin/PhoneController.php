<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = base_path('phonecode.json');
        $phone_numbers = json_decode(file_get_contents($path), true);
        array_multisort(array_map(function($phone_numbers) {
            return $phone_numbers['code'];
        }, $phone_numbers), SORT_ASC, $phone_numbers);
        return view('admin.phone.index', compact('phone_numbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.phone.create');
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
            'name'       => 'required',
            'dial_code'  => 'required',
            'code' => 'required|max:2',
        ]);

        $phone['name'] = $request->name;
        $phone['dial_code'] = $request->dial_code;
        $phone['code'] = strtoupper($request->code);

        $path = base_path('phonecode.json');
        $phone_numbers = json_decode(file_get_contents($path), true); 

        foreach($phone_numbers as $pn) {
            if($pn['code'] == $phone['code']) { 
                $error['errors']['err']= 'Data Already Exists';
                return response()->json($error,401); 
                break;
            }elseif ($pn['name'] == $phone['name']) {
                $error['errors']['err']= 'Data Already Exists';
                return response()->json($error,401); 
                break;
            }elseif ($pn['dial_code'] == $phone['dial_code']) {
                $error['errors']['err']= 'Data Already Exists';
                return response()->json($error,401); 
                break;
            }
        }
        array_push($phone_numbers, $phone);
        file_put_contents($path, json_encode($phone_numbers));
        return response()->json('Successfully Added'); 
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
    public function edit($code)
    {      
        $path = base_path('phonecode.json');
        $phone_numbers = json_decode(file_get_contents($path), true);
        // $phone_numbers = $phone_numbers[0]['code'];
        // $phone_number = $phone_numbers[$code];

        dd($phone_numbers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $request->validate([
            'name'       => 'required',
            'dial_code'  => 'required',
            'code' => 'required|max:2',
        ]);
        $phone['name'] = $request->name;
        $phone['dial_code'] = $request->dial_code;
        $phone['code'] = strtoupper($request->code);
        
        $path = base_path('phonecode.json');
        $phone_numbers = json_decode(file_get_contents($path), true); 
        $arr_index = array();
        foreach ($phone_numbers as $key => $value)
        {
            if ($value['code'] == $code)
            {
                $arr_index[] = $key;
            }
        }
        foreach ($arr_index as $i)
        {
            unset($phone_numbers[$i]);
        }

        $phone_numbers = array_values($phone_numbers);
        
        file_put_contents(base_path('phonecode.json'), json_encode($phone_numbers));

        foreach($phone_numbers as $pn) {
            if($pn['code'] == $phone['code']) { 
                $error['errors']['err']= 'Data Already Exists';
                return response()->json($error,401); 
                break;
            }elseif ($pn['name'] == $phone['name']) {
                $error['errors']['err']= 'Data Already Exists';
                return response()->json($error,401); 
                break;
            }elseif ($pn['dial_code'] == $phone['dial_code']) {
                $error['errors']['err']= 'Data Already Exists';
                return response()->json($error,401); 
                break;
            }
        }
        array_push($phone_numbers, $phone);
        file_put_contents($path, json_encode($phone_numbers));
        return response()->json('Successfully Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $path = base_path('phonecode.json');
        $phone_numbers = json_decode(file_get_contents($path), true); 
        $arr_index = array();
        foreach ($phone_numbers as $key => $value)
        {
            if ($value['code'] == $code)
            {
                $arr_index[] = $key;
            }
        }
        foreach ($arr_index as $i)
        {
            unset($phone_numbers[$i]);
        }

        $phone_numbers = array_values($phone_numbers);
        
        file_put_contents(base_path('phonecode.json'), json_encode($phone_numbers));

        return redirect()->back()->with('message','Phone Code Delete successfully!');
    }
}
