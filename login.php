<?php
class Database {
    protected $server = "mysql:host=localhost;dbname=bmis";
    protected $user = "root";
    protected $pass = "root";
    protected $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $con;

    public function openConn() {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;
        } catch(PDOException $e) {
            echo "Database Connection Error! " . $e->getMessage();
            die;
        }
    }

    public function closeConn() {
        $this->con = null;
    }

    public function show_404() {
        http_response_code(404);
        echo "Page is currently unavailable";
        die;
    }
}

// Instantiate the database
$db = new Database();
$connection = $db->openConn();

// Check login
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password); // Only if your DB stores MD5

    $stmt_admin = $connection->prepare("SELECT * FROM tbl_admin WHERE email = ? AND password = ?");
    $stmt_admin->execute([$email, $hashed_password]);
    $admin = $stmt_admin->fetch();

    if($admin) {
        // Login successful
        session_start();
        $_SESSION['admin_id'] = $admin['id']; // or whatever column you have
        $_SESSION['admin_email'] = $admin['email'];
        echo 'Success';
        // You can redirect to dashboard
        // header('Location: admin_dashboard.php');
        // exit;
    } else {
        echo 'Invalid email or password';
    }

    $db->closeConn();
}
?>
