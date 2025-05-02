protected $routeMiddleware = [
    // ... otros middlewares
    'role' => \App\Http\Middleware\CheckRole::class,
];