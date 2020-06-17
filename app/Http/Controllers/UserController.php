<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

        /**
         * Load the post images
         */

        $user = \Auth::user();

        $images = Image::where('user_id','=',$user->id)->OrderBy('id','desc')->get();

        return view('user.index',compact('images','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        $images = Image::where('user_id','=',$id)->OrderBy('id','desc')->get();

        return view('user.index',compact('images','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $id;
        return view('user.edit',compact('user'));
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
        //User
        $user = \Auth::user();
        $id = $user->id;

        //Data validation
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255','unique:users,nickname,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);

        //Data collect
        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $nickname = $request->input('nickname');
        $email = $request->input('email');
    
        //Data reset
        $user->name = $name;
        $user->last_name = $last_name;
        $user->nickname = $nickname;
        $user->email = $email;

        //Execute
        $user->update();

        return redirect()->route('user.edit',$id)
                                ->with(['message'=>'Datos actualizados correctamente']);
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

    /**
     * Save profile image
    */

    public function saveImage(Request $request){
    
        $user = \Auth::user('');

        $validate = $this->validate($request,[
            'photo' => ['required']      
        ]);

        if($request->hasFile('photo')){
          $image = $request->file('photo')->store('uploads','public');
        }

        $user->image = $image;
        $user->update();

        return redirect()->route('user.index');
    }
}
