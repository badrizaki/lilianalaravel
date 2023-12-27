<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class DestroyApiController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'destroy:api-controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete api controller and remove from routes custom by zaki';
/**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'api-controller';
    /**
     * The routes API instance.
     *
     * @var \routes\api.php
     */
    protected $routesAPI;
    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
        $this->routesAPI = 'routes/api.php';
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->fire();
    }
    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function fire()
    {
        $name = $this->qualifyClass($this->getNameInput());
        $path = $this->getPath($name);
        // First we will check to see if the class already exists then delete file class
        if ($this->alreadyExists($this->getNameInput()))
            $this->files->delete($path);

        $this->removeFromRoutesAPI($name);
        $this->info($this->type.' telah berhasil di hapus.');
    }
    /**
     * Parse the class name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function qualifyClass($name)
    {
        $rootNamespace = $this->rootNamespace();
        if (Str::startsWith($name, $rootNamespace)) {
            return $name;
        }
        $name = str_replace('/', '\\', $name);
        return $this->qualifyClass(
            $this->getDefaultNamespace(trim($rootNamespace, '\\')).'\\'.$name
        );
    }
    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return trim($this->argument('name'));
    }
    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return $this->laravel->getNamespace();
    }
    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $name);
        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }
    /**
     * Determine if the class already exists.
     *
     * @param  string  $rawName
     * @return bool
     */
    protected function alreadyExists($rawName)
    {
        return $this->files->exists($this->getPath($this->qualifyClass($rawName)));
    }

    /**
     * Get the full namespace for a given class, without the class name.
     *
     * @param  string  $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Controllers\Api';
    }

    protected function removeFromRoutesAPI($name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);
        $url = str_replace('Controller', '', $class);
        $url = strtolower($url);

        $routes = "\n\n";
        $routes .= "## $url\n";
        $routes .= 'Route::post(\'/'.$url.'\', [\'uses\' => \'Api\\'.$class.'@index\', \'middleware\' => \'APIAuthentication\']);';
        $routes .= "\n";
        $routes .= 'Route::post(\'/'.$url.'/get\', [\'uses\' => \'Api\\'.$class.'@get\', \'middleware\' => \'APIAuthentication\']);';
        $routes .= "\n";
        $routes .= 'Route::post(\'/'.$url.'/add\', [\'uses\' => \'Api\\'.$class.'@add\', \'middleware\' => \'APIAuthentication\']);';
        $routes .= "\n";
        $routes .= 'Route::put(\'/'.$url.'/update\', [\'uses\' => \'Api\\'.$class.'@update\', \'middleware\' => \'APIAuthentication\']);';
        $routes .= "\n";
        $routes .= 'Route::delete(\'/'.$url.'/delete\', [\'uses\' => \'Api\\'.$class.'@destroy\', \'middleware\' => \'APIAuthentication\']);';

        $routesAPIDef = $this->files->get($this->routesAPI);
        $routesAPIDef = str_replace($routes, '', $routesAPIDef);

        $this->files->put($this->routesAPI, $routesAPIDef);

        return true;
    }
}
