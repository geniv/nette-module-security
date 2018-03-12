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

neon configure (security module does not model but only component) via: https://github.com/geniv/nette-identity-authenticator

and login form configure via: https://github.com/geniv/nette-identity-login

header menu:
```latte
<li n:class="$presenter->isLinkCurrent(':Profile:*') ? active"><a n:href=":Profile:">{_'header-profile'}</a></li>
<li><a n:href="loginForm:Out!" {confirm 'Really logout?'}>{_'header-logout'}</a></li>
```
