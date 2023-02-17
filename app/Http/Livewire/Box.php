<?php

namespace App\Http\Livewire;

use App\Models\Combo;
use App\Models\Food;
use Livewire\Component;
use App\Models\Box as Boxes;

class Box extends Component
{
    public $combos;
    public $pizzas;
    public $dishes;
    public $topping;
    public $drinks;
    public $pizza_added = [];
    public $dishes_added = [];
    public $topping_added = [];
    public $drinks_added = [];
    public $combo;
    public $pizza;
    public $topping_;
    public $dish;
    public $drink;
    public $i = 0;

    public $pizza_id_added = [];
    public $dishes_id_added = [];
    public $topping_id_added = [];
    public $drinks_id_added = [];

    public function addPizza() {
        if ($this->combo == null) return;
        $combo = combo::find($this->combo);
        // if (count($this->pizza_added) > $combo->num_of_pizza) return;
        if ($this->pizza != null && $this->pizza != "") {
            $food = food::find($this->pizza);
            if (!in_array($food->name, $this->pizza_added)) {
                array_unshift($this->pizza_added, $food->name);
                array_unshift($this->pizza_id_added, $food->id);
            }
        }
    }

    public function addDish() {
        if ($this->combo == null) return;
        $combo = combo::find($this->combo);
        // if (count($this->dishes_added) > $combo->num_of_side_dish) return;
        if ($this->dish != null && $this->dish != "") {
            $food = food::find($this->dish);
            if (!in_array($food->name, $this->dishes_added)) {
                array_unshift($this->dishes_added, $food->name);
                array_unshift($this->dishes_id_added, $food->id);
            }
        }
    }

    public function addTopping() {
        if ($this->combo == null) return;
        $combo = combo::find($this->combo);
        // if (count($this->topping_added) > $combo->num_of_topping) return;
        if ($this->topping_ != null && $this->topping_ != "") {
            $food = food::find($this->topping_);
            if (!in_array($food->name, $this->topping_added)) {
                array_unshift($this->topping_added, $food->name);
                array_unshift($this->topping_id_added, $food->id);
            }
        }
    }

    public function addDrink() {
        if ($this->combo == null) return;
        $combo = combo::find($this->combo);
        // if (count($this->topping_added) > $combo->num_of_topping) return;
        if ($this->drink != null && $this->drink != "") {
            $food = food::find($this->drink);
            if (!in_array($food->name, $this->drinks_added)) {
                array_unshift($this->drinks_added, $food->name);
                array_unshift($this->drinks_id_added, $food->id);
            }
        }
    }

    public function mount()
    {
        $this->combos = combo::all();
        $this->pizzas = food::select('*')->where('type', '=', '0')->get();
        $this->dishes = food::select('*')->where('type', '=', '1')->get();
        $this->topping = food::select('*')->where('type', '=', '2')->get();
        $this->drinks = food::select('*')->where('type', '=', '3')->get();
    }

    public function addToCombo() {
        // dd($this->pizza_id_added);
        foreach($this->pizza_id_added as $item) {
            $box = new boxes;
            $box->food_id = $item;
            $box->combo_id = $this->combo;
            $box->save();
        }

        foreach($this->dishes_id_added as $item) {
            $box = new boxes;
            $box->food_id = $item;
            $box->combo_id = $this->combo;
            $box->save();
        }

        foreach($this->topping_id_added as $item) {
            $box = new boxes;
            $box->food_id = $item;
            $box->combo_id = $this->combo;
            $box->save();
        }

        foreach($this->drinks_id_added as $item) {
            $box = new boxes;
            $box->food_id = $item;
            $box->combo_id = $this->combo;
            $box->save();
        }
        return view('combo');
    }

    public function render()
    {
        return view('livewire.box');
    }
}
