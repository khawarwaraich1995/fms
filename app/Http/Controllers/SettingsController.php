<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['settings'] = Settings::all();
        return view('admin.settings.manage', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_images(Request $request)
    {
        $update_id = $request->id;

        if (isset($update_id) && !empty($update_id) && $update_id != 0) {

            $settings = Settings::where('id', $update_id)->first();

            if ($_FILES['admin_logo']['size'] > 0) {
                if(isset($settings->admin_logo) && !empty($settings->admin_logo))
                {
                    $file = $request->file('admin_logo');
                    delete_images_by_name(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN,$settings->admin_logo);
                    upload_images(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN, $file, $update_id, 'admin_logo', 'settings');
                }
            }

            if ($_FILES['admin_favicon']['size'] > 0) {
                if(isset($settings->admin_favicon) && !empty($settings->admin_favicon))
                {
                    $file = $request->file('admin_favicon');
                    delete_images_by_name(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN,$settings->admin_favicon);
                    upload_images(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN, $file, $update_id, 'admin_favicon', 'settings');
                }
            }

            if ($_FILES['admin_cover']['size'] > 0) {
                if(isset($settings->admin_cover) && !empty($settings->admin_cover))
                {
                    $file = $request->file('admin_cover');
                    delete_images_by_name(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN,$settings->admin_cover);
                    upload_images(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN, $file, $update_id, 'admin_cover', 'settings');
                }
            }

            return redirect()->route('admin:settings')->with('success', 'Data Updated successfully!');

        }else{
            $settings = new Settings();
            $settings->admin_logo = '';
            $settings->admin_favicon = '';
            $settings->admin_cover = '';
            $settings->save();
            $last_id = $settings->id;
            if (isset($last_id) && !empty($last_id)) {
                if (isset($_FILES['admin_logo']['size'])) {
                    if ($_FILES['admin_logo']['size'] > 0) {
                        $file = $request->file('admin_logo');
                        upload_images(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN, $file, $last_id, 'admin_logo', 'settings');
                    }
                }
                if (isset($_FILES['admin_favicon']['size'])) {
                    if ($_FILES['admin_favicon']['size'] > 0) {
                        $file = $request->file('admin_favicon');
                        upload_images(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN, $file, $last_id, 'admin_favicon', 'settings');
                    }
                }
                if (isset($_FILES['admin_cover']['size'])) {
                    if ($_FILES['admin_cover']['size'] > 0) {
                        $file = $request->file('admin_cover');
                        upload_images(ORIGNAL_IMAGE_PATH_ADMIN, LARGE_IMAGE_PATH_ADMIN, MEDIUM_IMAGE_PATH_ADMIN, SMALL_IMAGE_PATH_ADMIN, $file, $last_id, 'admin_cover', 'settings');
                    }
                }
                return redirect()->route('admin:settings')->with('success', 'Data saved successfully!');
            }else{
                return back()->with('error', 'Something Went wrong!');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
