<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favorite Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="booksite.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Your Favorite Books</h1>
        </header>
        <nav id="main-navi">
            <ul>
                <li><a href="booksite.php">Home</a></li>
                <li><a href="booksite.php?genre=Adventure">Adventure</a></li>
                <li><a href="booksite.php?genre=Classic+Literature">Classic Literature</a></li>
                <li><a href="booksite.php?genre=Coming-of-age">Coming-of-age</a></li>
                <li><a href="booksite.php?genre=Fantasy">Fantasy</a></li>
                <li><a href="booksite.php?genre=Historical+Fiction">Historical Fiction</a></li>
                <li><a href="booksite.php?genre=Horror">Horror</a></li>
                <li><a href="booksite.php?genre=Mystery">Mystery</a></li>
                <li><a href="booksite.php?genre=Romance">Romance</a></li>
                <li><a href="booksite.php?genre=Science+Fiction">Science Fiction</a></li>
            </ul>
        </nav>
        <main>
            <?php
                $json = file_get_contents("books.json"); // gets json content
                $books = json_decode($json, true); // Takes a JSON encoded string and converts it into a PHP value
                $favorites = explode(",", $_COOKIE["favorites"]); //breaks cookie string into array

            foreach ($books as $book) { //loop through all books

                $favorites = isset($_COOKIE['favorites']) ? explode(",", $_COOKIE['favorites']) : []; //if cookie is set -> breaks cookie string into array, otherwise empty array
                $isFavorited = in_array($book['id'], $favorites); // check if book is favorited
            
                // check if genre is set & matches book's genre or if genre is not set (=display all books)
                if ((!isset($_GET['genre']) || $_GET['genre'] === $book['genre'])) {
                    echo '<section class="book">';
                    echo '<a class="bookmark fa ' . ($isFavorited ? 'fa-star' : 'fa-star-o') . '" href="setfavorite.php?id=' . $book['id'] . '"></a>'; //checks if favorited (full/empty star), get book id
                    echo '<h3>' . $book['title'] . '</h3>';
                    echo '<p class="publishing-info">';
                    echo '<span class="author">' . $book['author'] . '</span>,';
                    echo '<span class="year">' . $book['publishing_year'] . '</span>';
                    echo '</p>';
                    echo '<p class="description">';
                    echo $book['description'];
                    echo '</p>';
                    echo '</section>';
                }
            }


                /* FIRST TRY

                foreach ($books as $book) {
                if (in_array($book["id"], $favorites)) {
                    $icon = "bookmark fa fa-star";
                }
                else {
                    $icon = "bookmark fa fa-star-o";
                }
            } */


                // Here you should display the books of the given genre (GET parameter "genre"). Check the links above for parameter values.
                // If the parameter is not set, display all books.


                /* if (isset($_GET['genre'])) {
                        foreach ($books as $book) {
                        if ($book['genre'] === ($_GET['genre']))
                                { 
                                 ?> 
                                <section class="book">
                                <a class="bookmark fa <?php $icon ?>" 
                                href="setfavorite.php?id="<?php echo $book["id"]?>></a>
                                <h3> <?php print $book["title"] ?></h3>
                                <p><?php print $book["id"] ?><p>
                                <span><?php print $book["author"] ?></span>,
                                <span><?php print $book["publishing_year"] ?></span>
                                </p>
                                <?php print $book["description"] ?>
                                </p>
                                </section>
                                <?php }
                        }
                    }

                else { 
                    
                    foreach ($books as $book) { 
                    ?> 
                     <h2>Genre Name or "All Books"</h2>
                    <section class="book">
                    <a class="bookmark fa fa-star-o" href="setfavorite.php?id=1"></a>
                    <h3> <?php print $book["title"] ?></h3>
                    <p><?php print $book["id"] ?><p>
                    <span><?php print $book["author"] ?></span>,
                    <span><?php print $book["publishing_year"] ?></span>
                    </p>
                    <?php print $book["description"] ?>
                    </p>
                    </section>
                    <?php }
            }
            */


            ?>
           


        </main>
    </div>    
</body>
</html>