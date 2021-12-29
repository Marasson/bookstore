<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BooksForm extends Component
{
    use WithPagination;

    public $title;
    public $description;
    public $book_id;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
    ];

    public function storeBook()
    {
        $this->validate();
        $book = Book::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
        $this->reset();
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $this->book_id = $book->id;
        $this->title = $book->title;
        $this->description = $book->description;
    }

    public function update()
    {
        $book = Book::updateOrCreate(
            [
                'id'   => $this->book_id,
            ],
            [
                'title' => $this->title,
                'description' => $this->description
            ],

        );

        $this->reset();
    }

    public function destroy($id)
    {
        Book::destroy($id);
    }


    public function render()
    {
        return view('livewire.book-form', ['books' => Book::latest()->paginate(10)]);
    }
}