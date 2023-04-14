<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory as FactoriesHasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Iluminate\Database\Eloquent\Factories\HasFactory;
use Iluminate\Database\Eloquent\Model;

class Categoria extends EloquentModel
{
 use FactoriesHasFactory;

 protected $table = "categorias";
 protected $primaryKey = "cod_categoria";
 protected $fillable = ["titulo"];

 public $timestamps=false;
}