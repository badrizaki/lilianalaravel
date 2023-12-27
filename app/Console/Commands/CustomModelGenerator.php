<?php

/**
 *  Name         : CustomModelGenerator.
 *  Description  : This class for create Model with schema.
 *  @copyright   : Badri Zaki
 *  @version     : 1.8
 *  @author      : Badri Zaki - badrizaki@gmail.com
**/

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Schema;

class CustomModelGenerator extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom-model {name} {--table=} {--primarykey=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create model to Models directory and auto generate tables';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
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
        $name           = $this->qualifyClass($this->getNameInput());
        $table          = $this->getTableInput();
        $primaryKey     = $this->getPrimaryKeyInput();
        $path           = $this->getPath($name);
        $path_parts     = pathinfo($path);
        $path_only      = $path_parts['dirname'];

        $column         = $this->getColumn($table);
        
        /**
        * First we will check to see if the class already exists. If it does, we don't want
        * to create the class and overwrite the user's code. So, we will bail out so the
        * code is untouched. Otherwise, we will continue generating this class' files.
        */
        if ($this->alreadyExists($this->getNameInput()))
        {
            $this->error($this->type.' already exists!');
            return false;
        }

        /**
        * Next, we will generate the path to the location where this class' file should get
        * written. Then, we will build the class and make the proper replacements on the
        * stub files so that it gets the correctly formatted namespace and class name.
        */
        $this->makeDirectory($path);
        $this->files->put($path, $this->buildClass($name, $table, $column, $primaryKey));


        $this->info($this->type.' telah berhasil di buat.');
    }

    /**
     * Get column from table.
     *
     * @param  string  $table
     * @return string
     */
    protected function getColumn($table = '')
    {
        $result = '';
        if ($table)
        {
            $result = Schema::getColumnListing($table);
            if (count($result) > 0)
            {
                $result = $this->createFillable($result);
            }
        }
        /*
        $resultData = '';
        foreach ($result as $key => $column)
        {
            $typeData = Schema::getColumnType('shipments', $column);
            $resultData .= $column . ' : ' . $typeData . "\n";
        }
        */
        return $result;
    }

    /**
     * Create format fillable for model.
     *
     * @param  array  $field/column
     * @return string
     */
    protected function createFillable($columnArray = array())
    {
        $tab = "\t\t";
        $result = '';
        foreach ($columnArray as $key => $column)
        {
            if ($result == '')
                $result .= "$tab'$column',";
            else 
                $result .= "\n$tab'$column',";
        }

        return $result;
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
     * Get the desired table name from the input.
     *
     * @return string
     */
    protected function getTableInput()
    {
        return trim($this->option('table'));
    }

    /**
     * Get the desired table name from the input.
     *
     * @return string
     */
    protected function getPrimaryKeyInput()
    {
        return trim($this->option('primarykey'));
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
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
        return $path;
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name, $table, $column, $primaryKey)
    {
        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceTableName($stub, $table);
        $stub = $this->replacePrimaryKey($stub, $primaryKey);
        $stub = $this->replaceColumnFillable($stub, $column);
        $stub = $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
        return $stub;
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            ['DummyNamespace', 'DummyRootNamespace'],
            [$this->getNamespace($name), $this->rootNamespace()],
            $stub
        );
        return $this;
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
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/model.plain.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\Models';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);
        return str_replace('DummyClass', $class, $stub);
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $table
     * @return string
     */
    protected function replaceTableName($stub, $table)
    {
        return str_replace('TABLE_NAME', $table, $stub);
    }

    /**
     * Replace primarykey from signature.
     *
     * @param  string  $stub
     * @param  string  $primaryKey
     * @return string
     */
    protected function replacePrimaryKey($stub, $primaryKey)
    {
        return str_replace('PRIMARY_KEY', $primaryKey, $stub);
    }

    /**
     * Replace primarykey from signature.
     *
     * @param  string  $stub
     * @param  string  $column
     * @return string
     */
    protected function replaceColumnFillable($stub, $column)
    {
        return str_replace("'COLUMN'", $column, $stub);
    }
}