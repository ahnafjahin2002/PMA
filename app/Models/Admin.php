<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
// The Admin model extends the Authenticatable class, which provides the necessary functionality for user authentication.
// The $fillable property specifies which attributes should be mass-assignable.
// The $hidden property specifies which attributes should be hidden when the model is converted to an array or JSON.
// This is useful for hiding sensitive information like passwords.
// The model can be used to interact with the 'admins' table in the database.
// It can be used to create, read, update, and delete admin records.
// The model can also be used to define relationships with other models, such as roles or permissions.
// The Admin model can be used in conjunction with Laravel's built-in authentication features, such as guards and policies.
// The model can be used to implement features like password reset, email verification, and two-factor authentication.
// The model can be used to define custom methods for admin-specific functionality, such as managing users or viewing logs.
// The model can be used to implement features like role-based access control, where different admins have different permissions.
// The model can be used to implement features like logging admin actions, such as login attempts or changes to user accounts.
// The model can be used to implement features like notifications, where admins can receive alerts about important events.
// The model can be used to implement features like activity tracking, where admins can view their own actions and the actions of other admins.
// The model can be used to implement features like API access, where admins can interact with the application programmatically.
// The model can be used to implement features like localization, where admin interfaces can be translated into different languages.