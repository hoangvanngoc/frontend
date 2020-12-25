<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Support\Facades\view;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Slider;
use App\Models\ProductImage;
use App\Models\Userct;
use App\Models\ProductTag;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Str;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $result;
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }


    public function viewproduct($id)
    {
        $categorylimit = Category::where('parent_id', 0)->take(2)->get();
        $categories = Category::where('parent_id', 0)->take(6)->get();
        $productRecommend = Product::latest('view_count','desc')->take(12)->get();
        $products = Product::where('id',$id)->latest()->take(9)->get();
        $sliders = Slider::where('id',$id)->latest()->get();
        $productImage = ProductImage::where('product_id',$id)->take(3)->get();
        $users = Userct::where('status',1)->get();

        // $po = DB::table('products1s')->join('$')
        return view('product.product_detail.home_detail',compact('categorylimit','categories','productRecommend','products','sliders','productImage','users'));

    }


    public function query(Request $request)
    {
        $categories = Category::where('parent_id', 0)->take(6)->get();
        $productRecommend = Product::latest('view_count','desc')->take(12)->get();
        $categorylimit = Category::where('parent_id', 0)->take(2)->get();
        $users = Userct::where('status',1)->get();
        $result = $request->get('search');
        // $products = Product::where('id',$id)->latest()->take(9)->get();
        $sliders = Slider::latest()->get();
        $users = Userct::where('status',1)->get();

        $query = ProductTag::query()->join('Products1s','Product_tags.product_id','=','Products1s.id')->join('tags','Product_tags.tag_id','=','tags.id')->select('products1s.name as product_name','tags.name as tag_name','Product_tags.id','products1s.price','products1s.feature_image_path');
        if($result){
            $query->where('Products1s.name','like','%'.$result.'%')->orWhere('tags.name','like','%'.$result.'%');
        }
        $kqSearch = $query->orderBy('Product_tags.id', 'desc')->get();
        //


        return view('home.listSearch', compact('sliders','users','categories','productRecommend','categorylimit','kqSearch','users'));
    }

    /////  cart /////////
    public function index(){
        $products = Product::all();
        return view('cartproducts.products', compact('products'));
    }
    public function cart(){
        $categorylimit = Category::where('parent_id', 0)->take(2)->get();
        $products = Product::all();
        // $image = Product::where('id','product_id')->feature_image_path()->get();
        return view('cartproducts.cart',compact('products','categorylimit'));

    }

    public function addToCart($id){
        $products = Product::find($id);
        // if cart is empty then this first product
        if(!$products){
            abort(404);
        }
        $cart= session()->get('cart');

        if(!$cart){
            $cart=[
                $id =>[
                    "name"=>$products->name,
                    "quantity"=>1,
                    "price"=>$products->price,
                    "feature_image_path"=>$products->feature_image_path
                ]
                ];
                session()->put('cart',$cart);
                return redirect()->back()->with('success','Sản phẩm đã được thêm vào rỏ hàng thành công');

                    }
        //if cart not empty then check  if this product exist then increment quantity
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success','Sản phẩm đã được thêm vào rỏ hàng thành công');
        }
        $cart[$id] = [
         "name"=> $products->name,
         "quantity"=>1,
         "price"=> $products->price,
         "feature_image_path"=> $products->feature_image_path
        ];
        // if item not exist in cart then add to cart with quantity = 1
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Sản phẩm đã được thêm vào rỏ hàng thành công');
    }

    public function update(Request $request){
      if($request->id and $request->quantity){
          $cart =session()->get('cart');
          $cart[$request->id]['quantity'] = $request->quantity;
          session()->put('cart', $cart);
          session()->flash('success', 'Rỏ hàng Update thành công.');
      }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Xóa thành công.');
        }
    }

    public function getCheckOut(Request $request) {
        $categorylimit = Category::where('parent_id', 0)->take(2)->get();
        $this->data['title'] = 'Check out';
        $this->data['cart'] = Cart::content();
        $this->data['total'] = Cart::total();

        return view('cartproducts.checkout',compact('categorylimit'), $this->data);
    }

    public function postCheckOut(Request $request) {
        // $cartInfor = Cart::content();
        $cartInfor = session()->get('cart');
        dd($cartInfor);
        // dd($cart);
        // validate
        $rule = [
            'fullName' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phoneNumber' => 'required|digits_between:10,12'

        ];

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return redirect('/checkout')
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            // save
            $customer = new Customer;
            $customer->name = $request->get('fullName');
            $customer->email = $request->get('email');
            $customer->address = $request->get('address');
            $customer->phone_number = $request->get('phoneNumber');
            $customer->note = $request->note;
            $customer->save();

            $bill = new Bill;
            $bill->customer_id = $customer->id;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = str_replace(',', '', Cart::total());
            $bill->note = $request->get('note');
            $bill->save();

            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new BillDetail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantily = $item->quantity;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
          // del
           Cart::destroy();

        } catch (Exception  $e) {
            echo $e->getMessage();
        }
    }


}
