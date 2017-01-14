<?php
/**
 * Created by PhpStorm.
 * User: cioba
 * Date: 14-Jan-17
 * Time: 11:09 AM
*/
class Session
{
    var $data;
    var $ora;
    var $locatia;
    var $descriere;

}
class SessionService{
    static function get_next_sessions() {
        include ('DatabaseManager.php');
        $connection = getConnection();
        $query = sprintf ("SELECT * FROM coderdojo.sesiune WHERE data > CURRENT_DATE
                          OR (data = CURRENT_DATE AND CURRENT_TIME < ora - INTERVAL 1 hour)");
        if ($result = mysqli_query($connection, $query)){
            while ($row = $result->fetch_assoc()) {
                $s = new Session();
                $s -> data = $row["data"];
                $s -> descriere = $row["descriere"];
                $s -> locatia = $row["locatia"];
                $s -> ora = $row["ora"];
                printf("\n data %s,ora %s, locatia %s, descriere %s,\n", $s -> data, $s -> ora, $s -> locatia, $s -> descriere);
            }
        }

    }
}
