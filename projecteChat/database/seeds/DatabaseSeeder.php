<?php

use Illuminate\Database\Seeder;
use App\Permiso;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        self::seedPermiso();
    }

    private function seedPermiso()
	{
		DB::table('permisos')->delete();
		$p = new Permiso;
		$p ->name = "Normal";
		$p ->descripcion = "Usuario Registrado!!";
		$p ->save();

		$p = new Permiso;
		$p ->name = "Admin";
		$p ->descripcion = "Usuario Administrador!!";
		$p ->save();
	}
}	
