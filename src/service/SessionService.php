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
        include_once ('DatabaseManager.php');
        $connection = getConnection();
        try{
            $query = sprintf ("SELECT * FROM sesiune WHERE data > CURRENT_DATE
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
        finally{
            closeConnection($connection);
        }
    }
    static function subscribe_user_to_session ($data, $username){
        include_once ('DatabaseManager.php');
        $connection = getConnection();
        try{
            $query = sprintf("INSERT INTO inscrieri (id_utilizator, data) VALUES('%s', '%s')",
                mysqli_real_escape_string($connection, $username),
                mysqli_real_escape_string($connection, $data)
            );
            mysqli_query($connection, $query);
        }
        finally{
            closeConnection($connection);
        }
    }

    static function unsubscribe_user_to_session ($data, $username){
        include_once('DatabaseManager.php');
        $connection = getConnection();
        try {
            $query = sprintf("DELETE FROM inscrieri WHERE id_utilizator = '%s' AND data = '%s'",
                mysqli_real_escape_string($connection, $username),
                mysqli_real_escape_string($connection, $data)
            );
            mysqli_query($connection, $query);
        }
        finally {
            closeConnection($connection);
        }
    }

    static function is_subscribed ($data, $user_id){
        include_once('DatabaseManager.php');
        $connection = getConnection();
        try{
            $query = sprintf("SELECT * FROM inscrieri WHERE data = '%s' AND id_utilizator = '%s'", $data, $user_id);
            $result = mysqli_query($connection, $query);
            $rows = mysqli_num_rows($result);
            return ($rows == 1);
        }
        finally
        {
            closeConnection($connection);
        }
    }


}



