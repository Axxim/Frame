Frame
=====

Frame is a super simple PHP framework that uses Klein for routing.


Controllers
-----------
With Frame, controllers are a little more automatic by default. Frame provides
you with the following classes to extend to help you develop your applications.

* Frame\Controller\Plain
* Frame\Controller\Markdown
* Frame\Controller\JSON

For example:
```php
<?php

class UserController extends Frame\Controller\JSON {

    public function list() {
        $users = User::all();

        return $users;
    }

}
```
