<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1- Gestion des utilisateurs

        // Donner à un utilisateur la permissions d'accéder au tableau de bord
        Permission::create([
            'name' => 'Acceder au tableau de bord',  
            'slug' => 'user.tableau-de-bord',
            'description' => 'Acceder au tableau de bord',
        ]);
        // Donner à un utilisateur la permission de lister tous les utilisateurs
        Permission::create([
            'name' => 'Lister tous les utilisateurs',
            'slug' => 'user.index',
            'description' => 'Lister tous les utilisateurs',
        ]);
        // Donner à un utilisateur la permission d'ajouter un utilisateur
        Permission::create([
        	'name' => 'Ajouter un utilisateur',
        	'slug' => 'user.create',
        	'description' => 'Ajouter un utilisateur',
        ]);
        // Donner à un utilisateur la permission d'afficher un utilisateur
        Permission::create([
        	'name' => 'Afficher un utilisateur',
        	'slug' => 'user.show',
        	'description' => 'Afficher un utilisateur',
        ]);
        // Donner à un utilisateur la permission de modifier un utilisateur
        Permission::create([
        	'name' => 'Modifier un utilisateur',
        	'slug' => 'user.edit',
        	'description' => 'Modifier un utilisateur',
        ]);
        // Donner à un utilisateur la permission de voir son profil
        Permission::create([
            'name' => 'Voir son prfil',
            'slug' => 'user.profil',
            'description' => 'Voir son prfil',
        ]);
        // Donner à un utilisateur la permission de modifier son mot de passe
        Permission::create([
            'name' => 'Modifier son mot de passe',
            'slug' => 'user.password',
            'description' => 'Modifier son mot de passe',
        ]);
        // Donner la permission à un utilisateur de supprimer un utilisateur
        Permission::create([
            'name' => 'Supprimer un utilisateur',
            'slug' => 'user.destroy',
            'description' => 'Supprimer un utilisateur',
        ]);

        // 2- Gestion des roles

        // Donner à un utilisateur la permission de lister tous les rôles
        Permission::create([
            'name' => 'Lister tous les rôles',
            'slug' => 'role.index',
            'description' => 'Lister tous les rôles',
        ]);
        // Donner à un utilisateur la permission d'ajouter un rôle
        Permission::create([
        	'name' => 'Ajouter un rôle',
        	'slug' => 'role.create',
        	'description' => 'Ajouter un rôle',
        ]);
        // Donner à un utilisateur la permission d'afficher un rôle
        Permission::create([
        	'name' => 'Afficher un rôle',
        	'slug' => 'role.show',
        	'description' => 'Afficher un rôle',
        ]);
        // Donner à un utilisateur la permission de modifier un rôle
        Permission::create([
        	'name' => 'Modifier un rôle',
        	'slug' => 'role.edit',
        	'description' => 'Modifier un rôle',
        ]);
        // Donner à un utilisateur la permission de supprimer un rôle
        Permission::create([
        	'name' => 'Supprimer un rôle',
        	'slug' => 'role.destroy',
        	'description' => 'Supprimer un rôle',
        ]);

        // 3- Gestion des projets

        // Donner la permission à un utilisateur de lister tous les projets
        Permission::create([
            'name' => 'Lister tous les projets',
            'slug' => 'projet.index',
            'description' => 'Lister tous les projets',
        ]);

        // Donner à un utilisateur la permission de lister tous ses projets
        Permission::create([
            'name' => 'Lister tous mes projets',
            'slug' => 'projet.all',
            'description' => 'Lister tous mes projets',
        ]);

        // Donner à un utilisateur la permission d'ajouter un projet
        Permission::create([
            'name' => 'Ajouter un projet',
            'slug' => 'projet.create',
            'description' => 'Ajouter un projet',
        ]);
        // Donner à un utilisateur la permission d'afficher un projet
        Permission::create([
            'name' => 'Afficher un projet',
            'slug' => 'projet.show',
            'description' => 'Afficher un projet',
        ]);
        // Donner à un utilisateur la permission de modifier un projet
        Permission::create([
            'name' => 'Modifier un projet',
            'slug' => 'projet.edit',
            'description' => 'Modifier un projet',
        ]);
        // Donner à un utilisateur la permission de supprimer un projet
        Permission::create([
            'name' => 'Supprimer un projet',
            'slug' => 'projet.destroy',
            'description' => 'Supprimer un projet',
        ]);
    }
}
