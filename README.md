# Laravel Role Based Authentication
A User and Roles Management PHP project using the Laravel framework and Entrust to create a role based authentication API.

Users with full permission can
<ul>
<li>Create New Roles</li>
<li>Set Permissions for each role</li>
<li>Create New Users</li>
<li>Set each users role</li>
<ul>


<h2>Roles</h2>
<ol>
<li>Create New Roles - <b>/roles</b> - POST - <b>C</b></li>
<li>View Role Info - <b>roles/{{role_id}}</b> - GET - <b>R</b></li>
<li>Edit Role Info - <b>roles/{{role_id}}</b> - PUT/PATCH -  <b>U</b></li>
<li>Delete Role - <b>roles/{{role_id}}</b> - DELETE -  <b>D</b></li>
</ol>


<h2>Users</h2>
<ol>
<li>Create New Users - <b>/users</b> - POST - <b>C</b></li>
<li>View User Info - <b>users/{{user_id}}</b> - GET - <b>R</b></li>
<li>Edit User Info - <b>users/{{user_id}}</b> - PUT/PATCH -  <b>U</b></li>
<li>Delete User - <b>users/{{user_id}}</b> - DELETE -  <b>D</b></li>
</ol>