<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Client;
use App\Models\Config;
use App\Models\Contract;
use App\Models\News;
use App\Models\Project;
use App\Models\Promotion;
use App\Notifications\SendContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use View;

class SiteController extends Controller
{
    protected $configs;
    protected $categories;
    protected $contracts;
    protected $client;

    public function __construct()
    {
        $this->configs = Config::all()->first();
        $this->categories = Category::all()->sortBy('name');
        $this->contracts = new Contract();
        $this->client = new Client();

        View::share('configs',$this->configs);
        View::share('categories',$this->categories);
    }

    public function index(){

        $clients_list = $this->contracts->isValid();
        $news = News::limit(6)->orderBy('id', 'desc')->get();
        $promotions = Promotion::all();
        $carrosels = Banner::all();
       return view('home.index', compact('clients_list', 'promotions', 'carrosels', 'news'));
   }

    public function novo(){

        $clients_list = $this->contracts->isValid();
        $news = News::limit(6)->orderBy('id', 'desc')->get();
        $promotions = Promotion::all();
        $carrosels = Banner::all();
        return view('home.index_new', compact('clients_list', 'promotions', 'carrosels', 'news'));
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->first();
        $clients  = Contract::where('category_id', $category->id)->orderBy('advertsement_id', 'DESC')->get();
        return view('home.search', ['words' => $slug, 'results' => $clients, 'banners' => $category->getBanners()->get()]);
    }

   public function search(Request $request){
       $contractSearch = $this->contracts->where('tags', 'like', '%'.$request->words.'%')->orderBy('advertsement_id', 'DESC')->get();
       $categorySearch = Category::where('name', 'like', '%'.$request->words.'%')->first();

       if (isset($categorySearch)){
           $banners = $categorySearch->getBanners()->get();
       } else {
           $banners = [];
       }
       return view('home.search', ['words' => $request->words, 'results' => $contractSearch, 'banners' => $banners]);
   }

    public function details($client){
        $clientSelected = $this->client->where('slug', $client)->first();
        return view('home.detail', ['client' => $clientSelected]);
    }

    public function register(){
        return view('home.register');
    }

    public function about(){
        return view('home.about');
    }

    public function terms(){
        return view('home.terms');
    }

    public function policies(){
        return view('home.policies');
    }

    public function projects(){
        $projects = Project::all();
        return view('home.projects', compact('projects'));
    }

    public function projectDetail($slug){
        $project = Project::where('slug', $slug)->first();
        return view('home.project-detail', compact('project'));
    }

    public function sendContact(Request $request){
        Notification::route('mail', 'faleconosco@hojeemcachoeira.com.br')
            ->notify(new SendContact($request->all()));


        return view('home.register', ['success'=>true]);
    }

    public function catalogs($slug){

        $client = Client::where('slug', $slug)->first();

        $catalogs = Catalog::where('client_id', $client->id)->paginate(4);


        return view('home.catalogs', compact('catalogs', 'client'));
    }

    public function catalog(Catalog $catalog){

        return view('home.catalog', compact('catalog'));
    }

    public function news(News $news)
    {
        $notices = News::all()->sortByDesc('id');
        $notice_body = Str::of($news->body)->explode('[banner]');
        return view('home.news', compact('news', 'notice_body', 'notices'));
    }
}
