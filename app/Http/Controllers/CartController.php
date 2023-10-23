<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category1;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use App\Models\subcategory;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products')->with('error', 'Product not found.');
        }

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    'productname' => $product->productname,
                    'price' => $product->price,
                    'quantity' => 1,
                ]
            ];  

            session()->put('cart', $cart);
        } else {
            // If the item is already in the cart, increment its quantity
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                // If the item is not in the cart, add it
                $cart[$id] = [
                    'productname' => $product->productname,
                    'price' => $product->price,
                    'quantity' => 1,
                ];
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('web.shop')->with('success', 'Product added to cart.');
    }

//     public function removeFromCart($id)
//     {
//         $cart = session()->get('cart');

//         if (isset($cart[$id])) {
//             unset($cart[$id]);
//             session()->put('cart', $cart);
//         }

//         return redirect()->back()->with('success', 'Product removed from cart.');
//     }

//     public function viewCart()
//     {
//         $cartItems = session()->get('cart', []);
//         $total = 0;

//         foreach ($cartItems as $item) {
//             $total += $item['price'] * $item['quantity'];
//         }

//         return view('website.cart', compact('cartItems', 'total'));
//     }
}