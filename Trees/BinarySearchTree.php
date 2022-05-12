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

    public function lookup($value){

        if(!$this->root)return false;
        $currentNode= $this->root;
        
        while($currentNode){
            if($value<$currentNode->data){
                $currentNode= $currentNode->left;
            }
            else if($value > $currentNode->data){
                $currentNode = $currentNode->right;
            }
            else if($value == $currentNode->data){  
                return $currentNode;
            }
        }
        return false;
    }
    
};


//--------------------------------------START MAIN----------------------------------
    $tree = new BinarySearchTree();

    $tree->insert(9);
    $tree->insert(4);
    $tree->insert(6);
    $tree->insert(20);
    $tree->insert(170);
    $tree->insert(15);
    $tree->insert(1);
    //print_r($tree->lookup(9)->left);

?>