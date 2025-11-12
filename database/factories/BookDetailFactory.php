<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'published_date' => $this->faker->date(),                 // 이미 추가하신 필드
            'price'          => $this->faker->numberBetween(10000, 60000), // ✅ 가격 채우기
            // 'isbn' / 'summary' 등은 스키마에 있을 때만 넣으십시오
            // 'book_id'는 시더에서 지정
        ];
    }
}

