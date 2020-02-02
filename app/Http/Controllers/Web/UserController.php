<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = new User();
        $users = ($request->search != null)
        ? $users->where('name','like',"%$request->search%")
            ->paginate(10)
            : $users = User::orderBy('is_admin','desc')->paginate(10);
            // : $users->paginate(10);
        return view('admin.master.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all);
        // DB::beginTransaction();
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'email_verified_at' => Carbon::now(),
            'api_token' => str_random(18),
            'is_admin' => (int)$request->is_admin,
            'password' => bcrypt($request->password),
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            // 'password' => $request->getPassword(Hash::make('password')),
        ]);
        // dd($request->all);
        return redirect()->route('user.index');

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
        $users = User::find($id);
        // select * from users where id = $id
        // DB::table('users')->where('id',$id)->first();
        // User::where('id',$id)->first();
        // User::find($id);

        return view('admin.master.user.edit', compact('users'));
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
        // dd($request);
        $users = User::find($id);
        // DB::beginTransaction();

        try {
            $users->update([
                "name" => $request->name,
                "email" => $request->email,
                "username" => $request->username,
                // "is_admin" => $request->is_admin,
                "is_admin" => (int) $request->is_admin
                // "description" => $request->description,
            ]);
            // dd($request->all());

            DB::commit();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            // dd($e);
        }
        return redirect()->route("user.index");
        // dd($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // dd($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route("user.index");
    }

}
