<?php
//node structure
class Node {
    public $data;
    public $next;
}

class LinkedList {
    public $head;

    public function __construct(){
        $this->head = null;
    }

    //Add new element at the end of the list
    public function add_element($newElement) {
        $newNode = new Node();
        $newNode->data = $newElement;
        $newNode->next = null;
        if($this->head == null)  $this->head = $newNode;
        else {
            $temp = new Node();
            $temp = $this->head;
            while($temp->next != null) {
                $temp = $temp->next;
            }
            $temp->next = $newNode;
        }
    }

    public function PrintList() {
        $temp = new Node();
        $temp = $this->head;
        while($temp != null) {
            echo $temp->data.'->';
            $temp = $temp->next;
        }

        echo('null');
    }

    public function reverseList(){
        $p = new Node();
        $p=$this->head;
        $q=null;
        $aux=null;

        while($p !=null){
            $aux=$p->next;
            $p->next=$q;
            $q=$p;
            $p=$aux;
        }

        $this->head=$q;
        $this->PrintList();
    }
};


//--------------------------------------START MAIN----------------------------------
    $MyList = new LinkedList();

    //Add three elements at the end of the list.
    $MyList->add_element(10);
    $MyList->add_element(20);
    $MyList->add_element(30);
    $MyList->add_element(40);
    $MyList->add_element(50);
    $MyList->add_element(60);
    //$MyList->PrintList();
    $MyList->reverseList();
?>