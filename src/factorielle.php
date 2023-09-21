<?php

	function factorielle($n){
		$res = 1;
		if ($n==0) {
			return $res;
		} else {
			for ($i=1; $i < $n+1; $i++) { 
				$res = $res*$i;
			}
		}
		return $res;
	}

?>

