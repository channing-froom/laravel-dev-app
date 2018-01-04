<?php
namespace App\Http\Controllers;

use App\Models\Taxonomy;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        //$taxonomy = Taxonomy::all();

        return Taxonomy::find(1);
    }
}
