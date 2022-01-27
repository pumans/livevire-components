<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Group;
use Livewire\Component;

class Trello extends Component
{
    public $title;
    protected $rules = [
        'title' => 'required',
    ];
    public function save(){
        $data = $this->validate();

        if($this->addGroupState){
            Group::create($data);
        } else{
            $data["group_id"] = $this->addCardState;
            Card::create($data);
        }

        $this->reset();
    }
    public function render()
    {
        $groups = Group::orderBy("sort")->get();
        return view('livewire.trello', ['groups' => $groups]);
    }

    public $addGroupState = false;
    public function addGroup(){
        $this->addGroupState = true;
    }
    public function deleteGroup($id){
        Group::destroy($id);
    }

    public $addCardState = "";
    public function addCard($group_id){
        $this->addCardState = $group_id;
    }
    public function deleteCard($id){
        Card::destroy($id);
    }
    public function sorting($order){
        foreach ( $order as $group ){
           Group::where( [ "id" => $group["value"] ] )->update(["sort" => $group["order"]]);

           if( isset( $group["items"] ) ){
               foreach ( $group["items"] as $item){
                   Card::where( [ "id" => $item["value"] ] )->update(["sort" => $item["order"]]);
               }
           }
        }
    }


}
