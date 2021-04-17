<?php

namespace App\Http\Controllers;

use DB;
use App\Categories;
use App\Menu;
use Illuminate\Http\Request;
use Session;

class MenuController extends Controller
{
    public function index()
    {
        $outlet_id = Session::get('outlet_id');
        $data['menu'] = Menu::where('outlet_id', $outlet_id)->get();
        return view('admin.menu.menu_list', $data);
    }

    public function create()
    {
        $outlet_id = Session::get('outlet_id');
        $data['categories'] = Categories::where('outlet_id', $outlet_id)->get();
        return view('admin.menu.menu_form', $data);
    }

    public function edit($id)
    {
        $outlet_id = Session::get('outlet_id');
        $data['menu'] = Menu::where('id', $id)->with('category')->first();
        $data['categories'] = Categories::where('outlet_id', $outlet_id)->get();
        return view('admin.menu.menu_form', $data);
    }

    public function store(Request $request)
    {
        $update_id = $request->id;

        $data = $this->post_data($request);

        if (isset($update_id) && !empty($update_id) && $update_id != 0) {
            $menu = Menu::where('id', $update_id)->update($data);
            $item_data = Menu::find($update_id);
            if ($_FILES['item_image']['size'] > 0) {
                $file = $request->file('item_image');
                if (isset($item_data->item_image) && !empty($item_data->item_image)) {
                    delete_images_by_name(ORIGNAL_IMAGE_PATH_ITEMS, LARGE_IMAGE_PATH_ITEMS, MEDIUM_IMAGE_PATH_ITEMS, SMALL_IMAGE_PATH_ITEMS, $item_data->item_image);
                    upload_images(ORIGNAL_IMAGE_PATH_ITEMS, LARGE_IMAGE_PATH_ITEMS, MEDIUM_IMAGE_PATH_ITEMS, SMALL_IMAGE_PATH_ITEMS, $file, $item_data->id, 'item_image', 'menus');
                } else {
                    upload_images(ORIGNAL_IMAGE_PATH_ITEMS, LARGE_IMAGE_PATH_ITEMS, MEDIUM_IMAGE_PATH_ITEMS, SMALL_IMAGE_PATH_ITEMS, $file, $item_data->id, 'item_image', 'menus');
                }
            }
            return redirect()->route('admin:menu')->with('success', 'Item updated successfully!');
        } else {
                $item = Menu::create($data);
                $last_in_id = $item->id;
                if (isset($last_in_id) && !empty($last_in_id)) {
                    if (isset($_FILES['item_image']['size'])) {
                        if ($_FILES['item_image']['size'] > 0) {
                            $file = $request->file('item_image');
                            upload_images(ORIGNAL_IMAGE_PATH_ITEMS, LARGE_IMAGE_PATH_ITEMS, MEDIUM_IMAGE_PATH_ITEMS, SMALL_IMAGE_PATH_ITEMS, $file, $last_in_id, 'item_image', 'menus');
                        }
                    }
                }
                return redirect()->route('admin:menu')->with('success', 'Item added successfully!');
            

        }

    }

    public function post_data(Request $request){
        $outlet_id = Session::get('outlet_id');
        $data['outlet_id'] = $outlet_id;
        $data['item_name'] = $request->item_name;
        $data['item_cat_id'] = $request->item_cat_id;
        $data['item_price'] = $request->item_price;
        $data['item_discount'] = $request->item_discount;
        $data['item_discount_type'] = $request->item_discount_type;
        $data['item_vat'] = $request->item_vat;
        $data['item_description'] = $request->item_description;
        if($request->itemVat_status == 'on')
        $itemVat_status = 1;
        else
        $itemVat_status = 0;
        $data['itemVat_status'] = $itemVat_status;
        if($request->itemDiscount_status == 'on')
        $itemDiscount_status = 1;
        else
        $itemDiscount_status = 0;
        $data['itemDiscount_status'] = $itemDiscount_status;
        if($request->is_featured == 'on')
        $is_featured = 1;
        else
        $is_featured = 0;
        $data['is_featured'] = $is_featured;
        if($request->has_extras == 'on')
        $has_extras = 1;
        else
        $has_extras = 0;
        $data['has_extras'] = $has_extras;
        if($request->status == 'on')
        $status = 1;
        else
        $status = 0;
        $data['status'] = $status;

        return $data;
    }

    public function change_status(Request $request)
    {
        $status = false;
        $message = "Error in Changing Status";
        $item = $request->item_id;
        $status = $request->status;
        if (isset($item) && !empty($item)) {
            if ($status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $categories = Menu::where('id', $item)->update(['status' => $status]);
            $status = true;
            $message = "Status Changed";
        }
        return response()->json(['status' => $status, 'message' => $message]);
    }


    public function destroy($id)
    {
        $menu = Menu::where('id', $id)->delete();
        if ($menu == 1) {
            return redirect()->route('admin:menu')->with('success', 'Item removed successfully!');
        }
    }
}
