
 <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"movies");
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans"rel=stylesheet>
        <link rel="stylesheet" type="text/css">
        <style>
          table,th,td {
            border:1px solid #ddd;
            text-align:left;
            background-color: white;
            color: black;
            font-family:  "open sans", sans-serif;
            font-size:95%;
            position: relative;
          }  
         
          table {
            border-collapse:collapse;
            width: 100%;
          }
          th,td {
             padding: 8px;
             
             border-bottom:1px solid #ddd;
             
          }
          input[type=text] {
            width:30%;
            padding:12px 20px;
            margin:8px 0 0 15px;
            display: inline-block;
            border:1px solid #ccc;
            border-radius:4px;
            box-sizing: border-box;
            text-align:center;
            font-family:"open sans", sans-serif;
        }
         input[type=submit] {
            width:20%;
            background-color:#4caf50;
            color:white;
            padding:14px 20px;
            margin:20px 12% 20px 25px;
            border:none;
            border-radius:4px;
            cursor:pointer;
            font-family: "open sans", sans-serif;
          }
         h1 {
             text-align:center;
             font-family: "open sans", sans-serif;
         }
         
         .btn-primary {
            float:right;
            width:20%;
            background-color:#2320cc;
            color:white;
            padding:14px 20px;
            margin-top: 20px;
            border:none;
            border-radius:4px;
            cursor:pointer;
            font-family: "open sans", sans-serif;
         }
        
        </style>
        <title>
            search data
        </title>
    </head>
    <body>
        <centre>
            <h1>
                SEARCH AND RECORD DATA USING PHP
            </h1>
            

            <div class="container">
                <form action="" method="POST">
                    
                              <input type="text" name="mdaad" placeholder="Enter movie name/date/actor/actress/director name"/>
                              <input type="submit" name="search"value="Search"/>
                              <button type="submit" name="fetch_all" class="btn btn-primary"> View All</button>
                                <?php
                                if(isset($_POST['fetch_all']))
                                {   

                                    $query1="select * from fav_movies";
                                    $query_run1= mysqli_query($connection,$query1);
                                ?>
                                    <table >
                                    <tr>
                                         <th>MOVIE NAME</th>
                                         <th>ACTOR</th>
                                         <th>ACTRESS</th>
                                         <th>RELEASE DATE</th>
                                         <th>DIRECTOR</th>
                                    </tr><br>
                                <?php
                                    while($row=mysqli_fetch_array($query_run1))
                                    {
                                        
                                ?>
                                        <tr>
                                           
                                            <td><?php echo $row["movie_name"];?></td>
                                            <td><?php echo $row["actor"];?></td>
                                            <td><?php echo $row["actress"];?></td>
                                            <td><?php echo $row["release_date"];?></td>
                                            <td><?php echo $row["director"];?></td>
                                        </tr>
                
                                        <?php
                                    }
                                }
                               
                                 if(isset($_POST['search']))
                                 {
                                    $mdaads=$_POST['mdaad'];
                                    $query="select * from `fav_movies` where `movie_name`='$mdaads' || `actor`='$mdaads' || `actress`='$mdaads' || `director`='$mdaads' || `release_date` ='$mdaads'";
                                    $query_run= mysqli_query($connection,$query);
                                ?>
                                    <table >
                                    <tr>
                                         <th>MOVIE NAME</th>
                                         <th>ACTOR</th>
                                         <th>ACTRESS</th>
                                         <th>RELEASE DATE</th>
                                         <th>DIRECTOR</th>
                                    </tr><br>
                                <?php
                                    while($row=mysqli_fetch_array($query_run))
                                    {
                                        
                                ?>
                                        <tr>
                                           
                                            <td><?php echo $row["movie_name"];?></td>
                                            <td><?php echo $row["actor"];?></td>
                                            <td><?php echo $row["actress"];?></td>
                                            <td><?php echo $row["release_date"];?></td>
                                            <td><?php echo $row["director"];?></td>
                                        </tr>
                
                                        <?php
                                    }
                                }   
                                ?> 
                </form> 
                </table>
            </div>
        </centre>
    </body>
</html>
