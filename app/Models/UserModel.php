<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'user_access';

    protected $primaryKey = 'RecID';

    protected $returnType = 'array';

    protected $allowedFields = [
        'firtname',
        'lastname',
        'email',
        'phone_number',
        'password',
        'user_type',
        'location',
        'lat',
        'lang',
        'IsActivated',
        'created_at',
        'or_file',
        'cr_file',
        'plate_number',
        'body_number',
        'driver_license',
        'age'
    ];
    
}

?>