<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Session;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(4);
        return view('home',compact('data'));
    }
    public function search(Request $request){
        // dd("kp");
        $search = $request->get('search');
        // User --> model & roles --> method of user model which contains relationship B/W User and Role
        $data = User::with('roles')->where('id', 'like', '%'.$search.'%')
                                    ->orWhere('name','like','%'.$search.'%')
                                    ->orWhere('lastname','like','%'.$search.'%')
                                    ->orWhere('email','like','%'.$search.'%')


                                    ->orWhereHas ('roles', function($q) use ($search) {
                                        return $q->where('name', 'LIKE', '%'. $search . '%');
                                    })
                                    ->get();
        return view('home',compact('data'));
       
        
    }

  

    public function create(){
        return view('create ');
    }

    public function store(StoreCustomRequest $request) {
        $validated = $request->validated(); //for validation which is custom
        $save = new User();
        $save->name=$request->get('name');
        $save->lastname=$request->get('lastname');
        $save->email=$request->get('email');
        $save->password=Hash::make('password');
        $save->password_confirmation=Hash::make('password_confirmation');
        $save->role_id=$request->get('role_id');
        $save->save();
        //dd($save);
    		return redirect('home')->with('success','Added Successfully');

    }

    
    public function edit(User $user,$id) {
    	
        //return view('edit');
        $user=User::findOrFail($id);
        return view('edit',compact('user'));
    }

    public function update(request $request,$id) {
        $request->validate([
            'name' => 'required|min:3|max:10',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns',
            'role_id' => 'required'   
        ]);      
        $user=User::findOrFail($id);
    	$data=$request->all();
    	$user->update($data);
    	return redirect('home')->with('success','Updated SuccessFully');
    }

    public function delete($id) {
        $user=User::whereId($id)->delete();
            	return redirect('home')->with('success','Deleted SuccessFully');
    }


    public function searchFunctionality(Request $request){

        $input= User::query();
        if ($request->has('name')) {
            $input->where('name','like','%'.$request->input('name').'%');
        }

        if ($request->has('lastname')) {
            $input->where('lastname','like','%'.$request->input('lastname').'%');
        }

        if ($request->has('email')) {
            $input->where('email','like','%'.$request->input('email').'%');
        }

        if($request->has('role_id')){
            $input->where('role_id','like','%'.$request->input('role_id').'%');
        }

        if(!$input || !$input->count()) {
            Session::flash('no-results','Data not Found');
        }

        

       

        $data = $input->paginate(10);
       // dd($data1);
        return view('home',compact('data')); 

    }

    

    public function abc(){
        return view('abc');
    }

    
}
