<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\product;
use App\Events\test;
use App\proReport;
use File;
use App\prodimg;
use App\User;
use App\Requests\FormRequest;
use App\Http\Requests\createProduct;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\report;
use Auth;


class productController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
     public function __construct(){

        $this->middleware('auth')->except(['index', 'show','category','report','search']);

    }
    public function index()
    {
        return view('product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form');
    }

    /**.
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

    public function store(createProduct $request)
    {
    

       $product=new product();
       $product->create($request);
       $success='product added ';
       session(['success'=>$success]);
       
      return redirect('/home');
    }


    public function drop($id)
    {
       $product =product::withTrashed()->find($id);
        if($product){
       $product->forceDelete();
        $success='product deleted for ever now ';
        session(['success'=>$success]);
        return back();

                       }
        else
        {
        $fail='no products found ';
        session(['fail'=>$fail]);
        return back();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

      $product =product::withTrashed()->where('approve','=','1')->find($id);
    
      if($product){
        $similar=product::where('category','=',$product->category)
      ->orWhere('brand','=',$product->brand)
      ->get();
      return view('product',['product' => $product,'similar' => $similar]);
           }
                
      else
                return back();
            
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
   
    }




public function search(Request $request)
{
            $products=\DB::table('products')
            ->where('name','LIKE','%'.$request->search."%")
            ->where('approve')
            ->orWhere('location','LIKE','%'.$request->search."%")
            ->orWhere('category','LIKE','%'.$request->search."%")
            ->orWhere('brand','LIKE','%'.$request->search."%")
            ->orWhere('price','LIKE','%'.$request->search."%")
            ->get();
        if($request->ajax())
        {
          $output='';           
            if($products->count()>0)
                {
                                    
                        foreach ($products as  $product)
                         {
                            $output.='<tr>'.
                            '<td>'.$product->name.'</td>'.
                            '<td>'.$product->location.'</td>'.
                            '<td>'.$product->price.'</td>'.
                            '<td>'.$product->category.'</td>'.
                            '<td><a href="/product/'.$product->id.'">view</a></td>'.
                            '</a></tr>';

                          }

                  $data = array('output'  => $output);

                  echo json_encode($data);
                }

            else
                {
                       $output .='
                       <tr>
                        <td align="center" colspan="5"> "No Products Found" for your keywords</td>
                       </tr>
                       ';
                       $data = array(
                       'output'  => $output
                      );
                       echo json_encode($data);
                }
             
           
        }
        else{
          
                return view('search')->withproducts($products);
            
        }
}





 public function report(Request $request, $id)
    { 
        // getting reported project and notify the owner and admin

        $report=new proReport();
        $report->create($request, $id);
       // getting reported project and notify the owner and admin
        $product =product::withTrashed()->find($id);
        $product->report+=1;
        $product->save();
        $user =$product->user()->get();
        $type=$request->input('report');
        $describtion=$request->input('describtion');
        Notification::send($user,new report($type,$describtion,$id));
        $success='product reported successfully';

        $request->merge(["productId"=>$id]);

          event(new test($request,$user->first()->id));

        return back()->withsuccess($success);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =product::find($id);
        
        if($product){
                product::destroy($id);
                $success='product have been pinned now ';
                session(['success'=>$success]);
                return back();
                    }
        else{
            $fail='no products found ';
            session(['fail'=>$fail]);
            return back();
            }

    }

    public function category($cat,$bran = null){
        if ($bran)
            {

                $products=product::where('brand','=',$bran)->where('approve')->get();
                if($products)
                    {
                    return view('category',['products' => $products,'cat' => $cat,'brand' => $bran]);
                    }
                else
                    {
                        return back();
                    }

            }
        else
            {
                $products=product::where('category','=',$cat)->where('approve')->get();
                if($products)
                {
                return view('category')->withproducts($products)->withcat($cat);
                }
                else
                {
                        return back();
                }
}

}}
