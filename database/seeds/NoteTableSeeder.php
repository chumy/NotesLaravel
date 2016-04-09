<?php

use Illuminate\Database\Seeder;
Use App\Category;
Use App\Note;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        $notes = factory(Note::class)->times(100)->create();

        foreach ($notes as $note){
          $category = $categories->random();
          //$note->category_id = $category_id
          $category->notes()->save($note);
        }
    }
}
