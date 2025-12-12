<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;
use Illuminate\Support\Str;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        $guests = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '08123456789',
                'quota' => 2
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '08129876543',
                'quota' => 1
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael@example.com',
                'phone' => '08134567890',
                'quota' => 3
            ],
            [
                'name' => 'Sarah Williams',
                'email' => 'sarah@example.com',
                'phone' => '08145678901',
                'quota' => 2
            ],
            [
                'name' => 'David Brown',
                'email' => 'david@example.com',
                'phone' => '08156789012',
                'quota' => 1
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily@example.com',
                'phone' => '08167890123',
                'quota' => 2
            ],
            [
                'name' => 'Robert Wilson',
                'email' => 'robert@example.com',
                'phone' => '08178901234',
                'quota' => 4
            ],
            [
                'name' => 'Lisa Anderson',
                'email' => 'lisa@example.com',
                'phone' => '08189012345',
                'quota' => 1
            ],
            [
                'name' => 'James Taylor',
                'email' => 'james@example.com',
                'phone' => '08190123456',
                'quota' => 2
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria@example.com',
                'phone' => '08101234567',
                'quota' => 3
            ]
        ];

        foreach ($guests as $guest) {
            Guest::create([
                'name' => $guest['name'],
                'email' => $guest['email'],
                'phone' => $guest['phone'],
                'code' => $this->generateUniqueCode(),
                'quota' => $guest['quota']
            ]);
        }
    }

    private function generateUniqueCode(): string
    {
        do {
            // Generate kode acak 6 karakter (kombinasi huruf dan angka)
            $code = strtoupper(Str::random(6));
        } while (Guest::where('code', $code)->exists());

        return $code;
    }
}