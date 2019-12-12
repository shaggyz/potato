<?php

namespace MiniApp\Controller;

use MiniApp\Model\Book;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequest;
use Illuminate\Database\Capsule\Manager as Capsule;
use Latte\Engine;

/**
 * Controller dedicated to the landing actions.
 */
class HomeController
{
    /** @var array */
    private $config;

    /** @var Engine */
    private $latte;

    /**
     * @param Engine $latte
     * @param array $config
     */
    public function __construct(Engine $latte, array $config)
    {
        $this->latte = $latte;
        $this->config = $config;
    }

    /**
     * @param ServerRequest $request
     *
     * @return  HtmlResponse
     */
    public function index(ServerRequest $request) : ResponseInterface
    {
        $uri = $request->getUri();

        return new HtmlResponse("The current uri is: $uri.");
    }

    /**
     * @param ServerRequest $request
     *
     * @return  HtmlResponse
     */
    public function restricted(ServerRequest $request) : ResponseInterface
    {
        return new HtmlResponse("Restricted Area");
    }

    /**
     * @param ServerRequest $request
     *
     * @return  HtmlResponse
     */
    public function template(ServerRequest $request) : ResponseInterface
    {
        $template = $this->config['templates'] . "index.latte";

        $parameters = [
            'key' => 'value',
            'foo' => [1, 2, 3, 4, 5, 6, 7],
            'bool' => true
        ];

        return new HtmlResponse(
            $this->latte->renderToString($template, $parameters)
        );
    }

    /**
     * @param ServerRequest $request
     *
     * @return HtmlResponse
     */
    public function database(ServerRequest $request) : ResponseInterface
    {
        // Using Illuminate/Database
        $books = Capsule::table('books')
            ->where('id', '>', 0)
            ->get();

        echo "Found {$books->count()} books with the query builder: <br>";

        // foreach ($books as $book) {
        //    echo '<pre>';
        //    print_r($book);
        //    echo '</pre>';
        // }

        // Using the schema builder (for migrations)

        // Capsule::schema()->create('users', function ($table) {
        //    $table->increments('id');
        //    $table->string('email')->unique();
        //    $table->timestamps();
        // });

        // Using Eloquent ORM
        $books = Book::all();

        echo "Found {$books->count()} books with eloquent ORM: <br>";

        foreach ($books as $book) {
            echo "Title: " . $book->title . "<br>";
            echo "Year: " . $book->year . "<br>";
            echo "Active: " . ($book->active ? 'Yes' : 'No');
            echo "<hr>";
        }

        return new HtmlResponse("");
    }
}
