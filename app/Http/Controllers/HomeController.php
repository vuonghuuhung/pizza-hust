<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Combo;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function redirect()
    {
        $appetizer_menu = menu::select('food.*')->where('menus.name', '=', 1)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $dessert_menu = menu::select('food.*')->where('menus.name', '=', 3)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $main_menu = menu::select('food.*')->where('menus.name', '=', 2)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $children_menu = menu::select('food.*')->where('menus.name', '=', 4)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $diet_menu = menu::select('food.*')->where('menus.name', '=', 5)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $pizzas = food::select('*')->where('type', '=', '0')->get();
        $dishes = food::select('*')->where('type', '=', '1')->get();
        $topping = food::select('*')->where('type', '=', '2')->get();
        $water = food::select('*')->where('type', '=', '3')->get();

        $combos = combo::where('show', '1')->get();

        $cart_counter = cart::where('user_id', Auth::id())->count();
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('normal.home', compact('pizzas', 'dishes', 'topping', 'water', 'cart_counter', 'combos', 'appetizer_menu', 'dessert_menu', 'main_menu', 'children_menu', 'diet_menu'));
        }
    }

    public function index() {
        $appetizer_menu = menu::select('food.*')->where('menus.name', '=', 1)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $dessert_menu = menu::select('food.*')->where('menus.name', '=', 3)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $main_menu = menu::select('food.*')->where('menus.name', '=', 2)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $children_menu = menu::select('food.*')->where('menus.name', '=', 4)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $diet_menu = menu::select('food.*')->where('menus.name', '=', 5)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $pizzas = food::select('*')->where('type', '=', '0')->get();
        $dishes = food::select('*')->where('type', '=', '1')->get();
        $topping = food::select('*')->where('type', '=', '2')->get();
        $water = food::select('*')->where('type', '=', '3')->get();
        $combos = combo::where('show', '1')->get();
        return view('normal.home', compact('pizzas', 'dishes', 'topping', 'water', 'combos', 'appetizer_menu', 'dessert_menu', 'main_menu', 'children_menu', 'diet_menu'));
    }

    public function logout() {
        $pizzas = food::select('*')->where('type', '=', '0')->get();
        $dishes = food::select('*')->where('type', '=', '1')->get();
        $topping = food::select('*')->where('type', '=', '2')->get();
        $water = food::select('*')->where('type', '=', '3')->get();
        auth()->logout();
        return redirect('/');
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

    public function addcombotocart($id) {
        if (Auth::id()) {
            $combo = combo::find($id);
            $user_id = Auth::id();
            $food_id = $id;
            $cart = new cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->type = 1; // 1: combo
            $cart->quantity = 1;
            $cart->size = $combo->size;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function cart() {
        return view('normal.cart');
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
