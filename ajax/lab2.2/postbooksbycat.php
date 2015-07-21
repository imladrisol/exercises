<?php
/*
** Скрипт возварщает список книг указанной категории
**    cat - параметр - код категории
*/

// Передаем заголовки
header('Content-type: text/plain; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));

$_POST['cat'] = 4;
// Читаем GET параметр
if (isset($_POST['cat']))
{
	$cat = (int) $_POST['cat'];
	
	// Открытие БД
	$db = new PDO("mysql:host=localhost;dbname=new; charset=utf8","root","");
	
	// Создание и выполнение запроса
	//$sql = 'SELECT * FROM book WHERE category IN (' . 
		getChildCategoryList($cat, $db) . $cat . ')';
	//$result = $db->query($sql);
        $sql = $db->prepare('SELECT * FROM book WHERE category IN (:getcat)');
	$sql->execute(array("getcat"=>getChildCategoryList($cat, $db) . $cat));
	// Вывод результата запроса
	while ($row = $sql->fetch(PDO::FETCH_ASSOC))
		echo $row['author'], '|', $row['title'], '|', $row['image'], "\n";
	
	// Закрытие БД
	//unset($db);
}

// Рекурсивная функция возвращает строку кодов подкатегории разделенных запятой
function getChildCategoryList($categoryId, $db)
{
	$result = '';
        $sql = $db->prepare('SELECT id, parent FROM category WHERE parent=:parent');
	$sql->execute(array("parent"=>$categoryId));
	//$sql = 'SELECT id, parent FROM category WHERE parent = ' . $categoryId;
	//$res = $database->query($sql);
        
	while ($row = $sql->fetch(PDO::FETCH_ASSOC))
		$result = $result . $row['id'] . ', ' . getChildCategoryList($row['id'], $database);
	return $result;
}

?>