<?php
   $db = new mysqli('localhost', 'root' ,'', 'sale');
	if(!$db) {

		echo 'Could not connect to the database.';
	} else {

		if(isset($_POST['product'])) {
			$queryString = $db->real_escape_string($_POST['product']);

			if(strlen($queryString) >0) {
				$sddsdsd='credit';
				$query = $db->query("SELECT *  FROM products WHERE  product_name LIKE '$queryString%' LIMIT 10");
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
                        $json['name'] =$result->product_name;
                        $json['number'] = $result->product_code;

                    echo  '<li onClick="appendselect(\''.$result->product_code.'\')" >'.$result->product_name.'</li>';

                   }
				echo '</ul>';

				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		}else {
			echo 'There should be no direct access to this script!';
		}
	}
?>