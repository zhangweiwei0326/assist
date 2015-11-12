<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if (isset(session('user_info.id'))) {
            redirect(U('Index/index'));
        } else {
            $this->display();
        }
    }

    /**
     * 登录
     */
    public function checkLogin()
    {
        if (!IS_POST) {
            $this->error('非法访问');
        }

        $username = I('post.username');
        $password = I('post.password');

        $model = D('User');

        $info = $model->login($username, $password);

        if (!$info) {
            $this->error($model->getError());
        }

        session('user_info', $info);
        $this->success('登录成功', U('Index/index'));
    }

    /**
     * 退出
     */
    public function logout()
    {
        session(null);
        session_regenerate_id();
        redirect(U('Login/index'));
    }

    public function _empty()
    {
        redirect(U('Login/index'));
    }
}
