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
        $sessions = array();
        if ($result = mysqli_query($connection, $query)){
            printf("<table class='session-table'>");
            printf("<tr><th>Data</th> <th>Ora</th> <th>Locatia</th> <th>Descriere</th> <th>Inscris</th></td></tr> ");
            while ($row = $result->fetch_assoc()) {
                $s = new Session();
                $s -> data = $row["data"];
                $s -> descriere = $row["descriere"];
                $s -> locatia = $row["locatia"];
                $s -> ora = $row["ora"];
                array_push($sessions, $s);
                printf("<tr>");
                printf("<td>%s</td>", $s -> data);
                printf("<td>%s</td>", $s -> ora);
                printf("<td>%s</td>", $s -> locatia);
                printf("<td>%s</td>", $s -> descriere);
                if (self::is_subscribed($s -> data, $_SESSION['user'], $connection)){
                    printf("<td><input type='button' value='Renunta' id='$s->data' class='subscribe-button'/></td>");
                } else {
                    printf("<td><input type='button' class='subscribe-button' id='$s->data' value='Inscrie'/></td>");
                }
//                printf("\n data %s,ora %s, locatia %s, descriere %s,\n", $s -> data, $s -> ora, $s -> locatia, $s -> descriere);
                printf("</tr>");
            }
            printf("</table>");
        }

        return $sessions;
    }
    static function subscribe_user_to_session ($data, $username){
        include ('DatabaseManager.php');
        $connection = getConnection();
        $query = sprintf("INSERT INTO coderdojo.inscrieri (id_utilizator, data) VALUES('%s', '%s')",
            mysqli_real_escape_string($connection, $username),
            mysqli_real_escape_string($connection, $data)
        );
        mysqli_query($connection, $query);
        $rows = mysqli_affected_rows($connection);
        if($rows == 1)
        {
            closeConnection($connection);
        }
    }

    static function unsubscribe_user_to_session ($data, $username){
        include('DatabaseManager.php');
        $connection = getConnection();
        $query = sprintf("DELETE FROM coderdojo.inscrieri WHERE id_utilizator = '%s' AND data = '%s'",
            mysqli_real_escape_string($connection, $username),
            mysqli_real_escape_string($connection, $data)
        );
        mysqli_query($connection, $query);
        $rows = mysqli_affected_rows($connection);
        if ($rows == 1) {
            closeConnection($connection);
        }
    }

    static function is_subscribed ($data, $user_id, $connection){
        $query = sprintf("SELECT * FROM coderdojo.inscrieri WHERE data = '%s' AND id_utilizator = '%s'", $data, $user_id);
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        return ($rows == 1);
    }


}



