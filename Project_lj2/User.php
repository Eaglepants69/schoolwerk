<?php 

        


class User{

    protected $firstName;
    protected $lastName;
    protected $email;
    protected $password;
    protected $db_conn;

    protected $message = '';

    public function __construct()
    {
    	$dbname = 'project_5';
        $user = 'root';
        $pass = '';

        $this->db_conn = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
     
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function login($email_ingevuld, $wachtwoord_ingevuld)
    {
        $sql = "SELECT * FROM users WHERE email = :ph_email AND password = :ph_password";
        $statement = $this->db_conn->prepare($sql);
        $statement->bindParam(":ph_email", $email_ingevuld);
        $statement->bindparam(":ph_password", $wachtwoord_ingevuld);
        $statement->execute();

        $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);
        

         
            //checked of databasegegevens een array is maar ook of het gevult is met data
            if(is_array($database_gegevens) && !empty($database_gegevens)){
                $this->message = 'Gebruiker bestaat';
                //check of het ingevulde wachtwoord gelijk is aan dat van het wachtwoord van de gebruikers
                if($database_gegevens['password'] == $wachtwoord_ingevuld){
                    header ('location: index.php');
                    $this->message =  'De gebruiker is succesvol ingelogd';

                    session_start();

                    $_SESSION["user"] = $database_gegevens['id'];
                    $_SESSION["email"] = $database_gegevens['email'];
                    $_SESSION["status"] = TRUE;
                    //session zodat je ingelogd blijft
                }
            }
            else{
                $this->message = 'Gebruiker bestaat niet';
            }
            
    }
    public function register($naam_ingevuld_register, $email_ingevuld_register, $password_ingevuld_register)
    {
         $sql = "INSERT INTO users(name, email, password) VALUES(:ph_name, :ph_email, :ph_password)";
         $statement = $this->db_conn->prepare($sql);
         $statement->bindParam(":ph_name", $naam_ingevuld_register);
         $statement->bindParam(":ph_email", $email_ingevuld_register);
         $statement->bindParam(":ph_password", $password_ingevuld_register);
         $statement->execute();
         $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);
         

        if ($database_gegevens['email'] == $email_ingevuld_register) {
            echo "Gebruiker bestaat al";
                
            }
         
            // registratie systeem
    }
    //admin login
    function login_admin($email_ingevuld, $wachtwoord_ingevuld){
        $admin = "SELECT`email`, `password` FROM `admins` WHERE email='admin@admin.ru'AND password='Admin'";
        $statement = $this->db_conn->prepare($admin);
        $statement->bindParam(":ph_email", $email_ingevuld);
        $statement->bindparam(":ph_password", $wachtwoord_ingevuld);
        $statement->execute();
        $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);

        if($database_gegevens['password'] == $wachtwoord_ingevuld && $database_gegevens['email'] == $email_ingevuld){
            
            header ('location: admin.php');

            session_start();

                    $_SESSION["user"] = $database_gegevens['id'];
                    $_SESSION["email"] = $database_gegevens['email'];
                    $_SESSION["status"] = TRUE;
                    //session zodat je ingelogt blijft
        }
    }
}


?>
