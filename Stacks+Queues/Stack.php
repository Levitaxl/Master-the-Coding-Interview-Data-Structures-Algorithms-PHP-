<?php
//node structure
class Node {
    public $data;
    public $next;
}

class Stack {
    public $top;
    public $bottom;
    public $length;


    public function __construct(){
        $this->top = null;
        $this->bottom=null;
        $this->length=0;
    }

    public function get_length(){
        return $this->length;
    }

    public function peek(){
        return $this->top;
    }

    public function push($newElement) {
        $newNode = new Node();
        $newNode->data = $newElement;
        $newNode->next = null;
        if($this->length == 0) {
            $this->top      = $newNode;
            $this->bottom   = $newNode;
        } 
        else {
            $aux=$this->top;
            $this->top= $newNode;
            $this->top->next=$aux;
        }

        $this->length++;
    }

    public function pop(){
        if($this->top ==null) return null;
		else if($this->top != $this->bottom){
		    $this->top = $this->top->next;
        }
        else if($this->top == $this->bottom){
            $this->top=null;
            $this->bottom=null;
        }   

        $this->length--;
    }

    public function show_all(){
        $top=$this->top;
        $bottom=$this->bottom;
        $aux=$top;

        print_r('----------SHOW ALL------- <br> ');
        while($top!=null){
            echo($top->data.'<br>');
            $top=$top->next;
        }
        $top=$aux;
    }
};


//--------------------------------------START MAIN----------------------------------
    $stack = new Stack();

    $stack->push(50);
    $stack->push(40);
    $stack->push(30);
    $stack->push(20);
    $stack->push(10);

    $stack->show_all();  

    //$stack->pop();
    //$stack->pop();
    //$stack->pop();
    //$stack->pop();
    //$stack->pop();
    //$stack->pop();

?>