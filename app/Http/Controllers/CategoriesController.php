<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Session;
use Importer;

class CategoriesController extends Controller
{

    public function index()
    {
        $outlet_id = Session::get('outlet_id');
        $data['categories'] = Categories::where('outlet_id', $outlet_id)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.categories.categories_list', $data);
    }

    public function create()
    {
        $outlet_id = Session::get('outlet_id');
        $categories_rank = Categories::where('outlet_id', $outlet_id)
            ->select('rank')
            ->get();
        for ($i = 1; $i <= 30; $i++) {
            $resultRank[$i] = $i;
        }
        if (isset($categories_rank) && !empty($categories_rank)) {
            foreach ($categories_rank as $key => $value) {
                unset($resultRank[$value->rank]);
            }
        }
        $data['rank'] = $resultRank;
        return view('admin.categories.categories_form', $data);
    }

    public function edit($id)
    {
        $data['categories_data'] = Categories::where('id', $id)->first();
        for ($i = 1; $i <= 30; $i++) {
            $resultRank[$i] = $i;
        }
        $data['rank'] = $resultRank;
        return view('admin.categories.categories_form', $data);
    }

    public function store(Request $request)
    {
        $outlet_id = Session::get('outlet_id');
        $update_id = $request->id;
        $data['outlet_id'] = $outlet_id;
        $data['cat_name'] = $request->cat_name;
        $data['rank'] = $request->rank;
        $data['cat_desc'] = $request->cat_desc;
        if ($request->discount_status == 'on')
            $discount_status = 1;
        else
            $discount_status = 0;
        $data['discount_status'] = $discount_status;
        $data['discount_name'] = $request->discount_name;
        $data['discount_amount'] = $request->discount_amount;
        $data['discount_type'] = $request->discount_type;
        $data['status'] = 1;
        if (isset($update_id) && !empty($update_id) && $update_id != 0) {
            $categories = Categories::where('id', $update_id)->update($data);
            $categories = Categories::find($update_id);
            if ($_FILES['image']['size'] > 0) {
                $file = $request->file('image');
                if (isset($categories->image) && !empty($categories->image)) {
                    delete_images_by_name(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $categories->image);
                    upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $categories->id, 'image', 'categories');
                } else {
                    upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $categories->id, 'image', 'categories');
                }
            }
            return redirect()->route('admin:categories')->with('success', 'Category updated successfully!');
        } else {
            $check_category = Categories::where('cat_name', $data['cat_name'])->get();
            if (isset($check_category) && !empty($check_category->id)) {
                return redirect()->route('admin:categories')->with('error', 'Category already exists!');
            } else {
                $categories = Categories::create($data);
                $last_in_id = $categories->id;
                if (isset($last_in_id) && !empty($last_in_id)) {
                    if (isset($_FILES['image']['size'])) {
                        if ($_FILES['image']['size'] > 0) {
                            $file = $request->file('image');
                            upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $last_in_id, 'image', $outlet_id . '_categories');
                        }
                    }
                }
                return redirect()->route('admin:categories')->with('success', 'Category added successfully!');
            }
        }
    }

    public function change_status(Request $request)
    {
        $status = false;
        $message = "Error in Changing Status";
        $cat_id = $request->cat_id;
        $cat_status = $request->status;
        if (isset($cat_id) && !empty($cat_id)) {
            if ($cat_status == 0) {
                $cat_status = 1;
            } else {
                $cat_status = 0;
            }
            $categories = Categories::where('id', $cat_id)->update(['status' => $cat_status]);
            $status = true;
            $message = "Status Changed";
        }
        return response()->json(['status' => $status, 'message' => $message]);
    }

    public function destroy($id)
    {
        $categories = Categories::where('id', $id)->delete();
        if ($categories == 1) {
            return redirect()->route('admin:categories')->with('success', 'Category removed successfully!');
        }
    }

    // public function uploadCSV(Request $request)
    // {

    //     $outlet_id = Session::get('outlet_id');
    //     $file = $request->file('csv_file');
    //     $filename = $file->getClientOriginalName();
    //     $extension = $file->getClientOriginalExtension();
    //     $tempPath = $file->getRealPath();
    //     $fileSize = $file->getSize();
    //     $mimeType = $file->getMimeType();

    //     $file = fopen($tempPath, "r");
    //     $valid_extension = array("csv");
    //     $maxFileSize = 2097152;

    //     if (in_array(strtolower($extension), $valid_extension)) {
    //         if ($fileSize <= $maxFileSize) {
    //             $importData_arr = array();
    //             $i = 0;
    //             while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
    //                 $num = count($filedata);
    //                 for ($c = 0; $c < $num; $c++) {
    //                     $importData_arr[$i][] = $filedata[$c];
    //                 }
    //                 $i++;
    //             }
    //             fclose($file);
    //             $rowsinserted = 0;
    //             foreach ($importData_arr as $importData) {
    //                 try {
    //                     $check = DB::table($outlet_id . '_categories')
    //                         ->updateOrInsert(
    //                             ['cat_name' => $importData[0]],
    //                             ['cat_name' => $importData[0], 'cat_desc' => $importData[1]]
    //                         );
    //                     if ($check == true) {
    //                         $rowsinserted++;
    //                     }
    //                 } catch (\Illuminate\Database\QueryException $ex) {
    //                     return redirect()->route('admin:categories')->with('error', "Something went wrong in Data");
    //                 }
    //             }
    //             return redirect()->route('admin:categories')->with('success', $rowsinserted . ' Categories imported successully!');
    //         }
    //     }
    // }

    // public function uploadexcel(Request $request)
    // {
    //     $outlet_id = Session::get('outlet_id');
    //     $path = $request->file('excel_file')->getRealPath();
    //     $excel = Importer::make('Excel');
    //     $excel->load($path);
    //     $collection = $excel->getCollection();
    //     $rowsinserted = 0;
    //     foreach ($collection as $importData) {
    //         try {
    //             $check = DB::table($outlet_id . '_categories')
    //                 ->updateOrInsert(
    //                     ['cat_name' => $importData[0]],
    //                     ['cat_name' => $importData[0], 'cat_desc' => $importData[1]]
    //                 );
    //             if ($check == true) {
    //                 $rowsinserted++;
    //             }
    //         } catch (\Illuminate\Database\QueryException $ex) {
    //             return redirect()->route('admin:categories')->with('error', "Something went wrong in Data");
    //         }
    //     }
    //     return redirect()->route('admin:categories')->with('success', $rowsinserted . ' Categories imported successully!');
    // }
}
