<?php declare(strict_types=1);

namespace App\Presenters;

/**
 * Class SecurityBasePresenter
 * Security base presenter for all security application presenters.
 *
 * @author  geniv
 * @package App\Presenters
 */
abstract class SecurityBasePresenter extends ModulesBasePresenter
{

    /**
     * Startup.
     *
     * @throws \Nette\Application\AbortException
     */
    protected function startup()
    {
        parent::startup();

        // not logged-in and presenter is not login
        if (!$this->user->isLoggedIn() && $this->getName() != 'Login') {
            $this->user->logout(true);
            $this->redirect('Login:');
        }
    }
}
