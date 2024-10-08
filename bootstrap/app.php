<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Modules\Invoice\Console\GenerateInvoice;
use Modules\Invoice\Console\SendInvoiceReminders;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'isSuper' => \App\Http\Middleware\SuperMiddleware::class,
            'isAdmin' => \App\Http\Middleware\AdminMiddleware::class,
            'isUser' => \App\Http\Middleware\UserMiddleware::class,
            'isStaff' => \App\Http\Middleware\StaffMiddleware::class,
            
        ]);
    })
     //register commands
     ->withCommands([
        SendInvoiceReminders::class,
        GenerateInvoice::class,
    ])
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    
   