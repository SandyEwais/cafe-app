<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuStoreRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menus.index',[
            'menus' => DB::table('menus')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menus.create',[
            'categories' => DB::table('categories')->get(['name','id'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image')->store('images/menus','public');
        }else{
            $image = 'images/no-image.jpg';
        }
        $menu = Menu::create([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price,
            'description' => $request->description

        ]);
        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }
        return redirect()->route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit',[
            'menu' => $menu,
            'categories' => DB::table('categories')->get(['name','id']),
            'selected' => DB::table('category_menu')->where('menu_id','=',$menu->id)->get('category_id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuStoreRequest $request, Menu $menu)
    {
        if($request->hasFile('image')){
            // Storage::delete($menu->image);
            $image = $request->file('image')->store('images/menu','public');
        }else{
            $image = 'images/no-image.jpg';
        }
        
        $menu->update([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price,
            'description' => $request->description

        ]);
        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }
        return redirect()->route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index');
    }
}
