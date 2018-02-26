<?php declare(strict_types=1);

namespace App\Presenters;


/**
 * Class ProfilePresenter
 *
 * @author  geniv
 * @package App\Presenters
 */
class ProfilePresenter extends SecurityBasePresenter
{

    /**
     * Startup.
     *
     * @throws \Nette\Application\AbortException
     */
    protected function startup()
    {
        parent::startup();

        $this->redirect(':Homepage:');  // default redirect for not use this presenter
    }


    /**
     * Render default.
     */
    public function renderDefault()
    {
    }
}
