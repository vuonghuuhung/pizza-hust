<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $pizzas = food::select('*')->where('type', '=', '0')->get();
        $dishes = food::select('*')->where('type', '=', '1')->get();
        $topping = food::select('*')->where('type', '=', '2')->get();
        $water = food::select('*')->where('type', '=', '3')->get();
        $cart_counter = cart::where('user_id', Auth::id())->count();
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('normal.home', compact('pizzas', 'dishes', 'topping', 'water', 'cart_counter'));
        }
    }

    public function index() {
        $pizzas = food::select('*')->where('type', '=', '0')->get();
        $dishes = food::select('*')->where('type', '=', '1')->get();
        $topping = food::select('*')->where('type', '=', '2')->get();
        $water = food::select('*')->where('type', '=', '3')->get();
        return view('normal.home', compact('pizzas', 'dishes', 'topping', 'water'));
    }

    public function logout() {
        $pizzas = food::select('*')->where('type', '=', '0')->get();
        $dishes = food::select('*')->where('type', '=', '1')->get();
        $topping = food::select('*')->where('type', '=', '2')->get();
        $water = food::select('*')->where('type', '=', '3')->get();
        auth()->logout();
        return view('normal.home', compact('pizzas', 'dishes', 'topping', 'water'));
    }

    public function addtocart($id) {
        if (Auth::id()) {
            $user_id = Auth::id();
            $food_id = $id;
            $cart = new cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->type = 0; // 0: single food
            $cart->quantity = 1;
            $cart->size = 0; // 0: size S
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function cart($id) {
        $user_id = $id;
        $cart_counter = cart::where('user_id', Auth::id())->count();
        $cart = cart::select('carts.id', 'food.name', 'food.price', 'carts.quantity', 'carts.type', 'food.image', 'carts.size')->where('user_id', $user_id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        $totalPrice = 0;
        foreach($cart as $item) {
            $totalPrice += $item->price * $item->quantity;
            if ($item->size == 0) {
                $item->char_size = "S";
            } elseif ($item->size == 1) {
                $item->char_size = "M";
            } else {
                $item->char_size = "L";
            }
        }
        return view('normal.cart', compact('cart', 'cart_counter', 'totalPrice'));
    }

    public function makeorder(Request $request) {
        $cart = cart::select('carts.id', 'food.name', 'food.price', 'carts.quantity', 'carts.type', 'food.image', 'carts.size')->where('user_id', Auth::id())->join('food', 'carts.food_id', '=', 'food.id')->get();
        foreach($cart as $item) {
            $order = new order;
            $order->status = 0;
            $order->price = $item->price;
            $order->food_name = $item->name;
            $order->user_id = Auth::id();
            $order->quantity = $item->quantity;
            $order->name = $request->name;
            $order->address = $request->address;
            $order->phone = $request->phone;

            $order->save();
        }
        return redirect()->back();
    }
}
