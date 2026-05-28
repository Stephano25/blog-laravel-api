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
        // Vider les tables dans l'ordre inverse (à cause des clés étrangères)
        Comment::truncate();
        Post::truncate();
        User::truncate();
        
        // 1. D'abord créer les utilisateurs
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);
        
        $user2 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
        ]);
        
        // 2. Ensuite créer les posts (qui dépendent des users)
        $post1 = Post::create([
            'title' => 'First Post',
            'content' => 'This is my first post content',
            'author_id' => $user1->id,
            'published' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $post2 = Post::create([
            'title' => 'Second Post',
            'content' => 'This is my second post content',
            'author_id' => $user2->id,
            'published' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $post3 = Post::create([
            'title' => 'Third Post',
            'content' => 'This is my third post content',
            'author_id' => $user1->id,
            'published' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // 3. Enfin créer les commentaires (qui dépendent des posts ET des users)
        Comment::create([
            'content' => 'Great post! Very informative.',
            'post_id' => $post1->id,
            'author_id' => $user2->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Comment::create([
            'content' => 'Thanks for sharing this amazing content!',
            'post_id' => $post1->id,
            'author_id' => $user1->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Comment::create([
            'content' => 'Very helpful, I learned a lot.',
            'post_id' => $post2->id,
            'author_id' => $user1->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Comment::create([
            'content' => 'Excellent post! Keep up the good work.',
            'post_id' => $post2->id,
            'author_id' => $user2->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $this->command->info('Database seeded successfully!');
        $this->command->info('Users created: ' . User::count());
        $this->command->info('Posts created: ' . Post::count());
        $this->command->info('Comments created: ' . Comment::count());
    }
}