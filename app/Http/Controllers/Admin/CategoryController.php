<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Категтория добавлена');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Изменение сохранено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $category = Category::find($id);
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}


// Если вы создали таблицу category_post, но ошибка все еще появляется, попробуйте выполнить следующие действия:

// Убедитесь, что вы используете правильное имя таблицы в своих отношениях Eloquent. В вашем случае таблица должна называться category_post, а не category_posts.
// Убедитесь, что у вас есть столбец category_id в таблице posts, а также столбец post_id в таблице categories. Эти столбцы используются для установления связи между сообщениями и категориями.
// Убедитесь, что вы правильно настроили отношения Eloquent в своих моделях. В модели Post должно быть следующее отношение:
// public function category()
// {
//     return $this->belongsTo(Category::class);
// }
// В модели Category должно быть следующее отношение:

// public function posts()
// {
//     return $this->hasMany(Post::class);
// }
// Попробуйте очистить кеш конфигурации и кеш представлений, выполнив следующие команды в терминале:
// php artisan config:cache
// php artisan view:cache
// Перезапустите сервер приложения и попробуйте снова получить доступ к странице.
// Если вы выполнили все эти шаги, но ошибка все еще появляется, предоставьте больше информации о вашей модели, отношениях и коде контроллера, чтобы я мог лучше понять проблему.