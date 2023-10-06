<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $routes = [];

    public function render()
    {
        return view('livewire.sidebar');
    }

    public function mount() {
        if(session()->has('team'))
        {
            foreach(session('team_routes') as $key=>$value){
                $this->routes[$key]['name'] = $value->route_title;
                $this->routes[$key]['route_icon'] = $value->route_icon;
                $this->routes[$key]['path_to_redirect'] = $value->path_to_redirect; 
            }
        }

        if(session()->has('supervisor')){
            foreach(session('supervisor_routes') as $key=>$value){
                $this->routes[$key]['name'] = $value->route_title;
                $this->routes[$key]['route_icon'] = $value->route_icon;
                $this->routes[$key]['path_to_redirect'] = $value->path_to_redirect; 
            }
        }
    }
}
