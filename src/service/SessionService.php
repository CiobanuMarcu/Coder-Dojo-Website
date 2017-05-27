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
            while ($row = $result->fetch_assoc()) {
                $s = new Session();
                $s->data = $row["data"];
                $s->descriere = $row["descriere"];
                $s->locatia = $row["locatia"];
                $s->ora = $row["ora"];
                array_push($sessions, $s);
            }
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

    static function is_subscribed ($data, $user_id){
        $connection = getConnection();
        $query = sprintf("SELECT * FROM coderdojo.inscrieri WHERE data = '%s' AND id_utilizator = '%s'", $data, $user_id);
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        closeConnection($connection);
        return ($rows == 1);
    }


}



