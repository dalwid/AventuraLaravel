<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*DB::table('posts')->insert([
            'title'       => 'Post Exemplo',
            'description' => 'Descrição Post',
            'body'        => 'Conteúdo Post',
            'slug'        => 'post-exemplo',
            'thumb'       => 'thumb-test.png',
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ]);*/

        // Estamos gerando na base 5 posts fakes via factory
        //\App\Models\Post::factory(5)->create(); //is_active é falso por padrão

        // Gerando mais 10 posts na base com estado de is_active true
        //\App\Models\Post::factory(10)->active()->create(); //is_active é falso por padrão

        \App\Models\User::factory(10)
                            ->hasPosts(5, ['is_active' => true])
                            ->create();

    }
}
