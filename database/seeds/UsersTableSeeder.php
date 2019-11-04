<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nome'      => 'Admin',
            'email'     => 'beto@gmail.com',
            'endereco'     => 'gama',
            'telefone'     => '999999999',
            'estadoid'     => 1,
            'tipousuario'     => '0',
            'password'  => bcrypt('jeremoabo'),
            'last_login_at' => '2019-04-16 08:40:35',
            'created_at'     => '2019-04-16 08:40:35',
            'updated_at'     => '2019-04-16 08:40:35',
            'deleted_at'     => null,
        ]);
        User::create([
            'nome'      => 'Admin',
            'email'     => 'beto1@gmail.com',
            'endereco'     => 'gama',
            'telefone'     => '999999999',
            'estadoid'     => 1,
            'tipousuario'     => '0',
            'password'  => bcrypt('jeremoabo'),
            'last_login_at' => '2019-04-16 08:40:40',
            'created_at'     => '2019-04-16 08:40:35',
            'updated_at'     => '2019-04-16 08:40:35',
            'deleted_at'     => null,
        ]);
    }
}
