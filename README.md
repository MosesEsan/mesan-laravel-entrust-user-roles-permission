# Laravel 5.3 Administration Module using Entrust Package to add Role-based Permissions
A PHP Administration Module which includes <b>Roles</b> and <b>Users</b> Management, developed using the Laravel 5.3 framework and Entrust package in order to add role-based permissions.

<h2>Admin Users can:</h2>
<ol>
<li>Create new roles</li>
<li>Set permissions for each role</li>
<li>Create new users</li>
<li>Assign a role to the user</li>
</ol>

<h2>API Structure</h2>
<strong>Roles</strong>
<ol>
<li>Create New Roles - <b>/roles</b> - POST - <b>C</b></li>
<li>View Role Info - <b>roles/{{role_id}}</b> - GET - <b>R</b></li>
<li>Edit Role Info - <b>roles/{{role_id}}</b> - PUT/PATCH -  <b>U</b></li>
<li>Delete Role - <b>roles/{{role_id}}</b> - DELETE -  <b>D</b></li>
</ol>

<strong>Users</strong>
<ol>
<li>Create New Users - <b>/users</b> - POST - <b>C</b></li>
<li>View User Info - <b>users/{{user_id}}</b> - GET - <b>R</b></li>
<li>Edit User Info - <b>users/{{user_id}}</b> - PUT/PATCH -  <b>U</b></li>
<li>Delete User - <b>users/{{user_id}}</b> - DELETE -  <b>D</b></li>
</ol>
<br>


<h1>Steps</h1>

In order to create this project, I followed this <a href="http://itsolutionstuff.com/post/laravel-52-user-acl-roles-and-permissions-with-middleware-using-entrust-from-scratch-tutorialexample.html">tutorial</a> to set up the base of the project.

<ul>
  <li><a href="#step1">Step 1: Setup and Dependecies </a></li>
  <li><a href="#step2">Step 2: Create Tables Using Migration</a></li>
</ul>


<a name="step1"></a>
<h1>Step 1: Setup and Dependencies</h1>

Open composer.json and update the require object to include entrust:
```php
"require": {
    "php": ">=5.6.4",
    "laravel/framework": "5.3.*",
    "zizaco/entrust": "5.2.x-dev"
},
```

Then, run
```bash
composer update
```

We’ll now need to update the providers array in <b>config/app.php</b> with the entrust provider.
Open up <b>config/app.php</b>, find the <b>providers</b> array located on line 111 and add this to it:

```php
Zizaco\Entrust\EntrustServiceProvider::class

```
Add in the entrust facades which we can do in config/app.php. Find the aliases array and add these facades to it:

```php
'Entrust'   => Zizaco\Entrust\EntrustFacade::class,

```
Config

We can also custom changes on entrust package, so if you also want to changes then you can fire bellow command and get config file in config/entrust.php.
We also need to publish the assets for this package. From the command line:

```bash
php artisan vendor:publish

```

Entrust package provide it's in-built middleware that way we can use it, open <b>app/Http/Kernel.php</b> and add the middleware.
```php
protected $routeMiddleware = [
    'role' => \Zizaco\Entrust\Middleware\EntrustRole::class,
    'permission' => \Zizaco\Entrust\Middleware\EntrustPermission::class,
    'ability' => \Zizaco\Entrust\Middleware\EntrustAbility::class,

];

```

<a name="step2"></a>
<h1>Step 2: Create Tables Using Migration</h1>

<ol>
    <li>users</li>
    <li>roles</li>
    <li>role_user</li>
    <li>permission_role</li>
    <li><b>clients</b></li>
    <li><b>client_statuses</b></li>
</ol>

If you install a fresh laravel project then you have already users table migration.
You need to create the clients, client_statuses table.
```bash
php artisan make:migration create_clients_table
php artisan make:migration create_client_statuses_table

```

<strong>clients</strong>
```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('added_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->string('website')->nullable();
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('added_by')->references('id')->on('users');
            $table->foreign('status')->references('id')->on('client_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("clients");
    }
}
```

<strong>client_statuses</strong>
```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("client_statuses");
    }
}

Run
```bash
php artisan entrust:migration
```

<strong>IMPORTANT (In case of error when running the entrust migration)</strong>
In vendor/zizaco/entrust/src/commands/MigrationCommand.php on line 86
remove line :
```php
   $usersTable  = Config::get('auth.table');
   $userModel   = Config::get('auth.model');
```

add line :
```php
$usersTable  = Config::get('auth.providers.users.table');
$userModel   = Config::get('auth.providers.users.model');
```

Update the provider object in config/auth.php to look like this
```php
'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\User::class,
        'table' => 'users',
    ],

    // 'users' => [
    //     'driver' => 'database',
    //     'table' => 'users',
    // ],
],

```

<strong>permissions, roles, role_user, permission_role</strong>
```php
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
```

```
If you are using MAMP be sure to add the unix_socket key with a value of the path that the mysql.sock resides in MAMP.
<strong>config/database.php</strong>

```php
'mysql' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', 'localhost'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'jwt-api-db'),
    'username' => env('DB_USERNAME', 'jwt-api'),
    'password' => env('DB_PASSWORD', 'testpwd'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
    'strict' => false,
    'engine' => null,
    'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',
],
```

Update .env file with your database settings(db_database, db_username, db_password) and update the CACHE_DRIVER value to array

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[db_name]
DB_USERNAME=[db_user]
DB_PASSWORD=[db_pwd]

CACHE_DRIVER=array
```

Run
```bash
php artisan migrate
```


<strong>More to come....</strong>