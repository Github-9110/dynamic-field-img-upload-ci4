<?php 
namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model {

	protected $table      = 'upload_img';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'image'];

}
?>