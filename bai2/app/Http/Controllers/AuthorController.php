<?php

namespace App\Http\Controllers;

use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    protected $authorRepository;
    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function index()
    {
        $authors = $this->authorRepository->getAll();
        return view('author.list',compact('authors'));
    }

    public function showFormCreate()
    {
        return view("author.create");
    }

    public function create(Request $request)
    {
        $this->authorRepository->create($request);
        return redirect()->route("authors.index");
    }
    public function show($id)
    {
        $author = $this->authorRepository->getById($id);
        return view("author.detail", compact("author"));
    }

    public function delete($id)
    {
        DB::table('authors')->where('id', $id)->delete();
        return redirect()->route("authors.index");
    }

    public function edit($id)
    {
        $author = DB::table('authors')->where('id', '=', $id)->get()->first();
        return view("author.update",compact("author"));
    }

    public function update($id ,Request $request)
    {
        $data = $request->only("name","country");
//        dd($data);
        DB::table('authors')
            ->where('id', $id)
            ->update($data);
        return redirect()->route("authors.index");
    }

}

