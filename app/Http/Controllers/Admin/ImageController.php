<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Image::get();
        return view('admin.image.index', [ 'images' => $images, 'titlePage' => 'Image', 'addTitlePage' =>'Main page' ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.image.create', ['titlePage' => 'Image', 'addTitlePage' =>'Create page']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
                //
        // validat
        $rules = array(
            'image_url' => 'required|max:200',
            'imageable_id' => 'required',
            'imageable_type' => 'required',
            'file' => ''
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/image/create')
                ->withErrors($validator);
        } else {
            // store
            $image = new Image;
            $image->image_url       = Input::get('image_url');
            $image->imageable_id      = Input::get('imageable_id');
            $image->imageable_type = Input::get('imageable_type');
            $image->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/image');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
         $image = Image::find($image)->first();
        return view('admin.image.edit', ['image'=> $image,'titlePage' => 'Image', 'addTitlePage' =>'Edit page']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
          $rules = array(
            'image_url' => 'required|max:200',
            'imageable_id' => 'required',
            'imageable_type' => 'required',
            'file' => ''
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/image/'. $image .'/edit')
                ->withErrors($validator);
        } else {
            // store
            $image = new Image;
            $image->image_url       = Input::get('image_url');
            $image->imageable_id      = Input::get('imageable_id');
            $image->imageable_type = Input::get('imageable_type');
            $image->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/image');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
