# Multi Tenant Database Laravel With Orchestra Package Implementation
<h3>Note</h3>
<p>If you are looking for Configuration Tenant Driver for Single Database, Please <a href="https://github.com/basherr/laravel-multi-tenancy-single-database">Click here.</a></p>
<h2>Installation Instruction - Multi Database Connection Setup</h2>
<p>Clone or Download the Repository to the htdocs / www folder.</p>
<span>Update Composer by typing<code>Composer update</code> in the <code>command line</code> on the root directory of project.</span>
<span>Change default database configuration in </span> <code>config/database.php</code><br/>
<span>We are using default database connection </span><code>mysql</code>

```
'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'), //This database will be the root for all other databases, can manage other databases tables etc
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
```
<span>Database Connection Resolver</span>
```
'mybuild' => [                         //set up for database connection resolver
            'driver'    => 'mysql',
            'host'      => 'localhost',     // for user with id=1
            'database'  => '',     // for user with id=1
            'username'  => 'root', // for user with id=1
            'password'  => '', // for user with id=1
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],
```
<span><code>mybuild</code> will be resolved by <code>app\Providers\AppServiceProvider.php</code> in <code>boot</code> method</span>
```
public function boot()
{
    Tenanti::connection('mybuild', function (Site $entity, array $config) {
        $config['database'] = "mybuild_{$entity->getKey()}"; 
        // refer to config under `database.connections.tenants.*`.
        return $config;
    });
}
```
<span> Run migration by typing<code>php artisan migrate</code>in the </span><code>command line</code>
<p>Please feel free to contribute and send pull request.</p>
