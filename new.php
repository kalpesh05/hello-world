<?php

$con = mysqli_connect("localhost","root","","tbl_petscare") or die(mysqli_connect_error());
 $new = [];
/* 
 while($res = mysqli_fetch_assoc($r))
 {
		$pl =$res['pet_id'];
	 $pet = mysqli_query($con,"SELECT * FROM pets where id=$pl");
	 while($res2 = mysqli_fetch_assoc($pet)){
				 $new[] = array(
			'month' => $res['month'],
			'pet_id' => $res['pet_id'],
			'total' => $res['total']
		);	
	 } 
	 $data[] = array(
		'pet_id' => $res2['id'],
		'pet' => $res2['pet_name'],
		'pet_detai' => $new
		
 }
 */
 $old='';
 $month = array('1','2','3','4','5','6','7','8','9','10','11','12');
$pet = mysqli_query($con,"SELECT * FROM pets where id in (1,2)");
while($res2 = mysqli_fetch_assoc($pet)){
	$p= $res2['id'];
		 $q = "SELECT MONTH(date) as month, pet_id , count(*) as total FROM appointment where pet_id = $p group by MONTH(date)";
 
		$r = mysqli_query($con,$q) or die(mysqli_connect_error());

			$old='';

	 while($res = mysqli_fetch_assoc($r))
		{
			foreach($month as $m){
	
			if(!empty($old))
			{
				$m=(int)$old+1;
				echo $old.'-'.$m;
	
					
//				die;
			}
			
			//	echo $m.'</br>';
      			$pets[] = array(
					'month' => $m,
					'pet_id' => ($m==$res['month'])?$res['pet_id']:NULL,
					'total' => ($m==$res['month'])?$res['total']:NULL
				);
				
					$old=$m;
				if($m==$res['month']){
			//		$old = $m;
				}
					
								
			}
			
		}
		//var_dump($pets);
	//die;
				 $data[] = array(
			'pet_id' => $res2['id'],
			'pet_name' => $res2['pet_name'],
			'pet_detail' => $pets
		);	
		$pets=[];
}  
 
 $new2['msg'] =  "lksfgd";
 $new2['data'] = $data;
 
 echo json_encode($new2);
 
 
 
 
 function array_companre($arr){
	 $j=0;
	 $old = $arr[$j];
	 for($i=0;$i<count($arr);$i++){
		 $check = array_intersect($old,$arr[$i]);
		 if($check){
				unset($arr[$i]);
		}
		$j++;
	 }
	 return $arr;
 }
 
 