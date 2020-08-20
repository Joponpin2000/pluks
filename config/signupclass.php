<?php
class SignupClass
{
    public $name = "";
    public $firstname = "";
    public $lastname = "";
    public $email = "";
    public $username = "";
    public $password = "";
    public $confirm_password = "";
    public $err = "";
    protected $connection = null;

    // this function is called everytime this class is instantiated
    public function __construct($db_host = "localhost", $db_name = "pluks", $db_username = "root", $db_password = "")
    {
        try
        {
            $this->connection = new PDO("mysql:host={$db_host};dbname={$db_name};", $db_username, $db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    // function to execute statement
    private function executeStatement($statement = "", $parameters = [])
    {
        if ($stmt = $this->connection->prepare($statement))
        {
            if ($stmt->execute($parameters))
            {
                return $stmt;    
            }
            else
            {
                $this->err = "Oops! Something went wrong. Please try again later.";
            }
        }
    }

    // function to create new user
    public function CreateUser()
    {
        $statement = "INSERT INTO users (username, password, name, email) VALUES (:username, :password, :name, :email)";
        if ($this->executeStatement($statement, ['username' => $this->username, 'password' => $this->password, 'name' => $this->name, 'email' => $this->email]))
        {
            $this->msg = "Account created successfully! \nProceed to Login.";
            return $this->connection->lastInsertId();
        }
    }

    public function CheckUsername()
    {
        $statement = "SELECT * FROM users WHERE username = :username";
        $result = $this->executeStatement($statement, ['username' => $this->username]);
        if ($result->rowCount() > 0)
        {
            return $this->err = "Username already exist!";
        }
        if ($result->rowCount() == 0)
        {   
            $this->CreateUser();
        }
    }

    public function validateFirstname($firstname = "")
    {
        if (empty(trim($firstname)))
        {
            return $this->err = "Please enter firstname.";
        }
        else
        {
            return $this->firstname = trim($firstname);
        }
    }

    public function validateLastname($lastname = "")
    {
        if (empty(trim($lastname)))
        {
            return $this->err = "Please enter lastname.";
        }
        else
        {
            return $this->lastname = trim($lastname);
        }
    }

    public function validateEmail($email = "")
    {
        if (empty(trim($email)))
        {
            return $this->err = "Please enter email.";
        }
        else
        {
            return $this->email = trim($email);
        }
    }

    public function validateUsername($username = "")
    {
        if (empty(trim($username)))
        {
            return $this->err = "Please enter username.";
        }
        else
        {
            return $this->username = trim($username);
        }
    }

    public function validatePassword($password = "")
    {
        if (empty(trim($password)))
        {
            return $this->err = "Please enter password.";
        }
        else
        {
            $this->password = trim($password);

            if (strlen($this->password) < 6)
            {
                return $this->err = "Password should have at least 6 characters.";
            }
        }
    }

    public function validateConfirmPassword($confirm_password = "")
    {
        if (empty(trim($confirm_password)))
        {
            return $this->err = "Please confirm password.";
        }
        else
        {
            $this->confirm_password = trim($confirm_password);

            if (trim($confirm_password) != $this->password)
            {
                return $this->err = "Passwords do not match!";
            }
        }
    }

    public function Name()
    {
        $this->name = $this->firstname . " " . $this->lastname;
    }
}
?>