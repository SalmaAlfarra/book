<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $book = new Book();
        // $book->name = 'bookk';
        // $book->price = 5;
        // $issaved = $book->save();
        //Native sql :
        // SELECT * FROM books;
        // SELECT  id ,name FROM books;
        //$data= DB::select('SELECT * FROM books');
        // echo $data;
        // $i=0 , $i==11 , $i++
        // for($i=0;$i<count($data);$i++){
        //     if($i>=3){
        //         break;
        //     }
        //     echo "[$i]=>Name::".$data[$i]->name .':: Price' . $data[$i]->price ."<br>" ;
        // }
        // foreach ($data as $i){
        //     if($i->id>=3)
        //     {
        //         break;
        //     }
        //     echo "Name :$i->name .Price :$i->price"."<br>";
        // }
        //Query Builder :
        // SELECT * FROM books;
        // $data=DB::table('books')->get(['*']);
        // $data = DB::table('books')->select(['*'])->get();
        // foreach ($data as $i){
        //         echo "Name :$i->name .Price :$i->price"."<br>";
        //     }
        // //Elequant :
        // $data = Book::all(['*']);
        // TRASH
        // SELECT * FROM books WHERE deleted_at != null;
        // $data = Book::withoutTrashed()->get(['*']);
        // $data = Book::withTrashed()->get(['*']);
        // $data = Book::onlyTrashed()->get(['*']);
            // foreach ($data as $i){
            //     echo  " ID : $i-> id .Name :$i->name .Price :$i->price"."<br>";
            // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Native sql :
        // INSERT INTO  Tabel name( CUL1,CUL2) VALUES (1,2);
        // INSERT INTO Tabel name (1,2);
        // $issaved = DB::insert('insert into books (name,price,created_at,updated_at)
        // values (?,?,?,?)',["ahmedbook",5,now(),now()]);
        // echo $issaved  ? 'saved':'failed';

        //Query Builder :
        // $issaved = DB::table('books')->insert(
        //     [
        //         'name' =>'book 1',
        //         'price'=> 5.5,
        //         'created_at' =>now(),
        //         'updated_at' => now()

        //     ]);
        // echo $issaved  ? 'saved' : 'failed';
        // $newRowId = DB::table('books')->insertGetId(
        //     [
        //         'name' => 'kkjhbook',
        //         'price' => 5.5,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // );
        // echo "New row id is : $newRowId";

        //Elequant :
        // $book = new Book();
        // $book->name = 'bookk';
        // $book->price = 5;
        // $issaved = $book->save();
        // echo $issaved ? "saved succesfully - $book->id" : "saved faild";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Native sql :
        // $item = DB::selectOne('SELECT * FROM books WHERE id = ?',[$id]);
        // echo " Name : $item->name";

        //Query Builder :
        // $item = DB::table('books')->where('id','=',$id)->first(['*']);
        // $item = DB::table('books')->find($id, ['*']);
        // echo " Name : $item->name";

        //Elequant :
        // $item = Book::where('id','=',$id)->first();
        // $item = Book::where('id', $id)->first();
        // $item = Book::find($id);
        // $item = Book::findorfail($id);
        // echo " Name : $item->name";

        //-------------------DELETE--------------------
        //Native sql :
        // $countOfDeletedRowes= DB::delete('DELETE FROM books WHERE id = ?',[$id]);
        // echo $countOfDeletedRowes == 1 ? 'Deleted succ' : 'Deleted failed';
        //Query Builder :
        // DELETE FROM books WHERE id
        // $countOfDeletedRowes = DB::table('books')->where('id','=',$id)->delete();
        // $countOfDeletedRowes = DB::table('books')->find($id, ['*'])->delete();
        // $countOfDeletedRowes = DB::table('books')->delete($id);
        // $countOfDeletedRowes = DB::table('books')->delete();
        // echo $countOfDeletedRowes == 1 ? 'Deleted succ' : 'Deleted failed';

        //Elequant :
        // force delete :
        // $book =Book::findOrFail($id);
        // $delete = $book->delete();
        // echo $delete ? "deleted succesfully - $book->id" : "deleted faild";
        // $countOfDeletedRowes=Book::destroy([$id]);
        // echo $countOfDeletedRowes == 1 ? 'Deleted succ' : 'Deleted failed';
        // Soft delete :
        // $book = Book::findOrFail($id);
        // $delete = $book->delete();
        // echo $delete ? "deleted succesfully - $book->id" : "deleted faild";
        // restore
        // $book = Book::withTrashed()->findOrFail($id);
        // $book = Book::withoutTrashed()->findOrFail($id);
        // $book = Book::onlyTrashed()->findOrFail($id);
        // $restore=$book->restore();
        // echo $restore ? "Restored succesfully - $book->id" : "Restored faild";
        $book = Book::findOrFail($id);
        $delete = $book->forceDelete();
        echo $delete ? "deleted succesfully - $book->id" : "deleted faild";



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Native sql :
        // UPDATE books SET name = 'book naat'
        // UPDATE books SET name = 'book naat' WHERE id = 1
        // $countOfUpdatedRows=DB::update('UPDATE books SET name = ? WHERE id = ?', ['new name native',$id]);
        // echo $countOfUpdatedRows ==1 ? 'Updated succ' :'Updated failed';
        //Query Builder :
        // $countOfUpdatedRows = DB::table('books')->where('id','=',$id)->update([
        //     'name'=> 'new name - QB',
        //     'price'=>'52'
        // ]);
        // echo $countOfUpdatedRows == 1 ? 'Updated succ' : 'Updated failed';
        //Elequant :
        // $book = Book::where('id','=',$id)->first();
        // $book = Book::find($id);
        // $book=Book::findorfail($id);
        // $book->name='new name ElQ';
        //  $issaved = $book->save();
        // echo $issaved ? "saved succesfully - $book->id" : "saved faild";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //Native sql :

        //Query Builder :

        //Elequant :
    }
}