<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Food;
use Livewire\Component;

class MenuLivewire extends Component
{
    public $menu;
    public $menus;
    public $food;
    public $food_added = [];
    public $food_id_added = [];
    public $appetizer_menu;
    public $main_menu;
    public $dessert_menu;
    public $children_menu;
    public $diet_menu;
    public $food_model;

    public function addFood() {
        if ($this->menu == null || $this->menu == "") return;
        if ($this->food_model == null || $this->food_model == "") return;
        $food_found = food::find($this->food_model);
        if (in_array($food_found->id, $this->food_id_added)) return;
        array_unshift($this->food_added, $food_found->name);
        array_unshift($this->food_id_added, $food_found->id);
    }

    public function mount() {
        $this->menus = menu::all();
        $this->food = food::all();
        $this->appetizer_menu = menu::select('food.*')->where('menus.name', '=', 1)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $this->main_menu = menu::select('food.*')->where('menus.name', '=', 2)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $this->dessert_menu = menu::select('food.*')->where('menus.name', '=', 3)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $this->children_menu = menu::select('food.*')->where('menus.name', '=', 4)->join('food', 'food.id', '=', 'menus.food_id')->get();
        $this->diet_menu = menu::select('food.*')->where('menus.name', '=', 5)->join('food', 'food.id', '=', 'menus.food_id')->get();
        foreach ($this->appetizer_menu as $item) {
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
        foreach ( $this->main_menu as $item) {
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
        foreach ($this->dessert_menu as $item) {
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
        foreach ($this->children_menu as $item) {
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
        foreach ($this->diet_menu as $item) {
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
    }

    public function addToMenu() {
        foreach($this->food_id_added as $item) {
            $menu = new menu;
            $menu->food_id = $item;
            $menu->name = $this->menu;

            $menu->save();
        }
        return view('admin.menu');
    }

    public function render()
    {
        return view('livewire.menu-livewire');
    }
}
