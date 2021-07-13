<?php

namespace App\Http\Controllers;
use App\Track;
use Illuminate\Http\Request;
use DateTime;
use App\User;
use App\UserRole;
use App\Genre;
use App\GenreTrack;
use App\Exports\TrackExport;
use Maatwebsite\Excel\Facades\Excel;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $genres = Genre::all();
        return view('admin-setting',compact('genres'));
    }
    public function settingauthor()
    {
        $genres = Genre::all();
        return view('author-setting',compact('genres'));
    }
    public function loadmusic(){
        if(isset($_POST['name']) && isset($_POST['author'])){
            $name=htmlentities($_POST['name']);
            $author = $_POST['author'];
            $year = (new DateTime)->format("Y");
            $uploaddir = public_path() .'/music';
            $uploaddirm =public_path() .'/img';
            $namefile = time().rand(0,1000000).'_'.basename($_FILES['file']['name']);
            $namefilem=time().rand(0,1000000).'_'.basename($_FILES['fileimg']['name']);
            $uploadfile = $uploaddir .'/'. $namefile;
            $uploadfilem=$uploaddirm .'/'. $namefilem;
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
            move_uploaded_file($_FILES['fileimg']['tmp_name'],$uploadfilem);
            $tracknew=Track::create([
                'name' => $name,
                'image' => $namefilem,
                'path' => $namefile,
                'year' =>$year,
                'author' =>$author
            ]);
            $genre_id = $_POST['genre_id'];
            GenreTrack::create([
                'track_id'=>$tracknew->id,
                'genre_id'=>$genre_id
            ]);
            
        }
        return redirect(url()->previous());
    }
    public function setrole(){
        $usersetrole = User::get();
        return view('admin-setting-roles',compact('usersetrole'));
    }
    public function setroles(){
        if(isset($_POST['add-role']) && $_POST['add-role']){
            $iduser=$_POST['id'];
            UserRole::where('user_id',$iduser)->update(['role_id'=>3]);
        } else if(isset($_POST['delete-role']) && $_POST['delete-role']){
            $iduser=$_POST['id'];
            UserRole::where('user_id',$iduser)->update(['role_id'=>2]);
        }
        return redirect('/admin-setting-roles');
        
    }
    public function exportfile(){
       
        return Excel::download(new TrackExport, 'tracks.xlsx');
    }

}
