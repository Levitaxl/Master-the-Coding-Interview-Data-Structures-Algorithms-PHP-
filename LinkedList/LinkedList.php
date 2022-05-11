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
    }

    /*  Implemente un procedimiento que dada una lista enlazada simple de enteros, 
        la ordene en forma ascendente. 
        Considerar que pueden existir elementos repetidos.  */
    public function ordenar_ascendentemente(){
        $p=$this->head;
        $q=null;

        while($p!=null){
            $q=$p;
            while($q!=null){
                if($p->data>$q->data) $this->swap($p,$q);
                $q=$q->next;
            }
            $p=$p->next;
        }
    }

    private function swap($p,$q){
        $aux=$p->data;
        $p->data=$q->data;
        $q->data=$aux;
    }
};


//--------------------------------------START MAIN----------------------------------
    $MyList = new LinkedList();

    //Add three elements at the end of the list.
    $MyList->add_element(20);
    $MyList->add_element(10);
    $MyList->add_element(100);
    $MyList->add_element(1);
    $MyList->add_element(30);
    $MyList->add_element(30);
    $MyList->add_element(60);
    $MyList->add_element(30);
    $MyList->add_element(20);
    $MyList->add_element(50);
    $MyList->add_element(40);
    $MyList->add_element(40);
    //$MyList->PrintList();
    $MyList->ordenar_ascendentemente();
    //$MyList->reverseList();

    $MyList->PrintList();
?>