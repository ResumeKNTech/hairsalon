<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->join('barbers', 'users.id', '=', 'barbers.name')
            ->join('categories', 'barbers.category', '=', 'categories.id')
            ->where('users.status', '=', 1) // add this where clause to filter by status
            ->select('users.*', 'categories.category')
            ->get();
    
        $data = [];
        foreach ($users as $user) {
            $data[$user->id]['user'] = $user;
            $data[$user->id]['services'][] = $user->category;
            $data[$user->id]['created_at'] = $user->created_at;
            $data[$user->id]['level'] = $user->level;
    
        }
    
        return view('admin.user.index', compact('data'));
    }
    public function approve($id)
    {
        DB::table('users')->where('id', $id)->update(['status' => 1]);
        return redirect()->route('admin.user.showalluser')->with('success', 'Xác nhận thành công');
    }
    public function firer($id)
    {
        DB::table('users')->where('id', $id)->update(['status' => 0]);
        return redirect()->route('admin.user.showalluser')->with('success', 'Chuyển sang trạng thái "Nghỉ việc" thành công');
    }
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.user.create', compact('categories'));

    }
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token', 'confirm', 'category');
        $data['created_at'] = new \DateTime();
        $data['password'] = Hash::make($data['password']);
        $file = $request->file;
        $image = time() . "-" . $file->getClientOriginalName();
        $path = public_path() . "/upload";
        $file->move($path, $image);
        $data['file'] = $image;
        $userId = DB::table('users')->insertGetId($data);
        if ($userId) {
            $categories = $request->category;
            if ($categories && !empty($categories)) {
                foreach ($categories as $item)
                    DB::table('barbers')->insert([
                        'name' => $userId,
                        'category' => $item,
                        'created_at' => Carbon::now()
                    ]);
            }
        }
        return redirect()->route('admin.user.showalluser')->with('success', 'Tạo thành công');
    }
    public function showalluser()
    {
        $data['user']=DB::table('users')->get();
        return view('admin.user.showalluser',$data);
    }
    public function edit($id)
    {
        $data['categories'] = DB::table('categories')->get();
        $data['user'] = DB::table('users')->where('id', $id)->first();
        $data['active_category'] = DB::table('barbers')->where('name', $id)->pluck("category")->toArray();
        return view('admin.user.edit', $data);
    }
    public function update(UpdateRequest $request, $id)
    {

        $data = $request->except('_token', 'confirm', 'category');
        $data['updated_at'] = new \DateTime();
        if (empty($data['password'])) {
            $da['matkhau'] = DB::table('users')->where('id', $id)->first();
            $data['password'] = $da['matkhau']->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }
        if (empty($data['file'])) {
            $da['file'] = DB::table('users')->where('id', $id)->first();
            $data['file'] = $da['file']->file;
        } else {
            $file = $request->file;
            $image = time() . "-" . $file->getClientOriginalName();
            $path = public_path() . "/upload";
            $file->move($path, $image);
            $data['file'] = $image;
        }
        DB::table('users')->where('id', $id)->update($data);

        $categories = $request->category;
        if ($categories && !empty($categories)) {
            DB::table('barbers')->where('name', $id)->delete();
            foreach ($categories as $item)
                DB::table('barbers')->insert([
                    'name' => $id,
                    'category' => $item,
                    'created_at' => Carbon::now()
                ]);
        }

        return redirect()->route('admin.user.index')->with('success', 'Update thành công');
    }
    public function destroy($id)
    {
        $bill = DB::table('booking')->where('barber', $id)->get();
        foreach ($bill as $i) {
            DB::table('bill')->where('name', $i->id)->delete();
        }
        DB::table('booking')->where('barber', $id)->delete();
        DB::table('barbers')->where('name', $id)->delete();
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.user.index')->with('success', 'Xóa thành công');
    }
    public function dang_ky()
    {
        return view('signin');
    }
    public function templateLogin()
    {
        
        return view('login');
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('admin.showalluser.index');
        } else {
            return redirect()->route('login')->with('error', 'Tài khoản hoặc mật khẩu chưa chính xác');
        }
    }
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}