<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Créer les utilisateurs
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            
            // Créer des posts pour chaque utilisateur
            $posts = [
                [
                    'title' => 'First Post',
                    'content' => 'This is my first post content',
                    'author_id' => $user->id,
                    'published' => true,
                ],
                [
                    'title' => 'Second Post',
                    'content' => 'This is my second post content',
                    'author_id' => $user->id,
                    'published' => $user->id === 1 ? false : true,
                ],
            ];
            
            foreach ($posts as $postData) {
                $post = Post::create($postData);
                
                // Créer des commentaires
                Comment::create([
                    'content' => 'Great post!',
                    'post_id' => $post->id,
                    'author_id' => $user->id === 1 ? 2 : 1,
                ]);
            }
        }
    }
}