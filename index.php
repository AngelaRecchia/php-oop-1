<!-- Create un file index.php in cui:
- è definita una classe ‘Movie’ 
    => all'interno della classe sono dichiarate delle variabili d'istanza 
    => all'interno della classe è definito un costruttore 
    => all'interno della classe è definito almeno un metodo
- vengono istanziati almeno due oggetti ‘Movie’ e stampati a schermo i valori delle relative proprietà -->

<?php

class Movie {

    public $title;
    public $director;
    public $year;
    public $genre;
    public $rating;
    public $seen = false;


    function __construct ($_title, $_director) {
        $this->title = $_title;
        $this->director = $_director;
    }

    public function setSeen() {
        $this->seen = true;
    }

    public function tablePrint($arr) {

        $proprList = get_class_vars('Movie');

        echo("<h1>Movies</h1>");

        echo ("<table>");

        echo ("<tr>");
        foreach ( $proprList as $propr => $value) {
                echo("<th>" . $propr . "</th>");
        };
        echo ("</tr>");

        foreach ($arr as $movie) {
            echo("<tr>");
            foreach ( $proprList as $propr => $value) {
                echo("<td>". $movie->$propr . "</td>");
            }
            echo ("</tr>");
        }
        echo("</table>");

    }

    public function listToWatch($arr) {
        echo("<h3>To Watch:</h3>");
        foreach ($arr as $movie) {
            echo ("<ul>");
            if (!$movie->seen) {
                echo ("<li>" . $movie->title . "</li>");
            }
            echo ("</ul>");
        }
    }

}

/* crea istanze movie */
$m1 = new Movie("Synecdoche, New York", "Charlie Kaufman");
$m1->year = 2008;
$m1->genre = "Drama";
$m1->rating = 7.8;

$m2 = new Movie("12 Angry Men", "Sidney Lumet");
$m2->year = 1957;
$m2->genre = "Drama";
$m2->rating = 9;

$m3 = new Movie("Seven", "David Fincher");
$m3->year = 1995;
$m3->genre = "Thriller";
$m3->rating = 8.6;

/* aggiunge movie ad array movies */
$movies = [];
$movies[] = $m1;
$movies[] = $m2;
$movies[] = $m3;

/* imposta m1 come visto */
$m1->setSeen();

/* stampa tabella movies */
$m1->tablePrint($movies);

/* stampa lista film non visti */
$m1->listToWatch($movies);

var_dump($m1,$m2,$m3);

?>
