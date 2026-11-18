<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    // Inisialisasi Table
    protected $table = 'categories';

    // Primary key
    protected $primaryKey = 'id_category';

    // Mass Assignment
    protected $fillable = [
        'name_category'
    ];

    // Disable timestamps if the table does not have created_at and updated_at
    public $timestamps = false;

    // Get Total Data (count)
    public static function totalCategories()
    {
        return self::count();  // Direct count method
    }

    // Get All Categories (Optional method)
    public static function getAll()
    {
        return self::all();  // Return all records from the 'categories' table
    }

    // Get Category by ID
    public static function getById($id)
    {
        return self::where('id_category', $id)->first();
    }

    // Update Category
    public static function updateData($id, $data)
    {
        return self::where('id_category', $id)->update($data);
    }

    // Delete Category
    public static function deleteData($id)
    {
        return self::where('id_category', $id)->delete();
    }
}
