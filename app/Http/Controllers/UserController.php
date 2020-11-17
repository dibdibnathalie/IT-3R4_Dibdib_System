<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Response;
    use Illuminate\Http\Request;
    use App\Model\Traits\ApiResponser;
    use App\Model\User;
    use DB;

    Class UserController extends Controller 
    {
        use ApiResponser;
        private $request;

        public function __construct(Request $request)
        {
        $this->request = $request;
        }

        //getting all users from database
        public function getUsers()
        {
        $user = DB::connection('mysql')->select("SELECT * FROM tbluser");
        //return response()->json($users,200);
        return $this->successResponse($user);
        }

        //
        public function index()
        {
            $user = User::all();
            return $this->successResponse($user);
        }

        public function showLogIn()
        {
            return view('login');
        }
        
        public function result()
        {        
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = app('db')->select("SELECT * FROM tbluser WHERE username='$username' AND password='$password'");
        
            if(empty($user))
            {
                echo '<script>alert("Invalid Input!")</script>';
                return view('login');
            }
            else
            {
                echo '<script>alert("Succesfully Logged In!")</script>';
                return view('login');
            }
        }

        //add user function
        public function add(Request $request)
        {
            $rules = [ 
                'username' => 'required|max:20', 
                'password' => 'required|max:20'
            ];

            $this->validate($request, $rules);
            $user = User::create($request->all());
            return $this->successResponse($user, Response::HTTP_CREATED);
        }

        //specific user search function
        public function show($id)
        {
            //$user = User::findOrFail($id);
            $user = User::where('id', $id)->first();
            if($user)
            {
            return $this->successResponse($user); 
            }
            else
            {
                return $this->errorResponse('User ID Does Not Exist', Response::HTTP_NOT_FOUND);
            }
        }

        public function update(Request $request, $id)
        {
            $rules = [
                'username' => 'max:20',
                'password' => 'max:20'
            ];

            $this->validate($request, $rules);

            $user = User::where('id', $id)->first();

            if ($user)
            {
                $user->fill($request->all());

                if ($user->isCLean())
                {
                    return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
                }      

                $user->save();
                return $this->successResponse($user);
            }   
            {
                return $this->errorResponse('User ID Does Not Exist', Response::HTTP_NOT_FOUND);
            }

        }


        public function delete($id)
        {
            $users = User::where('id', $id)->first();
            if($user)
            {
                $user->delete();
                return $this->successResponse($user);
            }
            {
                return $this->errorResponse('UserID Does Not Exists', Response::HTTP_NOT_FOUND);
            }
        }
    }
