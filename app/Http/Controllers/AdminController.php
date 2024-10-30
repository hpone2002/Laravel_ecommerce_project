<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{   

    public function index() {
        $user_count = User::where('user_type', 'user')->get()->count();
        $product_count = Product::all()->count();
        $order_count = Order::all()->count();
        $delivered_count = Order::where('status', 'delivered')->get()->count();

        return view('admin.index' , [
            'user_count' => $user_count,
            'product_count' => $product_count,
            'order_count' => $order_count,
            'delivered_count' => $delivered_count,
        ]);
    }

   public function view_category() {
        $categories = Category::orderBy('created_at', 'desc')->get();


        return view('admin.category', compact('categories'));
        // return view('admin.category', [
        //     'categories' => $categories
        // ]);
    }
                                // obj of request class
    public function add_category(Request $request) {
        $category = new Category();

        $category->name = $request->category_name;

        $category->save();

        toastr()->closeButton()->timeout(3000)->addSuccess('Added Category Successfully.');

        return redirect()->back();
    }

    public function delete_category($id) {
        $data = Category::find($id);

        $data->delete();

        toastr()->closeButton()->timeout(3000)->addSuccess('Category deleted successfully.');
        
        return redirect()->back();
    }

    public function edit_category($id) {

        $data = Category::find($id);

        return view('admin.edit_category', [
            'data' => $data
        ]);
    }

    public function update_category(Request $request, $id) {
        $data = Category::find($id);

        $data->name = $request->name;
        $data->updated_at = now();

        $data->save();

        toastr()->closeButton()->timeout(3000)->addSuccess('Updated successfully.');

        return redirect('/view_category');
    }

    public function add_product() {
        $categories = Category::all();

        return view('admin.add_product' , [
            'categories' => $categories
        ]);
    }

    public function upload_product(Request $request) {
        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        
        $image = $request->image;

        if($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('product_images', $imageName);
                                // path             name
            $product->image = $imageName;
        }

        $product->save();

        toastr()->closeButton()->timeout(3000)->addSuccess('Added product successfully.');

        return redirect()->back();
    }

    public function view_product() {
        $products = Product::orderBy('created_at', 'desc')->paginate(3);
        
        return view('admin.view_product', [
            'products' => $products
        ]);
    }

    public function delete_product($id) {
        $product = Product::find($id);

        if($product->image) {
            $image_path = public_path('product_images/'.$product->image);

            if(file_exists($image_path)) {
                unlink($image_path);
            };
        }
       
        $product->delete();

        toastr()->closeButton()->timeout(3000)->addSuccess('Deleted product successfully.');

        return redirect()->back();
    }

    public function edit_product($slug) {
        $product = Product::where('slug', $slug)->get()->first();
        $categories = Category::all();

        return view('admin.edit_product', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update_product(Request $request, $id) {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->updated_at = Now();

        $new_image = $request->image;
        if($new_image) {
            $old_image_path = public_path('product_images/'.$product->image);
            if(file_exists($old_image_path)) {
                unlink($old_image_path);
            };

            $new_image_name = time().'.'.$new_image->getClientOriginalExtension();
            $new_image->move('product_images', $new_image_name);
                                // path             name
            $product->image = $new_image_name;
        }

        $product->save();

        return redirect('/view_product');
    }

    public function search_products(Request $request) {
        $search = $request->search;

        $products = Product::where('title', 'Like', '%' .$search. '%')->
                    orWhere('category', 'Like', '%' .$search. '%')->paginate(3);

        return view('admin.view_product', compact('products'));
    }

    public function view_order() {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.view_order', [
            'orders' => $orders
        ]);
    }

    public function ontheway($id) {
        $order = Order::find($id);

        $order->status = "On the way";

        $order->save();

        toastr()->closeButton()->timeout(3000)->addSuccess('Changed status successfully');

        return redirect()->back();
    }

    public function delivered($id) {
        $order = Order::find($id);

        $order->status = "Delivered";

        $order->save();

        toastr()->closeButton()->timeout(3000)->addSuccess('Changed status successfully');

        return redirect()->back();
    }

    public function denied($id) {
        $order = Order::find($id);

        $order->status = "Denied";

        $order->save();

        toastr()->closeButton()->timeout(3000)->addSuccess('Changed status successfully');

        return redirect()->back();
    }

    public function inprogress($id) {
        $order = Order::find($id);

        $order->status = "In progress";

        $order->save();

        toastr()->closeButton()->timeout(3000)->addSuccess('Changed status successfully');

        return redirect()->back();
    }


    public function print_pdf($id) {
        $order = Order::find($id);

        // $pdf = Pdf::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');

        $pdf = Pdf::loadView('admin.invoice', [
            'order' => $order
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function view_users() {
        $users = User::orderBy('name', 'asc')->get();

        return view('admin.view_users', [
            'users' => $users
        ]);
    }
}
