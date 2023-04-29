<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home', 'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Asignar un rol'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.contacts.index', 'description' => 'Ver contactos'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.subscribers.index', 'description' => 'Ver subscriptores'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver listado de categorías'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy', 'description' => 'Eliminar categorías'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.servicios.index', 'description' => 'Ver listado de servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.servicios.create', 'description' => 'Crear servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.servicios.edit', 'description' => 'Editar servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.servicios.destroy', 'description' => 'Eliminar servicios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index', 'description' => 'Ver listado de etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create', 'description' => 'Crear etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit', 'description' => 'Editar etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy', 'description' => 'Eliminar etiquetas'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index', 'description' => 'Ver listado de publicaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create', 'description' => 'Crear publicaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit', 'description' => 'Editar publicaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy', 'description' => 'Eliminar publicaciones'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'posts.comment', 'description' => 'Responder comentarios en el blog'])->syncRoles([$role1, $role2]);

        /* Permission::create(['name' => 'admin.tags'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts'])->syncRoles([$role1, $role2]); */
    }
}
