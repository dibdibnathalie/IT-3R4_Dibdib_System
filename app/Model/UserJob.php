<?php
   namespace App\Model;

   use Illuminate\Database\Eloquent\Model;

   class UserJob extends Model
   {
      //name of table
      protected $table = 'tbluser';
      
      // column/fields of the table
      protected $fillable = [
      'username', 'password', 'job_id'
      ];

      public $timestamps = false;
      protected $primaryKey = 'id';

      protected $hidden = ['password'];
   }