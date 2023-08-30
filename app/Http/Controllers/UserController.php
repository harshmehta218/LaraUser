<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\create;
use App\Models\reseller;
use App\Models\supllier;
use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('list');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(create $request)
    {
        $userCreate = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_type' => $request->role,
            'role_id' => ($request->role == 'suppliers') ? 1 : 2
        ]);

        if ($request->role == 'suppliers') {
            supllier::create([
                'address' => $request->address,
                'contact_no' => $request->contact_no
            ]);
        } else {
            reseller::create([
                'address' => $request->address,
                'contact_no' => $request->contact_no
            ]);
        }

        if ($request->file('files')) {
            foreach ($request->file('files') as $file) {
                $fileOriginamName = $file->getClientOriginalName();
                $fileName = Str::random(8) . $file->getClientOriginalName() . $file->extension();
                $fileSize = $file->getSize();
                $fileExtension = $file->extension();
                $file->move(storage_path('app/public/files'), $fileOriginamName);
                $userImage = new UserImage();
                $userImage->user_id = $userCreate->id;
                $userImage->file_original_name = $fileOriginamName;
                $userImage->file_name = $fileName;
                $userImage->file_size = $fileSize;
                $userImage->extension = $fileExtension;
                $userImage->save();
            }
        }

        return redirect()->route('user.index')->with(['message', 'your data is created sucessfully']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
