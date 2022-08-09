<?php

namespace App\Http\Controllers;

use App\Jobs\ProductLiked;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productuser;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    //

    public function index(){
        Product::all();
    }

    public static function create($data)
    {
        Product::create([
            'id' => $data['id'],
            'title' => $data['title'],
            'image' => $data['image'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at']
        ]);
    }

    public function like($id,Request $request)
    {
        $response = \Http::get('http://host.docker.internal:8000/api/user');
        try {
            $user= $response->json();
            Productuser::create([
                'user_id'=>$user['id'],
                'product_id' => $id
            ]);
            ProductLiked::dispatch(['product_id'=>$id])->onQueue('admin_queue');
            return response([
                'message'=>'success'
            ]);
        } catch (\Throwable $th) {
            
            return response([
                'error'=>'You already liked this product'
            ], Response::HTTP_BAD_REQUEST);
        }
     

        
    }
}
