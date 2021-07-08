<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Requests\Faqformpost;
use App\Http\Requests\EditProfilePost;
use App\Mail\PassChangeConfirm;
use Mail;
use App\Faq;
use Illuminate\Http\Request;
use app\User;
use App\Category;
use App\Product;
use Auth;
use Hash;

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
        $this->middleware('verified');
        $this->middleware('CheckRole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logged_user_id = Auth::id();
        $users = User::where('id','!=',$logged_user_id)->orderBy('id','desc')->paginate(2);
        $total_user = User::count();
        $categories = Category::count();
        $products = Product::count();
        $logged_user = Auth::user();
        return view('home',compact('users','total_user','logged_user','logged_user_id','categories','products'));
    }
    public function addfaq()
    {
      $faqs = Faq::all();
      $trashed_faqs = Faq::onlyTrashed()->get();
      return view('admin.addfaq',compact('faqs','trashed_faqs'));
    }
    public function addfaqpost(Faqformpost $request)
    {
    //   $request->validate([
    //   'faq_question'=>'required',
    //   'faq_answer'=>'required'
    // ],[
    //   'faq_question.required'=>'Question Koi?',
    //   'faq_answer.required'=>'Answer Koi?'
    // ]);

      Faq::insert([
        'faq_question'=> $request->faq_question,
        'faq_answer'=> $request->faq_answer,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('success','Add FAQ Successfully');
    }
    public function faq_delete($faq_id)
    {
      Faq::find($faq_id)->delete();
      return back()->with('trash_success','FAQ Trashed Successfully');
    }
    public function faq_edit($faq_id)
    {
      $faq_edit = Faq::find($faq_id);
      return view('admin.faq_edit',compact('faq_edit'));
    }
    public function faq_edit_post(Request $request)
    {
      Faq::find($request->faq_id)->update([
        'faq_question'=>$request->faq_question,
        'faq_answer' => $request->faq_answer
      ]);
      return back()->with('update_success','Update Successfully');
    }
    public function faq_restore($faq_id)
    {
      Faq::withTrashed()->where('id',$faq_id)->restore();
      return back();
    }
    public function faq_force_delete($faq_id)
    {
      Faq::withTrashed()->where('id',$faq_id)->forceDelete();
      return back()->with('delete_success','Delete Successfully');
    }
    public function users()
    {
      $logged_user_id = Auth::id();
      $users = User::where('id','!=',$logged_user_id)->orderBy('id','desc')->paginate(3);
      $total_user = User::count();
      $logged_user = Auth::user();
      return view('admin.users',compact('users','total_user','logged_user','logged_user_id'));
    }
    public function editprofile()
    {
      return view('admin.editprofile');
    }
    public function editprofilepost(EditProfilePost $request)
    {
      $old_password = $request->old_password;
      $db_password = Auth::user()->password;
      if (Hash::check($old_password,$db_password)) {
        User::find(Auth::id())->update([
          'password' => Hash::make($request->password),
        ]);
        Mail::to(Auth::user()->email)->send(new PassChangeConfirm);
        return back()->with('editsuccess','Password update Successfully');
      } else {
        return back()->with('editerror','Password does not match!');
      }
    }


}
