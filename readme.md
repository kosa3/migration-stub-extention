## kosa3/migrationStubExtention
[![Software License][ico-license]](LICENSE.md)

### Install
Require this package with composer using the following command:

```bash
composer require --dev kosa3/migrationStubExtention:dev-master

```

After updating composer, add the migration directory to the `resources` stubs `blank.stub` `create.stub` `update.stub`

You can customize the stub file freely.

```php
public function up()
{
    Schema::create('DummyTable', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->timestamp('created_at')->nullable();
        $table->string('create_type', 32)->nullable()->default(null);
        $table->integer('create_id')->nullable()->default(null);
        $table->timestamp('updated_at')->nullable();
        $table->string('update_type', 32)->nullable()->default(null);
        $table->integer('update_id')->nullable()->default(null);
    });
}

```

After edited, make migration file by artisan command.

```bash
php artisan make:migration CreateUser --create users
```

```php
class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->nullable();
            $table->string('create_type', 32)->nullable()->default(null);
            $table->integer('create_id')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable();
            $table->string('update_type', 32)->nullable()->default(null);
            $table->integer('update_id')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

```


## License

The package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
