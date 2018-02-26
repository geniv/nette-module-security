<?php declare(strict_types=1);

namespace App\Presenters;


/**
 * Class LoginPresenter
 *
 * @author  geniv
 * @package App\Presenters
 */
class LoginPresenter extends BasePresenter
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
     * Before render.
     */
    protected function beforeRender()
    {
        parent::beforeRender();

        $this->setLayout($this->context->parameters['appDir'] . '/presenters/templates/@layout.latte');
    }


    /**
     * Render default.
     *
     * @throws \Nette\Application\AbortException
     */
    public function renderDefault()
    {
        if ($this->user->isLoggedIn()) {
            $this->redirect('Homepage:');    // if logged in then redirect to homepage
        }
    }
}
