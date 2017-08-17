<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Services\ErrorService;
use App\Services\WorkShiftService;
use Illuminate\Http\Request;
use function Sodium\add;


class AdminController extends MainController
{
    public function __construct(ErrorService $errorService, WorkShiftService $workShiftService)
    {
        $this->errorService = $errorService;
        $this->workShiftService = $workShiftService;
    }


    public function showMain() {
        $this->title = 'Admin page';
        $this->template = 'admin.main';

        $this->addVars('activeErrors', $this->errorService->getActiveError());
        $this->addVars('workShift', $this->workShiftService->getActiveWorkShift());

        return $this->renderOutput();

    }

    public function showMessages() {
        $this->title = "Messages from waiters";
        $this->template = 'admin.messages';

        $this->addVars('errors', $this->errorService->getAll());

        return $this->renderOutput();

    }

    public function deleteMessage($id) {
        $this->errorService->deleteById($id);

        return redirect(route('admin_messages'));
    }


    public function openShift() {
        $this->workShiftService->openShift();

        return redirect(route('admin_main'))->with('message', 'Work shift is open');
    }

    public function closeShift() {
       $this->workShiftService->closeShift();
    }
}
