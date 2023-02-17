<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Combo;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function food()
    {
        $food_list = food::all();
        foreach ($food_list as $item) {
            if ($item->type == "0") {
                $item->typename = "Pizza";
            } elseif ($item->type == "1") {
                $item->typename = "Side dish";
            } elseif ($item->type == "2") {
                $item->typename = "Topping";
            } else {
                $item->typename = "Drinks";
            }
            if ($item->has_double_sauce) {
                $item->has_sauce = "Yes";
            } else {
                $item->has_sauce = "No";
            }
        }
        return view('admin.food', compact('food_list'));
    }

    public function addfood(Request $request)
    {
        $food = new food;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimages', $imagename);

        $food->image = $imagename;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->type = $request->type;
        $food->has_double_sauce = $request->has_double_sauce;
        $food->description = $request->description;

        $food->save();
        return redirect()->back()->with('message', 'A new food had been added successfully');
    }

    public function deletefood($id) {
        $food = food::find($id);
        $food->delete();
        return redirect()->back()->with('message', 'A new food had been deleted successfully');
    }

    public function updatefood($id) {
        $food = food::find($id);
        return view('admin.updatefood', compact('food'));
    } 

    public function confirmupdatefood(Request $request, $id) {
        $food = food::find($id);

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimages', $imagename);

        $food->image = $imagename;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->type = $request->type;
        $food->has_double_sauce = $request->has_double_sauce;
        $food->description = $request->description;

        $food->save();
        return redirect('food')->with('message', 'A food had been updated successfully');
    }

    public function combo() {
        $combos = combo::all();
        $pizzas = food::select('*')->where('type', '=', '0')->get();
        $dishes = food::select('*')->where('type', '=', '1')->get();
        $topping = food::select('*')->where('type', '=', '2')->get();
        $water = food::select('*')->where('type', '=', '3')->get();
        return view('admin.combo', compact('combos', 'pizzas', 'dishes', 'topping', 'water'));
    }

    public function addcombo(Request $request)
    {
        $combo = new combo;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimages', $imagename);

        $combo->name = $request->name;
        $combo->description = $request->description;
        $combo->image = $imagename;
        $combo->sale = $request->sale;
        $combo->size = $request->size;
        $combo->show = $request->show;
        $combo->num_of_pizza = $request->num_of_pizza;
        $combo->num_of_topping = $request->num_of_topping;
        $combo->num_of_side_dish = $request->num_of_side_dish;
        $combo->num_of_water = $request->num_of_water;

        $combo->save();
        return redirect()->back()->with('message', 'A new combo had been added successfully');
    }

    public function deletecombo($id) {
        $combo = combo::find($id);
        $combo->delete();
        return redirect()->back()->with('message', 'A new food had been deleted successfully');
    }

    public function order() {
        $orders = order::all();
        foreach($orders as $item) {
            if ($item->status == "0") {
                $item->word_status = "Pending";
                $item->class = "badge-info";
            } elseif ($item->status == "1") {
                $item->class = "badge-primary";
                $item->word_status = "Confirmed";
            } elseif ($item->status == "2") {
                $item->class = "badge-warning";
                $item->word_status = "Shipping";
            } elseif ($item->status == "3") {
                $item->class = "badge-danger";
                $item->word_status = "Rejected";
            } else {
                $item->class = "badge-success";
                $item->word_status = "Finished";
            }
        }
        return view('admin.order', compact('orders'));
    }

    public function menu() {
        return view('admin.menu');
    }

    public function user() {
        $users = user::all();
        return view('admin.user', compact('users'));
    }

    public function deleteuser($id) {
        $user = user::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function rejectorder($id) {
        $order = order::find($id);
        $order->status = 3;
        $order->save();
        return redirect()->back();
    }

    public function shippingorder($id) {
        $order = order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->back();
    }

    public function confirmorder($id) {
        $order = order::find($id);
        $order->status = 1;
        $order->save();
        return redirect()->back();
    }

    public function finisheoder($id) {
        $order = order::find($id);
        $order->status = 4;
        $order->save();
        return redirect()->back();        
    }


    public function statistic() {
        $order_full = order::where('status', '=', 4)->get();
        $doanhthu = 0;
        foreach($order_full as $item) {
            $doanhthu += $item->price * $item->quantity;
        }
        $order_day = order::whereDate('created_at', Carbon::today())->count();
        $today = 0;
        // foreach($order_day as $item) {
        //     $today += $item->price * $item->quantity;
        // }
        return view('admin.statistic', compact('doanhthu', 'order_day'));
    }

    
}
