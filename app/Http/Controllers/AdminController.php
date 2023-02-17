<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Combo;
use App\Models\Order;

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
            } elseif ($item->status == "1") {
                $item->word_status = "Confirmed";
            } elseif ($item->status == "2") {
                $item->word_status = "Shipping";
            } else {
                $item->word_status = "Finished";
            }
        }
        return view('admin.order', compact('orders'));
    }

    public function menu() {
        return view('admin.menu');
    }
}
