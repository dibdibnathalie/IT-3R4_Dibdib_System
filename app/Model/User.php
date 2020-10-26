<?php
   namespace App\Model;

   use Illuminate\Database\Eloquent\Model;

   class User extends Model
   {
      //name of table
      protected $table = 'tbluser';
      
      // column/fields of the table
      protected $fillable = [
      'id','username', 'password'
      ];

      public $timestamps = false;
      protected $primaryKey = 'id';
   }