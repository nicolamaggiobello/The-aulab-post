<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function setAdmin(User $user){
        $user->update([
            'is_admin' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai corretamente reso amministratore l\'utente scelto');
    }


    public function setRevisor(User $user){
        $user->update([
            'is_revisor' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai corretamente reso revisore l\'utente scelto');
    }

    public function setWrither(User $user){
        $user->update([
            'is_writer' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai corretamente reso redattore l\'utente scelto');
    }
    
    public  function dashboard(){
        $adminRequest = User::where('is_admin'. false)->get();
        $revisorRequest = User::where('is_revisor', false)->get();
        $writherRequest = User::where('is_writer', false)->get();
       
       
        return view('admin.dashboard', compact('adminRequest', 'revisorRequest', 'writherRequest'));
     }

     public function editTag(Request $request, Tag $tag){
        $request->validate([
            'name' => 'required|unique:Tags',
        ]);
        $tag->update([
            'name' => strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato il tag');
     }

     public function deleteTag(Tag $tag){
        foreach($tag->articles as $article){
            $article->tags()->detach($tag);
        }
        $tag->delete();
        return redirect(route('admin.dashboard'))->with('message', 'Hai corretamente eliminato il tag');
     }

     public function editCategory(Request $request, Category $category){
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category->update([
            'name' => strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato la categoria');
     }

     public function deleteCategory(Category $category){
        $category->delete();
        return redirect(route('admin.dashboard'))->with('message', 'Hai corretamente eliminato la categoria');
     }

     public function storeCategory(Request $request){
        Category::create([
            'name' => strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai corretamente  inserito una nuova categoria');
     }


}
