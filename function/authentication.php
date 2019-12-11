<?php require_once("connect.php");
    
    if (isset($_POST['student_id'], $_POST['password']) ) {
        if ($stmt = $conn->prepare('SELECT std_id, u_pass, nickname FROM member WHERE std_id = ?')) {

            $stmt->bind_param('s', $_POST['student_id']);
            $stmt->execute();

            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($std_id, $u_pass, $nickname);
                $stmt->fetch();
                
                if ($_POST['password'] == $u_pass) {

                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['u_name'] = $nickname;
                    $_SESSION['id'] = $std_id;
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit();
                } else {
                    echo '<script>alert("Incorrect password!")</script>';
                }
            } else {
                echo '<script>alert("Incorrect Username!")</script>';
            }
            $stmt->close(); 
        }
    }
    
    if ($_GET['signout'] == '1') {
        unset($_SESSION['loggedin']);
        unset($_SESSION['u_name']);
        unset($_SESSION['id']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
?>