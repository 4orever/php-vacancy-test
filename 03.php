<?php

// Реализовать класс дерева, наследующийся от абстрактного Tree:

class Node

{

private $name;

function __construct($name)

{

$this->name = $name;

}

}

abstract class Tree

{

// создает узел (если $parentNode == NULL - корень)

abstract protected function createNode(Node $node,$parentNode=NULL);

// удаляет узел и все дочерние узлы

abstract protected function deleteNode(Node $node);

// один узел делает дочерним по отношению к другому

abstract protected function attachNode(Node $node,Node $parent);

// получает узел по названию

abstract protected function getNode($nodeName);

// преобразует дерево со всеми элементами в ассоциативный массив

abstract protected function export();

}

// Обеспечить выполнение следующего теста:

// 1. создать корень country

$tree->createNode(new Node('country'));

// 2. создать в нем узел kiev

$tree->createNode(new Node('kiev'), $tree->getNode('country'));

// 3. в узле kiev создать узел kremlin

$tree->createNode(new Node('kremlin'), $tree->getNode('kiev'));

// 4. в узле kremlin создать узел house

$tree->createNode(new Node('house'), $tree->getNode('kremlin'));

// 5. в узле kremlin создать узел tower

$tree->createNode(new Node('tower'), $tree->getNode('kremlin'));

// 4. в корневом узле создать узел moscow

$tree->createNode(new Node('moscow'), $tree->getNode('country'));

// 5. сделать узел kremlin дочерним узлом у moskow

$tree->attachNode($tree->getNode('kremlin'), $tree->getNode('moscow'));

// 6. в узле kiev создать узел maidan

$tree->createNode(new Node('maidan'), $tree->getNode('kiev'));

// 7. удалить узел kiev

$tree->deleteNode($tree->getNode('kiev'));

// 8. получить дерево в виде массива, сделать print_r

print_r($tree->export());

/**

результатом последнего пункта должен быть следующий вывод в STDOUT:

Array

(

[country] => Array

(

[moscow] => Array

(

[kremlin] => Array

(

[house] =>

[tower] =>

)

)

)

)

*/