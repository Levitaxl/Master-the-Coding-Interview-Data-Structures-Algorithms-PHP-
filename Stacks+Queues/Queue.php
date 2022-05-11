<?php
//node structure
class Node {
    public $data;
    public $next;
}

class Queue {
    public $first;
    public $last;
    public $length;


    public function __construct(){
        $this->first = null;
        $this->last=null;
        $this->length=0;
    }

    public function get_length(){
        return $this->length;
    }

    public function peek(){
        return $this->first;
    }

    public function enqueue($newElement) {
        $newNode = new Node();
        $newNode->data = $newElement;
        $newNode->next = null;
        if($this->length == 0 && $this->last==null) {
            $this->first      = $newNode;
            $this->last   = $newNode;
        } 
        else if($this->last!=null){
            $this->last->next= $newNode;
            $this->last=$newNode;
        }

        $this->length++;
    }

    public function dequeue(){
        if($this->first ==null) return null;
		else if($this->first != $this->last ){
		    $this->first = $this->first->next;
        }
        else if($this->first == $this->last ){
            $this->first=null;
            $this->last=null;
        }   

        $this->length--;
    }

    public function show_all(){
        $first=$this->first;
        $last=$this->last;
        $aux=$first;

        print_r('----------SHOW ALL------- <br> ');
        while($first!=null){
            echo($first->data.'<br>');
            $first=$first->next;
        }
        $first=$aux;
    }
};


//--------------------------------------START MAIN----------------------------------
    $Queue = new Queue();

    $Queue->enqueue(80);
    $Queue->enqueue(70);
    $Queue->enqueue(60);
    $Queue->enqueue(50);
    $Queue->enqueue(40);
    $Queue->enqueue(30);
    $Queue->enqueue(20);
    $Queue->enqueue(10);
    $Queue->enqueue(1);


    $Queue->show_all();  

    
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();
    $Queue->dequeue();

    $Queue->show_all();  

    $Queue->enqueue(80);
    $Queue->enqueue(70);
    $Queue->enqueue(60);

    $Queue->show_all();  

    $Queue->dequeue();
    $Queue->dequeue();

    $Queue->show_all();  



?>