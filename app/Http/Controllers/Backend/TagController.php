<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagStoreRequest;
use App\Http\Requests\Admin\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags'));
    }
    
    public function create()
    {        
        return view('admin.tag.store');
    }

    public function store(TagStoreRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        $notification = [
            'message' => 'Etiket uğurla əlavə edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.tags.index')->with($notification);
    }
    
    public function show(Tag $tag)
    {
        //
    }
    
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }
    
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->name = $request->name;
        $tag->save();

        $notification = [
            'message' => 'Etiket uğurla redaktə edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.tags.index')->with($notification);
    }
    
    public function destroy(Tag $tag)
    {
        $tag->delete();

        $notification = [
            'message' => 'Etiket uğurla silindi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.tags.index')->with($notification);
    }
}
