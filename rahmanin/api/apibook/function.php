  <?php
  function getBooks(mysqli $db){
     $query="SELECT books.*,author.name AS author,genre.genre_title AS genre
     From books
     LEFT JOIN author_link AS book_author ON books.id=book_author.book_id
     LEFT JOIN author ON book_author.author_id=author.id
     LEFT JOIN genre_link AS genre_Book ON books.id=genre_Book.book_id
     LEFT JOIN genre on genre_Book.genre_id=genre.id
      ";

    $posts = mysqli_query($db, $query);

    $postsList = [];

    while ($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }
    
    echo json_encode($postsList);

  }

  function getBook($db,$id){
    $query="SELECT books.*,author.name AS author,genre.genre_title AS genre
    From books
    LEFT JOIN author_link AS book_author ON books.id=book_author.book_id
    LEFT JOIN author ON book_author.author_id=author.id
    LEFT JOIN genre_link AS genre_Book ON books.id=genre_Book.book_id
    LEFT JOIN genre on genre_Book.genre_id=genre.id
      WHERE books.id=$id";
    $post = mysqli_query($db, $query);
    if(mysqli_num_rows($post)===0){
        http_response_code(404);
         $res=[
             "status"=>false,
             "message"=> "Post not found"
         ];
         echo json_encode($res);

    }
    else{
        http_response_code(200);

        $post=mysqli_fetch_assoc($post);
        echo json_encode($post);
        

    }
}