<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        
        $users = User::query()->where('type', 2)->get();
        return view('admin.pages.user.index',compact('users'));
    }
    public function create(User $users)
    {
        return view('admin.pages.user.create',compact('users'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request['password']);
        $user->type = 2;
        $user->save();

        $userID = $user->id;

        // dd($userID);

        Company::create([
            'user_id' => $userID,
            'name' => "...",
            'phone' => "...",
            'email' => "...",
            'address' => "...",
        ]);

        //Toast Message 
        return redirect()->route('users.index');
        return redirect('/admin/users')->with('success', 'User is created successfully.');
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $users = User::find($id);
        $users->name = $request->name;
        // $users->email = $request->email;
        $users->type = 2;
        $users->update();

        //Toast Message 
        return redirect()->route('users.index');
        return redirect('/admin/users')->with('success', 'User is updated successfully.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.pages.user.index',compact('user'));

   
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
      
        return redirect()->route('users.index');
        return redirect('/admin/users')->with('success', 'User is deleted successfully.');
    }
    /**
     * To update status of user
     * @param Interger $user_id
     * @param Interger $status_code
     * @return Success Response
     */
    public function updateStatus($user_id, $status_code)
    {
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);

            if ($update_user) {
                return redirect()->route('users.index');
            }
            return redirect()->route('users.index');
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }
}
