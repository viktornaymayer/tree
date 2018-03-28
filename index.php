<?php

$arr_cats = array(
	array('name'=>'catalog', 'parent'=>'null'),
	array('name'=>'moderators', 'parent'=>'catalog'),
	array('name'=>'directors', 'parent'=>'catalog'),
	array('name'=>'users', 'parent'=>'catalog'),
	/*
	array('name'=>'middle_admins', 'parent'=>'admins'),
	array('name'=>'admins', 'parent'=>'catalog'),
	array('name'=>'best_middle_admins', 'parent'=>'middle_admins'),
	array('name'=>'lower_moderators', 'parent'=>'moderators'),
	array('name'=>'lower_admins', 'parent'=>'admins'),
	array('name'=>'super_middle_admins', 'parent'=>'middle_admins'),
	array('name'=>'top_moderators', 'parent'=>'moderators'),
	array('name'=>'top_admins', 'parent'=>'admins'),
	*/
	array('name'=>'middle_moderators', 'parent'=>'moderators')
	);

asort($arr_cats);

function tree($arr, $parent = 'null'){	
	static $count = 1;
	echo "<ul>";
	foreach ($arr as $val){
		if ($val['parent']==$parent){
			echo "<li>{$val['name']}</li>";
			foreach ($arr as $v){
				if ($val['name']==$v['parent']){
					echo 'start function ('.++$count.')  parent is " '.$v['parent'].' " :';
					tree($arr,$v['parent']);
				}
			}
		}
	}
	echo "</ul>";
}

tree($arr_cats);




// echo ('<pre>');
// print_r($arr_cats);
// echo ('</pre>');


?>