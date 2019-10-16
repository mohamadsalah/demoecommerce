<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;
use App;
use Session;
use App\Http\Requests;
use App\Http\Interfaces\ProductRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ProductRepositoryInterface $ProductInterface)
    {
        $cars=$ProductInterface->getCategory('cars');
        $mobiles=$ProductInterface->getCategory('mobiles');
        $home=$ProductInterface->getCategory('home');
        $computers=$ProductInterface->getCategory('computers');
        $clothes=$ProductInterface->getCategory('clothes');
        $buldings=$ProductInterface->getCategory('buldings');
        $all=product::where('approve','=','1')->orderby('created_at')
        ->limit(10)->get();
        
        return view('home')
        ->withcars($cars)->withclothes($clothes)
        ->withcomputers($computers)->withhome($home)
        ->withmobiles($mobiles)->withbuldings($buldings)
        ->withall($all);
       
    }

  public function lang($loc)
    {
       
        session(['lang' => ''.$loc]);
       app()->setLocale($loc);
      
        return redirect()->back();
    }
}