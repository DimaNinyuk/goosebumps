<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Track;
use App\Genre;
use App\GenreTrack;
use App\Like;
use App\Dislike;
use App\Playlist;
use App\TrackPlaylist;
use App\Comment;
use DB;

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
    public function index()
    {
        if(Auth::user()->roles->count() == 0){
            return $this->user();
        }
        $login = Auth::user()->roles->first()->role->name;
        if($login == 'admin'){
            return $this->admin();
        }else if($login == 'user'){
            return $this->user();
        } else if ($login == 'author'){
            return $this->author();
        } else {
            return $this->user();
        }
        
    }

    public function user()
    {
        $tracks = Track::get();
        $genres=Genre::get();
        $auth=Auth::user();
        $playlistsid=Playlist::where('user_id',Auth::user()->id)->first();
        return view('user',compact('tracks','genres','auth','playlistsid'));
    }
    
    public function list(){
        
       
        $tracks =Like::where('user_id',Auth::user()->id)->get();
        $auth=Auth::user();
        return view('list',compact('auth','tracks'));
    }
    public function admin()
    {
        $tracks = Track::get();
        $genres=Genre::get();
        $auth=Auth::user();
        return view('admin',compact('tracks','genres','auth'));
    }
    public function author()
    {
        $tracks = Track::get();
        $genres=Genre::get();
        $auth=Auth::user();
        return view('author',compact('tracks','genres','auth'));
    }
    public function genre($id){
        $tracks = GenreTrack::where('genre_id',$id)->get();
        $genres=Genre::get();
        $auth=Auth::user();
        return view('genre',compact('tracks','genres','auth'));
    }
    public function addlike(Request $request){
        $user_id = $_POST['user_id'];
        $track_id = $_POST['track_id'];
       
        Like::create(['user_id'=>$user_id,'track_id'=>$track_id]);

    }
    public function deletelike(Request $request){
        $user_id = $_POST['user_id'];
        $track_id = $_POST['track_id'];
        Like::where(['user_id'=>$user_id,'track_id'=>$track_id])->first()->delete();

    }
    public function adddislike(Request $request){
        $user_id = $_POST['user_id'];
        $track_id = $_POST['track_id'];
        Dislike::create(['user_id'=>$user_id,'track_id'=>$track_id]);

    }
    public function deletedislike(Request $request){
        $user_id = $_POST['user_id'];
        $track_id = $_POST['track_id'];
        Dislike::where(['user_id'=>$user_id,'track_id'=>$track_id])->first()->delete();

    }
    public function addcomment(){
        $user_id = $_POST['user_id'];
        $track_id = $_POST['track_id'];
        $text = $_POST['text'];
        Comment::create([
            'user_id'=>$user_id,
            'track_id'=>$track_id,
            'text'=>$text
        ]);
        return redirect(url()->previous());

    }

   public function deletetrack(){
    $track_id = $_POST['track_id'];
    Dislike::where('track_id',$track_id)->delete();
    Like::where('track_id',$track_id)->delete();
    Comment::where('track_id',$track_id)->delete();
    GenreTrack::where('track_id',$track_id)->delete();
    Track::destroy($track_id);
    return "";
   }
   public function deletec(){
       $comment_id = $_POST['comment_id'];
       Comment::destroy($comment_id);
       return "";

   }
    public function top(){
        $likes=DB::table('tracks')
        ->leftjoin('likes','tracks.id','=','likes.track_id')
        ->groupBy('tracks.id')
        ->selectRaw('count(likes.id) as count,tracks.id as track')
        ->orderByDesc('count')
        ->limit(100)->get();
        
      //->select('tracks.id as track','likes.id as likeid')
     
   

    $tracks=collect([]);
      
  
              
    for($i =0;$i<$likes->count();$i++){
        $tracks->push(Track::find($likes[$i]->track));
      }
        
        $auth=Auth::user();
       
        return view('top',array('tracks'=>$tracks,'auth'=>$auth));
    }

}
