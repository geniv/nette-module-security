Security module
===============

Installation
------------
manual install direct to modules directory
```bash
git clone https://github.com/geniv/nette-module-security.git app/modules/SecurityModule
```

Include in application
----------------------
neon configure (security module does not model but only component):
```neon
# login
authenticator:
#	autowired: false    # default null, false => disable autowiring (in case multiple linked extension) | self
	source: "Dibi"
	tablePrefix: %tablePrefix%
#	source: "Neon"
#	path: %appDir%/authenticator.neon
#	source: "Array"
#	userlist:
#		Foo:
#			id: 1
#			hash: "$2y$10$jSD5JWKEA5Tmr1dlhKghbezuJAMXn/JygWiM9Km1XFkISxUYY5GeK"
#			role: guest
#			username: mr Foo
#		Bar:
#			id: 2
#			hash: "$2y$10$jSD5JWKEA5Tmr1dlhKghbezuJAMXn/JygWiM9Km1XFkISxUYY5GeK"
#			role: moderator
#			username: mr Bar
#	classArray: Authenticator\Drivers\ArrayDriver
#	classNeon: Authenticator\Drivers\NeonDriver
#	classDibi: Authenticator\Drivers\DibiDriver
#	source: "Combine"
#	combineOrder:
#		- Array
#		- Neon
#		- Dibi
```

neon configure extension:
```neon
extensions:
    authenticator: Authenticator\Bridges\Nette\Extension
```

header menu:
```latte
<li n:class="$presenter->isLinkCurrent(':Profile:*') ? active"><a n:href=":Profile:">{_'header-profile'}</a></li>
<li><a n:href="loginForm:Out!" {confirm 'Really logout?'}>{_'header-logout'}</a></li>
```

basepresenter:
```php
    /*
     * Login
     */


    /**
     * Create component login form.
     *
     * @param LoginForm $loginForm
     * @return LoginForm
     */
    protected function createComponentLoginForm(LoginForm $loginForm): LoginForm
    {
        //$loginForm->setTemplatePath(__DIR__ . '/templates/LoginForm.latte');
        // callback from $loginForm (redirect is no problem)
        $loginForm->onLoggedIn[] = function (User $user) {
            $this->flashMessage('Login!', 'info');
//            $this->redirect('this');
        };
//        $loginForm->onLoggedInException[] = function (Exception $e) {
//            $this->flashMessage('Login exception! ' . $e->getMessage(), 'danger');
//        };
        $loginForm->onLoggedOut[] = function (User $user) {
            $this->flashMessage('Logout!', 'info');
            $this->redirect('this');
        };
        return $loginForm;
    }
```

latte:
```latte
{if !$user->isLoggedIn()}
    {control loginForm}
{else}
    <a n:href="loginForm:Out!">Logout</a>
{/if}
```
