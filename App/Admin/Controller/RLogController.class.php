<?php
namespace Admin\Controller;

use Admin\Controller\BaseController;

class RLogController extends BaseController
{
    public function _filter()
    {
        $map = array();

        $user_id = I('user_id');
        if (!empty($user_id)) {
            $map['user_id'] = $user_id;
        }

        return $map;
    }
}
