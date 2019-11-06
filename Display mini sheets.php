<?php
require_once './connect-to.php';
        //var_dump ($_GET);
        
      
          $query = 'SELECT * 
          FROM movies
          WHERE movie_id = ' . $_GET['id'];
          $results = connectTo($query);
        
              ?>                                      
            <a href="Display mini sheets.php?id=<?php echo $db_record['movie_id']; ?>">Movie <?php echo $db_record['movie_id']; ?></a><br>
                <img src="./pic/<?php echo $db_record['post_path']; ?>" alt=""><br>
                <p>Title: <?php echo $db_record['name']; ?></p>
                <p>Year of release: <?php echo $db_record['release_year']; ?></p>
                <p>Synopsis: <?php echo $db_record['short_synopsis']; ?></p>
                <a href="<?php echo $db_record['']; ?>"
                

            
                <?php 
        


        ?> 