<?php

namespace App\Providers;

use App\Models\Categorias;
use App\Models\EmpresaPlano;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $especialidade = Categorias::orderBy('categoria','asc')->get();
        $empresasPremium = EmpresaPlano::where('plano_id',1)->orderByRaw("RAND()")->limit(6)->get();
        View::share('data',['especialidades' => $especialidade, 'premium' => $empresasPremium]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
