<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class['photo'] = '';
        $class['video'] = '';
        $class['all'] = 'activefilter';
        $topics = News::with('category')->latest()->paginate(5);
        return view('admin.news', compact('topics', 'class'));
    }

    public function photo()
    {
        $class['all'] = '';
        $class['video'] = '';
        $class['photo'] = 'activefilter';
        $topics = News::with('category')->where('type', 'image')->paginate(5);
        return view('admin.news', compact('topics', 'class'));
    }

    public function video()
    {
        $class['all'] = '';
        $class['photo'] = '';
        $class['video'] = 'activefilter';
        $topics = News::with('category')->where('type', 'video')->paginate(5);
        return view('admin.news', compact('topics', 'class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.forms.news', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:255', 'file' => 'required_without:video', 'video' => 'required_without:file']);
        $topic = new News();
        if ($request->file) {
            $request->validate(['name' => 'required|max:255', 'file' => 'mimes:jpeg,bmp,png|required_without:video']);
            $mime = '.'.explode('/', $request->file->getMimeType())[1];
            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/'), $fileName);
            $topic->src = $fileName;
            $topic->type = 'image';
            $topic['mime_type'] = $mime;
        } elseif ($request->video) {
            $request->validate(['name' => 'required|max:255', 'video' => 'url|required_without:file']);
            $mime = '.jpg';
            $iframe = explode('watch?v=', $request->video)[1];
            $link = explode('&', $iframe)[0];
            $url = 'https://img.youtube.com/vi/'.$link.'/hqdefault.jpg';
            $contents = file_get_contents($url);
            $name = '/public/previews/'.$link.'.jpg';
            Storage::put($name, $contents);
            $topic->src = $link;
            $topic->type = 'video';
            $topic['mime_type'] = $mime;
        }
        $topic->name = $request->name;
        $topic->description = $request->description;
        $topic->save();
        $topic->category()->attach($request->select);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = News::with('category')->where('id', $id)->get()[0];
        return view('admin.show.news', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $data['categories'] = $categories;
        $data['topic'] = News::with('category')->where('id', $id)->get()[0];
        return view('admin.forms.news-update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(News $news, Request $request)
    {
        $request->validate(['name' => 'required|max:255', 'file' => 'mimes:jpeg,bmp,png', ]);
        if ($request->src) {
            $mime = '.'.explode('/', $request->src->getMimeType())[1];
            $request->validate(['file' => 'mimes:jpeg,bmp,png']);
            $fileName = time() . '.' . $request->src->getClientOriginalExtension();
            $request->src->move(public_path('images/'), $fileName);
            if ($news['type'] = 'video'){
                if (file_exists(Storage::path('/public/previews/'.$news['src'].'.jpg'))){
                    unlink(Storage::path('/public/previews/'.$news['src'].'.jpg'));
                }
            }
            if ($news['type'] = 'image'){
                $path = public_path('images\\'.$news['src']);
                if (file_exists($path)){
                    unlink($path);
                }
            }
            $news->update([
                'name' => $request->name,
                'description' => $request->description,
                'src' => $fileName,
                'type' => 'image',
                'mime_type' => $mime,
            ]);
            $news->category()->sync($request->select);
            if ($request->video) {
                return redirect()->route('news.index')->with('message', 'Your uploaded photo, so link will not work');
            }
            return redirect()->route('news.index');
        }
        if ($request->video) {
            $request->validate(['video' => 'url']);
            $iframe = explode('watch?v=', $request->video)[1];
            $link = explode('&', $iframe)[0];
            if ($news['type'] = 'video'){
                if (file_exists(Storage::path('/public/previews/'.$news['src'].'.jpg'))){
                    unlink(Storage::path('/public/previews/'.$news['src'].'.jpg'));
                }
            }
           if ($news['type'] = 'image'){
               $path = public_path('images\\'.$news['src']);
               if (file_exists($path)){
                   unlink($path);
               }
           }
            $news->update([
                'name' => $request->name,
                'description' => $request->description,
                'src' => $link,
                'type' => 'video',
                'mime_type' => '.jpg'
            ]);
            $news->category()->sync($request->select);
            $url = 'https://img.youtube.com/vi/'.$link.'/hqdefault.jpg';
            $contents = file_get_contents($url);
            $name = '/public/previews/'.$link.'.jpg';
            Storage::put($name, $contents);
            return redirect()->route('news.index');
        }

        else {
            $news->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            $news->category()->sync($request->select);
        }
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $path = public_path('images\\'.$news['src']);
        if ($news['type'] = 'image'){
            if (file_exists($path)){
                unlink($path);
            }
        }
        if ($news['type'] = 'video'){
            if (file_exists(Storage::path('/public/previews/'.$news['src'].'.jpg'))){
                unlink(Storage::path('/public/previews/'.$news['src'].'.jpg'));
            }
        }
        $news->delete();
        return redirect()->back();
    }
}
