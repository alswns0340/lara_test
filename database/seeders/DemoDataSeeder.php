<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 데모용 계정 몇 개 생성
        $admin = User::create([
            'name' => '관리자',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // README에 안내
        ]);

        $user1 = User::create([
            'name' => '홍길동',
            'email' => 'hong@example.com',
            'password' => Hash::make('password123'),
        ]);

        $user2 = User::create([
            'name' => '테스트',
            'email' => 'jia3',
            'password' => Hash::make('jittest'),
        ]);

        // 🔹 게시글 더미 데이터
        $posts = [
            [
                'user_id' => $admin->id,
                'title'   => '공지사항: 게시판 데모 데이터입니다.',
                'content' => "이 프로젝트는 Laravel + Blade로 만든 게시판입니다.\n\n상단의 '글쓰기' 버튼을 눌러 글을 작성해 보세요.",
            ],
            [
                'user_id' => $user1->id,
                'title'   => '첫 번째 테스트 글입니다.',
                'content' => "안녕하세요. 테스트용 글입니다.\n\n댓글 기능도 함께 확인해 주세요.",
            ],
            [
                'user_id' => $user2->id,
                'title'   => '두 번째 테스트 글입니다.',    
                'content' => "이 글에는 여러 개의 댓글이 달려 있습니다.\n실행해서 화면을 확인해 주세요.",
            ],
        ];

        foreach ($posts as $data) {
            $post = Post::create($data);

            // 🔹 각 글에 댓글 몇 개씩 달기
            if ($post->title === '첫 번째 테스트 글입니다.') {
                PostComment::create([
                    'post_id' => $post->id,
                    'user_id' => $admin->id,
                    'content' => '관리자 계정',
                ]);

                PostComment::create([
                    'post_id' => $post->id,
                    'user_id' => $user1->id,
                    'content' => '제가 쓴 글에 제가 댓글을 남겨봅니다.',
                ]);
            }

            if ($post->title === '두 번째 테스트 글입니다.') {
                PostComment::create([
                    'post_id' => $post->id,
                    'user_id' => $user2->id,
                    'content' => '두 번째 글의 첫 번째 댓글입니다.',
                ]);

                PostComment::create([
                    'post_id' => $post->id,
                    'user_id' => $user1->id,
                    'content' => '댓글 수정/삭제 기능도 함께 확인해 주세요.',
                ]);
            }
        }
    }
}
