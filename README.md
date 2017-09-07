# Laravel 5.4 Administration Module with Role-based permissions using Entrust package

A PHP Administration Module with an ACL(Access Control List) based on Roles and Permissions, developed using the Laravel 5.4 framework and Entrust package.

## Testing
In your browser, navigate to

http://mosesesan.com/demos/entrust-admin-module/

You should be presented with Laravel welcome page, click login at the top right then login in using the admin credentials below.

```bash
email: adminuser@test.com
password: adminpwd
```
After logging in, you will be redirected to the home page, at the top right, click the roles link to go to the roles page.

<img src="https://github.com/MosesEsan/mesan-laravel-entrust-user-roles-permission/tree/laravel5.4/screenshots/roles.png" alt="Roles" >

<br/>
<br/>
Click the “New Role” button to add a new role and assign the relevant permissions.
<br/>
<br/>

<img src="https://github.com/MosesEsan/mesan-laravel-entrust-user-roles-permission/tree/laravel5.4/screenshots/new_role.png" alt="New role" width="300" align="left" >
<br/>
<br/>
After adding the new role, click the “Show” button to view the role information
<br/>
<br/>

<img src="https://github.com/MosesEsan/mesan-laravel-entrust-user-roles-permission/tree/laravel5.4/screenshots/role_info.png" alt="Role Info" >

<br/>
<br/>

Create a new role and test the edit and delete operations.

Now, lets add a new user and assign a role to them. Click the users link to go to the users page.

Click the “New User” button to add a new user and assign them the Senior Consultant role. Make sure you remember the password you set for the new user.

<br/>
<br/>

<img src="https://github.com/MosesEsan/mesan-laravel-entrust-user-roles-permission/tree/laravel5.4/screenshots/new_user.png" alt="New User" >
<img src="https://github.com/MosesEsan/mesan-laravel-entrust-user-roles-permission/tree/laravel5.4/screenshots/users.png" alt="Users Management" >

<br/>
<br/>

After successfully creating the new user, test the “Show” and “Edit” operations.

Create a new user and test delete operation.

For the final test, log out and log back in using the credentials of our newly created user.

Once you log in, you should notice that the Roles and Users link is missing in the navigation bar on the top right of the page, this is because the user is not an Admin user

<br/>
<br/>

<img src="https://github.com/MosesEsan/mesan-laravel-entrust-user-roles-permission/tree/laravel5.4/screenshots/welcome.png" alt="Logged In" >

<br/>
<br/>

If you attempt to access to the roles or users page using the url:

http://mosesesan.com/demos/entrust-admin-module/admin/roles

http://mosesesan.com/demos/entrust-admin-module/admin/users

You should be presented with our 403 page

<br/>
<br/>

<img src="https://github.com/MosesEsan/mesan-laravel-entrust-user-roles-permission/tree/laravel5.4/screenshots/403.png" alt="Permission Error" >

<br/>
<br/>


## Tutorial

<ul>
<li><a href="#step1">Step 1: Create new project and install Entrust</a></li>
<li><a href="#step2">Step 2: Add Entrust Provider and Facades</a></li>
<li><a href="#step3">Step 3: Set Up Database</a></li>
<li><a href="#step4">Step 4: Create Models</a></li>
<li><a href="#step5">Step 5: Create Our Database Seeder</a></li>
<li><a href="#step6">Step 6: Create Our Authentication</a></li>
<li><a href="#step7">Step 7: Create Our Controllers and Routes</a></li>
<li><a href="#step8">Step 8: Create Our Views</a></li>
<li><a href="#step9">Step 9: Update Our Navigation Menu and Add Error Page</a></li>
<li><a href="#step10">Step 10: Testing</a></li>
</ul>

<a name="step1"></a>
### Step 1: Create new project and install Entrust

Create Laravel project
```bash
laravel new administration-module
```
Open composer.json and update the require object to include entrust

```php
"require": {
"php": ">=5.6.4",
"laravel/framework": "5.4.*",
"laravel/tinker": "~1.0",

"zizaco/entrust": "5.2.x-dev"
}
```
Then, run 
```bash
composer update 
```

<a name="step2"></a>
### Step 2: Add Entrust Provider and Facades

Open up config/app.php, find the providers array and add the entrust provider:

```php
Zizaco\Entrust\EntrustServiceProvider::class,

```
Find the aliases array and add the entrust facades:

```php
'Entrust'   => Zizaco\Entrust\EntrustFacade::class,

```
Run the command below from the command line to publish the package config file.

```bash
php artisan vendor:publish
```

After you run this command you will see a new file in the config directory called entrust.php.

Entrust package provides it’s in-built middleware that way we can use it, open app/Http/Kernel.php and add the middleware.

```php
protected $routeMiddleware = [
...
'role' => \Zizaco\Entrust\Middleware\EntrustRole::class,
'permission' => \Zizaco\Entrust\Middleware\EntrustPermission::class,
'ability' => \Zizaco\Entrust\Middleware\EntrustAbility::class,
];
```

Now that the installation is done, lets move on to creating our database tables.

<a name="step3"></a>
### Step 3: Set Up Database

For this project we will be creating the following tables:

1. roles — stores role records
2. permissions — stores permission records
3. role_user — stores many-to-many relations between roles and users
4. permission_role — stores many-to-many relations between roles and permissions
5. users
6. clients
7. jobs
8. candidates

This first 4 tables are part of the Entrust package and are created with the entrust migration file which can be generated by running the command below.

```bash
php artisan entrust:migration

```
This command generates the entrust migration file (<timestamp>_entrust_setup_tables.php) in the database/migrations directory. 

The full tutorial is available on my  <a href="https://medium.com/@mosesesan/tutorial-6-how-to-build-a-laravel-5-4-4ba44f26b853" target="_blank">blog</a>.
