<?php
/*
** Скрипт возварщает список категорий книг
*/

// Передаем заголовки
header('Content-type: text/plain; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));

// Открытие БД
$db = new PDO("mysql:host=localhost;dbname=new; charset=utf8","root","");

// Вывод категорий
echo getChildCategories($db);

// Закрытие БД
//unset($db);

// =============================================================================

// Рекурсивная функция, возвращает строку с категориями, входящими в указанную
// Параметры:
//     $db     - открытавя база данных
//     $parent - код родительской категории
//     $indent - строка, формирующая смещение символов
function getChildCategories($db, $parent=0, $indent="")
{
	$result = '';
	$sql = $db->prepare('SELECT * FROM category WHERE parent=:parent');
	$sql->execute(array("parent"=>$parent));
        
	while ($row = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$result .= $row['id'] . ':' . $indent . $row['title'] . "\n";
		$result .= getChildCategories($db, $row['id'], $indent . '...');
	}
	return $result;
}
?>