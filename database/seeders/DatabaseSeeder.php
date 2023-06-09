<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            $role = Role::create(['name' => 'Admin']);
            $user = User::create([
                'name' => "Admin",
                'email' => "admin@demo.com",
                'password' => bcrypt("123456")
            ]);
            $user->assignRole($role->name);
            DB::commit();
        }
        catch(QueryException $e){
            DB::rollBack();
            throw $e;
        }
    }
}
