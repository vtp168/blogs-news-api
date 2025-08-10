<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostImage;
use Illuminate\Support\Facades\Storage;


class PostImageController extends Controller
{
    public function destroy($id)
    {
        $image = PostImage::findOrFail($id);

        // Delete file from storage
        if (Storage::exists($image->image_path)) {
            Storage::delete($image->image_path);
        }

        $image->delete();

        return response()->json(['message' => 'Image deleted.']);
    }

}
