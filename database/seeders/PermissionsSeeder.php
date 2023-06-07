<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[
            'create_student',
            'update_student',
            'delete_student',
           'create_admin',
           'view_admins',
           'delete_admin',
           'update_admin',
           'create_role',
           'delete_role',
           'view_roles',
           'update_role',
           'create_group',
           'delete_group',
           'update_group',
           'create_exam' ,
           'view_exams',
           'update_exam' ,
           'delete_exam',
           'create_quiz',
           'delete_quiz',
           'update_quiz',
           'view_quizzes',
           
        ];
        foreach($permissions as $permission)
        {
            Permission::create([
                'name'=>$permission ,
            ]);
        }
    }
}
