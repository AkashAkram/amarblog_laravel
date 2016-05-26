<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Category;
use App\Http\Requests;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;
//use Illuminate\Foundation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {
        $blogs =  Article::orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();

        return view('blog.index',compact('blogs','categories'));
    }


    //_____________________create post_________________________________


    public function create()
    {
        $this->middleware('auth');
        
            $categories = Category::all();
            return view('blog.create',compact('categories'));

    }
//----------------------------insert post---------------------------------

    /**
     * @return mixed
     */
    public function post()
    {
        if($this->middleware('auth'))
        {
            if(isset($_POST['postButton']))
            {
                $image = $_FILES['image']['name'];
                $tempName = $_FILES['image']['tmp_name'];

                $Article = new Article();

                $Article->title = Request::input('title');
                        if(isset($image))
                        {
                            if(!empty($image))
                            {
                                $Article->cover = $image;
                                $location = "post_images/";
                                
                                move_uploaded_file($tempName, $location.$image);
                            }
                        }
                        else
                        {
                             $Article->cover = 'no_image.png';
                        }
                $Article->author_id= Request::input('author');
                $Article->category_id = Request::input('category_id');
                $Article->body = Request::input('body');

                $Article->save();

            }
            return redirect('/');

        }
        else
            return view('errors.503');

    }

    //_____________________Single post_________________________________

    public function singlepost($id)
    {
        if($this->middleware('auth'))
        {
            $blog=Article::find($id);
            $categories = Category::all();
            return view('blog.singlepost',compact('blog','categories'));
        }
        else
            return view('errors.503');

    }

    //_____________________My blogs_________________________________


    public function myblog()
    {
        if($this->middleware('auth'))
        {
            $id = Auth::user()->id;
            $categories= Category::all();
            $blogs = Article::where('author_id', $id)->orderBy('created_at', 'desc')->paginate(5);
            return view('blog.index',compact('blogs','categories'));
        }
        else
            return view('errors.503');
    }


    //_____________________edit post_________________________________


    public function editpost($id)
    {
        if ($this->middleware('auth'))
        {
            $blog = Article::select()->where('id',$id)->first();

            $categories = Category::all();
            return view('blog.update',compact('blog','categories'));
        }
        else
            return view('errors.503');
    }


    //_____________________Update post_________________________________

    public function updatepost($id)
    {
            $this->middleware('auth');
        
            if(isset($_POST['updateButton']))
            {

                
                $image = $_FILES['image']['name'];
                $tempName = $_FILES['image']['tmp_name'];

                $update_data = Article::find($id);
                    $update_data->title = Request::input('title');

                         if(isset($image))
                        {
                            if(!empty($image))
                            {
                                $update_data->cover = $image;

                                $location = "post_images/";
                                move_uploaded_file($tempName, $location.$image);
                            }
                        }
     
                    $update_data->body =  Request::input('body');
                    $update_data->category_id = Request::input('category_id');

                $update_data->save();
                 

               
            }
           // $flight = App\Flight::find(1);
            //$flight->name = 'New Flight Name';
            //$flight->save();
            return redirect('../');
 

    }

    //_____________________Remove post_________________________________

    public function removepost($id)
    {
        $this->middleware('auth');
        {

            Article::destroy($id);
            return redirect('/');
        }
    }


  


}
