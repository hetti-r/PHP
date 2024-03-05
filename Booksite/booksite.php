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
                $json = file_get_contents("books.json");
                $books = json_decode($json, true);

                if (true) {
                    $icon = "bookmark fa fa-star"
                }

                else {
                    $icon = "bookmark fa fa-star-o"
                }



                // Here you should display the books of the given genre (GET parameter "genre"). Check the links above for parameter values.
                // If the parameter is not set, display all books.
                if (isset($_GET['genre'])) {
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

     

                // Use the HTML template below and a loop (+ conditional if the genre was given) to go through the books in file  

                // You also need to check the cookies to figure out if the book is favorite or not and display correct symbol.
                // If the book is in the favorite list, add the class "fa-star" to the a tag with "bookmark" class.
                // If not, add the class "fa-star-o". These are Font Awesome classes that add a filled star and a star outline respectively.
                // Also, make sure to set the id parameter for each book, so the setfavorite.php page gets the information which book to favorite/unfavorite.

                // Read the file into array variable $books:


            ?>
           


        </main>
    </div>    
</body>
</html>