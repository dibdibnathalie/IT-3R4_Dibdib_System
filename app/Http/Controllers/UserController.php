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

        public function getUsers()
        {
        $users = DB::connection('mysql')->select("SELECT * FROM tbluser");
        //return response()->json($users,200);
        return $this->successResponse($users);
        }

        public function index()
        {
            $users = User::all();
            return $this->successResponse($users);
        }

        //add user function
        public function add(Request $request)
        {
            $rules = [ 
                'username' => 'required|max:20', 
                'password' => 'required|max:20'
            ];

            $this->validate($request, $rules);
            $users = User::create($request->all());
            return $this->successResponse($users, Response::HTTP_CREATED);
        }

        //specific user search function
        public function show($id)
        {
            //$user = User::findOrFail($id);
            $users = User::where('id', $id)->first();
            if($users)
            {
            return $this->successResponse($users); 
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

            $users = User::where('id', $id)->first();

            if ($users)
            {
                $users->fill($request->all());

                if ($users->isCLean())
                {
                    return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
                }      

                $users->save();
                return $this->successResponse($users);
            }   
            {
                return $this->errorResponse('User ID Does Not Exist', Response::HTTP_NOT_FOUND);
            }

        }


        public function delete($id)
        {
            $users = User::where('id', $id)->first();
            if($users)
            {
                $users->delete();
                return $this->successResponse($users);
            }
            {
                return $this->errorRespnse('UserID Does Not Exists', Response::HTTP_NOT_FOUND);
            }
        }
    }
