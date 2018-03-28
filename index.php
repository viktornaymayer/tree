<!doctype html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Tree</title>

	<style>
		ul{display:none;list-style-type:none;cursor:pointer}
		.tree > ul{display:list-item}
	</style>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>

<?php
// устанавливаем стартового родителя
$god = 'null';

// создаем ассоциативный многомерный массив для проверки
$arr_cats = array(
	array('name'=>'catalog', 'parent'=>'null'),
	array('name'=>'moderators', 'parent'=>'catalog'),
	array('name'=>'directors', 'parent'=>'catalog'),
	array('name'=>'users', 'parent'=>'catalog'),
	array('name'=>'middle_admins', 'parent'=>'admins'),
	array('name'=>'admins', 'parent'=>'catalog'),
	array('name'=>'best_middle_admins', 'parent'=>'middle_admins'),
	array('name'=>'lower_moderators', 'parent'=>'moderators'),
	array('name'=>'lower_admins', 'parent'=>'admins'),
	array('name'=>'super_middle_admins', 'parent'=>'middle_admins'),
	array('name'=>'top_moderators', 'parent'=>'moderators'),
	array('name'=>'top_admins', 'parent'=>'admins'),
	array('name'=>'middle_moderators', 'parent'=>'moderators')
	);

// сортируем массив по алфавитному порядку для приятной глазу выгрузки
asort($arr_cats);

// декларируем функцию для выборки в которую передаем массив и родителя (по умолчанию стартовый)
function tree($arr, $parent){	
	echo "<ul>\n"; 									// открываем список
	foreach ($arr as $val){							// перебираем наш массив
		if ($val['parent']==$parent){				// если у элемента указан родитель переданный в функцию
			echo "<li>{$val['name']}</li>\n";		// то записываем этот элемент в список
			foreach ($arr as $v){					// снова перебираем наш массив
				if ($val['name']==$v['parent']){	// если находим что записанный элемент является чьим то родителем
					tree($arr,$v['parent']);		// производим обратный вызов функции, но в качестве родителя передаем наш элемент
					break;							// так как нам требуется только одна выборка прерываем цикл
				}
			}
		}
	}
	echo "</ul>\n";									// закрываем список
}

echo '<div class="tree">';
tree($arr_cats,$god);
echo '</div>';
?>

</body>
<script>
	$('li').click(function() {					// устанавливаем обработчик событий по клику на название каталога li
		$(this).next('ul').slideToggle();		// открываем, либо скрываем следуущий за названием список ul
	});
</script>

</html>