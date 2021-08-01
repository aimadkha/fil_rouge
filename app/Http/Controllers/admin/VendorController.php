<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VenderRequest;
use App\Models\MainCategory;
use App\Models\Vendor;
use App\Notifications\VenderCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::selection()->paginate(10);
        return view('admin.vendors.index', compact('vendors'));

    }

    public function create()
    {
        $categories = MainCategory::get();
        return view('admin.vendors.create', compact('categories'));
    }

    public function store(VenderRequest $request)
    {
//        return $request;
        try {
            $filePath = "";
            if ($request->has('logo')) {
                $filePath = uploadImage('vendors', $request->logo);

            }
            $vendor = Vendor::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'logo' => $filePath,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'category_id' => $request->category
            ]);
            Notification::send($vendor, new VenderCreated($vendor));
            return redirect()->route('admin.vendors')->with(['success' => 'registred successufly']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.vendors.create')->with(['error' => 'registred failed! try again']);
        }

    }


    public function edit($id)
    {
        $categories = MainCategory::get();
        $vendor = Vendor::selection()->find($id);
        if (!$vendor) {
            return redirect()->route('admin.vendors')->with(['error' => 'this store not found']);
        }
        return view('admin.vendors.edit', ['vendor' => $vendor, 'categories' => $categories]);
    }


    public function update($id, VenderRequest $request)
    {

        try {
            $vendor = Vendor::selection()->find($id);
            if (!$vendor) {
                return redirect()->route('admin.vendors')->with(['error' => 'this store not found']);
            }
            DB::beginTransaction();

            if ($request->has('logo')) {
                $filePath = uploadImage('vendors', $request->logo);
                Vendor::where('id', $id)->update([
                    'logo' => $filePath
                ]);
            }

            if ($request->has('password')) {
                Vendor::where('id', $id)->update([
                    'password' => $request->password,
                ]);

            }

            Vendor::where('id', $id)->update([
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'address'=>$request->address,
            ]);
            DB::commit();
            return redirect()->route('admin.vendors')->with(['success'=>'updated successfuly']);

        } catch (\Exception $exception){
            DB::rollBack();
            return $exception;
            return redirect()->route('admin.vendors.edit')->with(['error' => 'updated failed! try again']);
        }
    }


    public function destroy($id)
    {
        try {
            $vendor = Vendor::find($id);
            if (!$vendor){
                return redirect()->route('admin.vendors')->with(['error' => 'this store not found']);
            }
            $image = Str::after($vendor->logo, 'assets');
            $image = base_path('public/assets' . $image);
            unlink($image);
            $vendor->delete();
            return redirect()->route('admin.vendors')->with(['success'=>'deleted successfuly']);

        } catch (\Exception $exception){
            return $exception;
        }

    }
}
