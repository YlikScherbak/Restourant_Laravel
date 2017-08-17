<?php


namespace App\Services\Implementation;


use App\Model\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserServiceImpl extends MainService implements UserService
{

    public function getAllWaiters()
    {
        return $this->userRepository->getAllWaiter();
    }

    public function enabledWaiter(Request $request)
    {
        $id = $request->get('id');
        $waiter = $this->userRepository->findById($id);

        if ($waiter->enabled) {
            $waiter->enabled = false;
        } else {
            $waiter->enabled = true;
        }

        $this->userRepository->save($waiter);
    }

    public function getWaiterById($id)
    {
        $waiter = $this->userRepository->findById($id);

        if (is_null($waiter)) {
            abort(500, 'Waiter with those id does not exists');
        }

        return $waiter;
    }

    public function saveWaiter($request, $id)
    {
        $data = $request->only(['username', 'password']);

        $waiter = $this->getWaiterById($id);
        $waiter->username = $data['username'];
        $waiter->password = bcrypt($data['password']);

        $this->userRepository->save($waiter);
    }

    public function registryWaiter($request)
    {
        $data = $request->only(['username', 'password']);

        $waiter = new User(['username' => $data['username'], 'password' => bcrypt($data['password']),
            'enabled' => true]);
        $role = $this->roleRepository->selectWhere(['role' => 'waiter']);
        $waiter->role()->associate($role);

        $this->userRepository->save($waiter);
    }


}