<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request
    )
    {
        return view('create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:8',
            'image' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'upload/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
    
        User::create($input);

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {   
        return view('edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'first_name' => ['required','string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],
            'image' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        if(! is_null($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:8'],
            ]);

            $data['password'] = $request->password;
        }



        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'upload/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $user->update($input);

        return redirect(route('users.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        $user->delete();
        return back();
    }
}
