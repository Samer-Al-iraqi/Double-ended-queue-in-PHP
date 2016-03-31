<?php 
class LinkItem {
   public $data;                 // data item
   public $next=null;                // next link in list
   public $prev=null;            // previous link in list
   
   function __construct($data){
	   $this->data=$data;
   }
}

class Queue{
	private $first=null; // ref to first item in the list
	private $last=null;  // ref to last item in the list
	
	function isEmpty(){
		if($this->first==null) return true;
		else return false;
	}
	function left(){
		return $this->first->data;
	}
	function right(){
		return $this->last->data;
	}
	function addLeft($data){
		$newNode= new LinkItem($data);

		if($this->isEmpty()){
			$this->first=$newNode;
			$this->last=$newNode;
		}
		else{
			$newNode->next=$this->first;
			$this->first->prev=$newNode;
			$this->first=$newNode;
		}
	}
	function addRight($data){
		$newNode= new LinkItem($data);

		if($this->isEmpty()){
			$this->first=$newNode;
			$this->last=$newNode;
		}
		else{
			$newNode->prev=$this->last;
			$this->last->next=$newNode;
			$this->last=$newNode;
		}
	}
	function removeLeft(){
		if($this->isEmpty()) return false;
		else{
			$this->first->next->prev=null;
			$this->first=$this->first->next;
		}
	}
	function removeRight(){
		if($this->isEmpty()) return false;
		else{
			$this->last->prev->next=null;
			$this->last=$this->last->prev;
		}
	}
	function displayQueueData(){
		if($this->isEmpty()){
			echo "Queue is Empty \n";
			return;
		}
		$current=$this->first;
		$allData=[];
		while($current !=null){
			$allData[]=$current->data;
			$current=$current->next;
		}
		$allData=implode(',', $allData);
		echo "Queue: <$allData>\n";
	}
}

$queue = new Queue();

$queue->displayQueueData();
echo "Adding to left 3 values: 5,3,7 \n";
$queue->addRight('5');
$queue->addRight('3');
$queue->addRight('7');

$queue->displayQueueData();

echo "Adding to LEFT 10 \n";

$queue->addLeft('10');

$queue->displayQueueData();


echo "Adding to RIGHT 25 \n";

$queue->addRight('25');

$queue->displayQueueData();

echo "Remove from Left \n";

$queue->removeLeft();

$queue->displayQueueData();


echo "Remove from Right \n";
$queue->removeRight();

$queue->displayQueueData();


echo "Left value now is: ", $queue->left(), "\n";

echo "right value now is: ", $queue->right(), "\n";
?>
Output: 

Queue is Empty 
Adding to left 3 values: 5,3,7 
Queue: <5,3,7>
Adding to LEFT 10 
Queue: <10,5,3,7>
Adding to RIGHT 25 
Queue: <10,5,3,7,25>
Remove from Left 
Queue: <5,3,7,25>
Remove from Right 
Queue: <5,3,7>
Left value now is: 5
right value now is: 7






