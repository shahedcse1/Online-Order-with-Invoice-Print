<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    // protected $policies = [
    //     'App\Models\Model' => 'App\Policies\ModelPolicy',
    // ];

    protected $policies = [

        'App\Models' => 'App\Policies\ModelPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');


        Gate::define('view-role', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'role') {
                        if ($role->permission >= 1) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('create-role', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'role') {
                        if ($role->permission >= 2) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('update-role', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'role') {
                        if ($role->permission >= 3) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('delete-role', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'role') {
                        if ($role->permission == 4) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        // Role Module Model

        Gate::define('view-role-module', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'module') {
                        if ($role->permission >= 1) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('create-role-module', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'module') {
                        if ($role->permission >= 2) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('update-role-module', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'module') {
                        if ($role->permission >= 3) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('delete-role-module', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'module') {
                        if ($role->permission == 4) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        /*
        User Gate
        */

        Gate::define('view-user', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'user') {
                        if ($role->permission >= 1) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('create-user', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'user') {
                        if ($role->permission >= 2) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('update-user', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'user') {
                        if ($role->permission >= 3) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('delete-user', function ($user) {
            if ($user->role->permissions) {
                $roles = json_decode($user->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'user') {
                        if ($role->permission == 4) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });


        /*
        Order Gate
        */

        Gate::define('view-order', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'order') {
                        if ($role->permission >= 1) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('create-order', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'order') {
                        if ($role->permission >= 2) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('update-order', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'order') {
                        if ($role->permission >= 3) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('delete-order', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'order') {
                        if ($role->permission == 4) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        /*
        Excel File Gate
        */

        Gate::define('view-excel-file', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'excel_file') {
                        if ($role->permission >= 1) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('create-excel-file', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'excel_file') {
                        if ($role->permission >= 2) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('update-excel-file', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'excel_file') {
                        if ($role->permission >= 3) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('delete-excel-file', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'excel_file') {
                        if ($role->permission == 4) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });



        /*
       Search Order Gate
       */

        Gate::define('view-search-order', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'search_order') {
                        if ($role->permission >= 1) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('create-search-order', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'search_order') {
                        if ($role->permission >= 2) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('update-search-order', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'search_order') {
                        if ($role->permission >= 3) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

        Gate::define('delete-search-order', function ($order) {
            if ($order->role->permissions) {
                $roles = json_decode($order->role->permissions);
                foreach ($roles as $role) {
                    if ($role->model == 'search_order') {
                        if ($role->permission == 4) {
                            return true;
                        }
                    }
                }
            }
            return false;
        });

    }
}
