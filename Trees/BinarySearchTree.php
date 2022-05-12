<?php
//node structure
class Node {
    public $data;
    public $right;
    public $left;
}

class BinarySearchTree {
    public $root;

    public function __construct(){
        $this->root = null;
    }

    public function insert($value){
        $newNode = new Node();

        $newNode->data=$value;
        $newNode->right=null;
        $newNode->left=null;
        if($this->root == null) $this->root=$newNode; 
        else {
            $currentNode= $this->root;
            while(true){
                if($value<$currentNode->data){
                    //Left  
                    if(!$currentNode->left){
                        $currentNode->left = $newNode;
                        return $this;   
                    }
                    $currentNode= $currentNode->left;
                }

                else{
                    //right
                    if( !$currentNode->right){
                        $currentNode->right=$newNode;
                        return $this;
                    }

                    $currentNode= $currentNode->right;   
                }
            }
        }

    }


    public function get_root(){
        return $this->root;
    }
    
};


//--------------------------------------START MAIN----------------------------------
    $tree = new BinarySearchTree();

    $tree->insert(10);
    print_r($tree->get_root());
    $tree->insert(20);
    print_r($tree->get_root());
    $tree->insert(30);
    print_r($tree->get_root());
    $tree->insert(40);
    print_r($tree->get_root());
    $tree->insert(50);
    

    print_r($tree);

?>