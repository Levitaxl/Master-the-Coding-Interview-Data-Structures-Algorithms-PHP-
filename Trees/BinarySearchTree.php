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
    
    public function remove($value){
        if(!$this->root){
            return false;
        }

        $currentNode= $this->root;
        $parentNode= null;
        while($currentNode){
            if($value<$currentNode->data){
                $parentNode= $currentNode;
                $currentNode= $currentNode->left;
            }

            else if($value> $currentNode->data){
                $parentNode=$currentNode;
                $currentNode= $currentNode->right;
            }
            else if($value == $currentNode->data){
                //We have a match.

                //Option1: No right child:
                if($currentNode->right==null){  
                    if($parentNode== null){
                        $this->root = $currentNode->left;
                    }
                    else{
                        //if parent > current value, make current lef child a child of parent
                        if($currentNode->data<$parentNode->data){
                            $parentNode->left= $currentNode->left;
                        }
                        
                        //if parent < current value, make left child a right child of parent
                        else if($currentNode->data>$parentNode->data){
                            $parentNode->right = $currentNode->left;
                        }

                    }
                }
                //Option 2: Right Child wich doesnt have a left child
                else if($currentNode->right->left == null){
                    $currentNode->right->left= $currentNode->left;
                    if($parentNode== null){
                        $this->root = $currentNode->right;
                    }

                    else {
                        if($currentNode->data < $parentNode->data){
                            $parentNode->left = $currentNode->right;
                        }

                        else if($currentNode->data > $parentNode->data){
                            $parentNode->right = $currentNode->right;
                        }
                    }

                }

                //Option 3: Right child that has a left child
                else{

                    $leftmost = $currentNode->right->left;
                    $leftmostParent = $currentNode->right;

                    while($leftmost->left!==null){
                        $leftmostParent=$leftmost;
                        $leftmost=$leftmost->left;
                    }

                    //Parent's left subtree is no leftmost's right subtree
                    $leftmostParent->left= $leftmostParent->right;
                    $leftmost->left= $currentNode->left;
                    $leftmost->right = $currentNode->right;


                    if($parentNode==null){
                        $this->root= $leftmost;
                    }

                    else{
                        if($currentNode->data<$parentNode->data){
                            $parentNode->left = $leftmost;
                        }

                        else if($currentNode->data> $parentNode->data){
                            $parentNode->right= $leftmost;
                        }
                    }
                }
                return true;
            }
        }
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

    print_r($tree);

    $tree->remove(9);
    $tree->remove(170);
    $tree->remove(1);
    $tree->remove(20);
    $tree->remove(15);

    echo('<br>');
    echo('<br>');
    echo('<br>');

    print_r($tree);

?>