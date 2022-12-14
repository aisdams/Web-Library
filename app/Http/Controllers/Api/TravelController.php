<?php

namespace App\Http\Controllers\Api;

use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $travels = Travel::latest()->paginate(5);

        //return collection of posts as a resource
        return new TravelResource(true, 'List Data Travels', $travels);
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'content'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/travels', $image->hashName());

        //create post
        $travel = Travel::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        //return response
        return new TravelResource(true, 'Data Travel Berhasil Ditambahkan!', $travel);
    }

    public function show(Travel $travel)
    {
        //return single post as a resource
        return new TravelResource(true, 'Data Travel Ditemukan!', $travel);
    }

    public function update(Request $request, Travel $travel)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'content'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/travels', $image->hashName());

            //delete old image
            Storage::delete('public/travels/'.$travel->image);

            //update post with new image
            $travel->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);

        } else {

            //update post without image
            $travel->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        //return response
        return new TravelResource(true, 'Data travel Berhasil Diubah!', $travel);
    }
    
    public function destroy(Travel $travel)
    {
        //delete image
        Storage::delete('public/travels/'.$travel->image);

        //delete post
        $travel->delete();

        //return response
        return new TravelResource(true, 'Data Travel Berhasil Dihapus!', null);
    }
}