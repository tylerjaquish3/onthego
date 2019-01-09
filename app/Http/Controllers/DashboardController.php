<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getPostData()
    {
        $posts = Post::with('category', 'creator')->get();

        return DataTables::of($posts)
            ->editColumn('title', function ($post) {
                $route = route("posts.edit", ["id" => $post->id]);
                $element = "<a href='{$route}'>$post->title</a>";

                return $element;
            })
            ->editColumn('is_active', function ($post) {
                $badge_color = $post->is_active == 1 ? 'green' : 'red';
                $badge_text = $post->is_active == 1 ? 'Published' : 'Draft';
                return '<span class="badge bg-' . $badge_color . '">' . $badge_text . '</span>';
            })
            ->rawColumns(['title', 'is_active'])
            ->setRowId('id')
            ->make(true);
    }

    public function editPhotos()
    {
        $photos = Photo::all();

        return view('dashboard.photos', ['photos' => $photos]);
    }

    public function updatePhotos(Request $request)
    {
        $captions = $request->caption;
        $active = $request->is_active;

        // dd($active);

        foreach ($captions as $id => $caption) {
            $photo = Photo::find($id);

            $isActive = 0;
            if (array_key_exists($id, $active)) {
                $isActive = 1;
            }

            $photo->update([
                'caption' => $caption,
                'is_active' => $isActive
            ]);
        }

        return json_encode(['error' => false, 'message' => 'Photos were saved.']);
    }


}
