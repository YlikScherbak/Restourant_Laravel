<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;


class AdminWaiterController extends MainController
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->navbar = $this->getAdminNavbar();
    }


    public function allWaiters() {
        $this->title = 'Waiters';
        $this->template = 'admin.waiters.waiters';

        $this->addVars('waiters', $this->userService->getAllWaiters());

        return $this->renderOutput();
    }

    public function enabledWaiter(Request $request) {

        $this->userService->enabledWaiter($request);

        return redirect()->route('admin_all_waiter');

    }

    public function editWaiter(UserRequest $request, $id) {


        if ($request->isMethod('POST')) {
            $this->userService->saveWaiter($request, $id);

            return redirect()->route('admin_all_waiter');
        }


        $this->template = 'admin.waiters.edit_waiter';

        $this->addVars('waiter', $this->userService->getWaiterById($id));

        $this->title = 'Edit ' . $this->vars['waiter']->username;

        return $this->renderOutput();

    }

    public function registerWaiter(UserRequest $request){

        if ($request->isMethod('POST')) {
            $this->userService->registryWaiter($request);
            return redirect()->route('admin_all_waiter');
        }

        $this->template = 'admin.waiters.edit_waiter';
        $this->title = 'Register waiter';

        return $this->renderOutput();

    }


}
