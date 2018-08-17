<?php 
    include_once 'inc/dbc.inc.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoApp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>ToDoApp</h1>
        <form action="addTask.php" method="POST">
            <input type="text" name="newTask">
            <button type="submit">Add task to List</button>
        </form>
        
        <?php 
            $object = new DBConn();

            $object -> query('SELECT * FROM tasks');

            echo '<ul>';

            while($row = $stmt->fetch())
            {
                    //Słaby sposób na przesyłanie id zadania
                    $idNum = $row['id'];
                    if($row['status'] == 1) {
                        echo "<li><s>";
                            echo "<form action='done.php' method='POST'>";
                            echo "<span name='task".$row['id']."'>".$row['id'].'. '.$row['task']."</span>";
                            echo "<button name = 'done' class ='done'>Oznacz jako ukończone</button>";
                            echo "<button name = 'delete' class = 'delete'>Usuń zadanie</button>";
                            echo "<input type='text' name='id' value=".$row['id'].">";
                            echo "</form>";
                        echo "</s></li>";
                    } else {
                         echo "<li>";
                            echo "<form action='done.php' method='POST'>";
                            echo "<span name='task".$row['id']."'>".$row['id'].'. '.$row['task']."</span>";                           
                            echo "<button name ='done' class ='done'>Oznacz jako ukończone</button>";
                            echo "<button name = 'delete' class = 'delete'>Usuń zadanie</button>";
                            echo "<input type='text' name='id' value=".$row['id'].">";
                            echo "</form>";
                        echo "</li>";
                }
            }
            $stmt->closeCursor();
            echo '</ul>';
        
       
        ?>
        
     
    </div>
    <form action="deleteAll.php" method="get">
        <button type="submit">Usuń wszystko</button>
       
    </form>


</body>
</html>

<a href="done.php&id=<?php echo $row['id']?>"></a>

TODO: <br>
1. <s> Dodać zmianę statusu zadania na done. STATUS = 1; </s> <br>
2. <s> Dodać usuwanie zadań. </s> <br>
3. Zmienić system uzupłniania ID. <br>
4. Wrzucić PDO do osobnej klasy. <br>
5. Uporządkować kod <br>
6. Dodać bootstrapa <br>
7. Dodać info, o tym że nie ma zadań <br>
8. Lepszy sposób na wysyłanie ID <br>
9. Zmienić nazwę done.php <br>
10. Uporać się z charset