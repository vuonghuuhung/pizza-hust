<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartLivewire extends Component 
{
    public $cart_counter;
    public $cart;
    public $totalPrice = 0;
    public $topping;
    public $size;

    public function mount() {
        $this->cart = cart::select('carts.id', 'food.name', 'food.price', 'carts.quantity', 'carts.type', 'food.image', 'carts.size', 'food.has_double_sauce')->where([
            ['user_id', '=', Auth::id()],
            ['carts.type', '=', 0]
            ])->join('food', 'carts.food_id', '=', 'food.id')->get();
        $this->topping = food::select('*')->where('type', '=', '2')->where('name', '!=', 'Double Sauce')->get();
        foreach($this->cart as $item) {
            $this->cart_counter += $item->quantity;
            $this->totalPrice += $item->price * $item->quantity;
            if ($item->size == 0) {
                $item->char_size = "S";
            } elseif ($item->size == 1) {
                $item->char_size = "M";
            } else {
                $item->char_size = "L";
            }
        }
    }

    public function increase($id) {
        $item = cart::find($id);
        $item->quantity = $item->quantity + 1;
        // dd($item);
        $item->save();
        $this->cart = cart::select('carts.id', 'food.name', 'food.price', 'carts.quantity', 'carts.type', 'food.image', 'carts.size', 'food.has_double_sauce')->where([
            ['user_id', '=', Auth::id()],
            ['carts.type', '=', 0]
            ])->join('food', 'carts.food_id', '=', 'food.id')->get();
    }

    public function decrease($id) {
        $item = cart::find($id);
        if ($item->quantity == 1) return;
        $item->quantity--;
        $item->save();
        $this->cart = cart::select('carts.id', 'food.name', 'food.price', 'carts.quantity', 'carts.type', 'food.image', 'carts.size', 'food.has_double_sauce')->where([
            ['user_id', '=', Auth::id()],
            ['carts.type', '=', 0]
            ])->join('food', 'carts.food_id', '=', 'food.id')->get();
    }

    public function deleteFood($id) {
        $cart = cart::find($id);
        $cart->delete();
        // $this->cart_counter = cart::where('user_id', Auth::id())->count();
    }

    public function chooseSize($id) {
        $item = cart::find($id);
        $item->size = $this->size;
        $item->save();
    }

    public function render()
    {
        return view('livewire.cart-livewire');
    }
}
