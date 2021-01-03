<?php
   namespace App\Model;

   use Illuminate\Database\Eloquent\Model;

   class User extends Model
   {
      //name of table
      protected $table = 'tbluser';
      
      // column/fields of the table
      protected $fillable = [
      'username', 'password', 'job_id'
      ];

      public $timestamps = false;
      protected $primaryKey = 'id';

<<<<<<< HEAD
      protected $hidden = ['password'];
=======
      
      protected $hidden = ['password'];
   
>>>>>>> cb72339fd836c37557b4f3776949de2ce4ceeb9f
   }