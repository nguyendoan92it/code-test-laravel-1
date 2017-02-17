<?php
/**
 * Created by PhpStorm.
 * User: Doan-PC
 * Date: 2/17/2017
 * Time: 10:39 PM
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(Request $request) {

        if($request->id) {
            User::destroy($request->id);
        }

        $pagename = 'Manage User';
        $data = User::all()->toArray();

        res:
        return view('user.index', ['pagename' => $pagename, 'data' => $data]);

    }

    public function insert(Request $request) {

        $pagename = 'Add User';
        $succ = '';
        $error = '';
        $username = '';


        if($_POST) {
            $username = $request->input('username');
            $password = $request->input('password');
            $re_pass = $request->input('password');
            $thumnail = $_FILES['photo'] ? $_FILES['photo'] : '';

            if(!$username || !$password || !$re_pass || empty($thumnail['name'])) {
                $error = 'Bạn vui lòng điền đầy đủ thông tin.';
                goto res;
            }

            if($password != $re_pass) {
                $error = '2 password không khớp nhau.';
                goto res;
            }

            if(strlen($username) < 6 || strlen($username) >= 50) {
                $error = 'Username phải từ 6-50 ký tự.';
                goto res;
            }

            if(!empty($thumnail)) {
                if ($thumnail['type'] == 'image/jpeg' || $thumnail['type'] == 'image/png' || $thumnail['type'] == 'image/gif') {

                    if ($thumnail['size'] > 5048576) {
                        $error .= 'File upload không lớn hơn 5mb';
                    } else {
                        // file hợp lệ, tiến hành upload
                        $path = "public/upload/"; // file sẽ lưu vào thư mục upload
                        $tmp_name = $thumnail['tmp_name'];
                        $name_img = time() . '_' . $thumnail['name'];
                        // Upload file
                        $result_upload = move_uploaded_file($tmp_name, $path . $name_img);

                        if (!$result_upload)
                            $error .= 'Upload bị lỗi, vui lòng kiểm tra lại. ';

                        $thumnail = $path . $name_img;
                    }

                }
            }

            if(User::getUserByName($username)) {
                $error = 'Username đã tồn tại, vui điền tên khác.';
                goto res;
            }

            $res = User::create(
                [
                    'username'=> $username,
                    'password'=> md5($password),
                    'images'=> $thumnail,
                    'create_time' => time()
                ]
            );

            if(!$res) {
                $error = 'Lỗi save db';
            } else {
                $succ = 'Thêm user mới thành công.';
            }

        }

        res:
        return view('user.add', ['pagename' => $pagename, 'succ' => $succ, 'error' => $error, 'username' => $username]);

    }

    public function edit(Request $request) {

        $pagename = 'Update User';
        $succ = '';
        $error = '';
        $username = '';
        $id = $request->id ? $request->id : 0;
        $info_user = User::find($id);

        if(!$id || !$info_user) {
            echo 'Vui lòng không sửa thông tin'; die;
        }

        $info_user = $info_user->toArray();
        $username = $info_user['username'];
        $images = $info_user['images'];

        if($_POST) {
            $username = $request->input('username');
            $id = $request->input('id');
            $check_submit = $request->input('check_submit');

            if(!$username || !$id || !$check_submit) {
                $error = 'Bạn vui lòng điền username và không sửa nội dung form.';
                goto res;
            }

            if(strlen($username) < 6 || strlen($username) >= 50) {
                $error = 'Username phải từ 6-50 ký tự.';
                goto res;
            }

            if(md5($id.'khong_hack_duoc_dau_12345') != $check_submit) {
                $error = 'Bạn vui lòng không sửa nội dung form.';
                goto res;
            }

            if(User::getUserByNameAndId($username, $id)) {
                $error = 'Username đã tồn tại, vui điền tên khác.';
                goto res;
            }

            $user = User::find($id);
            $user->username = $username;
            $res = $user->save();

            if(!$res) {
                $error = 'Lỗi save db';
            } else {
                $succ = 'Update user thành công.';
            }

        }

        res:
        return view('user.edit', ['pagename' => $pagename, 'succ' => $succ, 'error' => $error, 'username' => $username, 'id' => $id, 'images'=>$images]);

    }



}