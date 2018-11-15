<?php
    function do_login($post){
        session_start();
        $sql = sprintf("SELECT user_id, name, user_type, cdr, extensions " .
                       " FROM webusers WHERE (username='%s' AND password='%s')",
                       mysql_real_escape_string($post["username"]),
                       md5(mysql_real_escape_string($post["password"]))
        );
        $result  = mysql_query($sql) or die('Error, query failed: ' . $sql . " : " . $HOST);
        $rst = mysql_fetch_array($result, MYSQL_ASSOC);
        
        if($rst["user_id"] != null){
            $_SESSION["user_session"]["uid"] = $rst["user_id"];
            $_SESSION["user_session"]["name"] = $rst["name"];
            $_SESSION["user_session"]["type"] = $rst["user_type"];
            $_SESSION["user_session"]["cdr"] = $rst["cdr"];
            $_SESSION["user_session"]["extensions"] = $rst["extensions"];
            return true;
        } else {
            return false;
        }
    }
    
    function updatepassword($post){
        session_start();
        $sql = sprintf("UPDATE users SET password = '%s' WHERE user_id = %d",
                       md5(mysql_real_escape_string($post["password"])),
                       $_SESSION["user_session"]["uid"]
        );
        $result  = mysql_query($sql) or die('Error, query failed: ' . $sql . " : " . $HOST);
    }
?>

