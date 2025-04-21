<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Supprimer l'ancienne contrainte
        DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_role_check');
        
        // Modifier la colonne role
        DB::statement("ALTER TABLE users ALTER COLUMN role TYPE VARCHAR(255)");
        
        // Ajouter la nouvelle contrainte
        DB::statement("ALTER TABLE users ADD CONSTRAINT users_role_check CHECK (role IN ('admin', 'psychologue', 'patient'))");
    }

    public function down()
    {
        // En cas de rollback, on remet la contrainte d'origine
        DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_role_check');
    }
}; 