<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Model\User;
    use DB;

    Class LoginController extends Controller 
    {
        public function __construct(Request $request)
        {
            $this->request = $request;
        }

        public function showLogIn()
        {
            return view('login');
        }

        public function result()
        {        
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = app('db')->select("SELECT * FROM tbluser WHERE username='$username' and password='$password'");
        
            if(empty($login))
            {
                return "Invalid!";
            }
            else
            {
                echo '<script>alert("Succesfully Logged In!")</script>';
                return view('login');
            }

            /*$result = User::all();
            $match = false;

            if(empty($result))
            {
                return "Empty Credentials!";
            }

            foreach($result as $r)
            {
                $user = $r->username;

                if ($user == $username)
                {
                    $pass = $r->password;

                    if ($pass == $password)
                    {
                        $match = true;
                        return "You logged in successfully!";
                        break;
                    }
                }

                if($match == false)
                {
                    return "Invalid Input!";
                }
            }*/
        }


    }