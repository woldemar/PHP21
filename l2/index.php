<?php

abstract class Article

{
    static protected $delim = ': ';
    public $title;
    public $text; //статическое свойство может принадлежать только классу

    public function __construct($title = '', $text = '')
    {
        $this->title = $title;
        $this->text = $text;

    }

    /* public function view()
     {
         echo $this->title;

     }
     */
    abstract public function view(); //<-абстрактный метод

}


class NewsArticle extends Article
{
    public $author;

    public function  view()
    {
        echo $this->author . self::$delim . $this->title;

    }


}

$a = new NewsArticle();
//$b = new Article('Другой заголовок', 'bla bla bla'); //так нельзя, потому что класс "Article" - абстрактный
//нельзя создавать экземпляры абстрактного класса, но можно создавать наследников
//также могут абстрактными могут быть методы - методы не имеющие реализации в текущем классе но которые обязательно должны иметь реализацию в потомках
$a->title = 'Заголовок новости';
$a->author = 'woldemar';
$a->view();
echo '<br>' . PHP_EOL;

//$b->view();

class Table
{
    protected $storage;

//    public $storage;

    public function putInStorage($value)
    {
        $this->storage = $value;

    }

    public function getFromStorage()
    {
        return $this->storage;

    }
}

$t = new Table();
//$t->storage = 'THING'; // <- так нельзя потому что свойство "protected"
$t->putInStorage('THING'); // <- а так можно, потому что метод "public"
//var_dump($t);
echo $t->getFromStorage();


