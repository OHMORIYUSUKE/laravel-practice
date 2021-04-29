<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// ./vendor/bin/phpunit

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * 基本的な機能テストの例
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.'eyJhbGciOiJSUzI1NiIsImtpZCI6IjRlOWRmNWE0ZjI4YWQwMjUwNjRkNjY1NTNiY2I5YjMzOTY4NWVmOTQiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoi5aSn5qOu6KOV5LuLIiwicGljdHVyZSI6Imh0dHBzOi8vbGg2Lmdvb2dsZXVzZXJjb250ZW50LmNvbS8tWE1LOXMwME1ENmcvQUFBQUFBQUFBQUkvQUFBQUFBQUFBQUEvQU1adXVjbHNhVGZRSnFWeVo0ZHA3aWNmSzdzejM3b1NGZy9zOTYtYy9waG90by5qcGciLCJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20veXVzdWtlLW9obW9yaSIsImF1ZCI6Inl1c3VrZS1vaG1vcmkiLCJhdXRoX3RpbWUiOjE2MTk3MDM5NTksInVzZXJfaWQiOiIzbzBtVnFqOUZSU2JPWm45dlR4MVZCWk1xb0YzIiwic3ViIjoiM28wbVZxajlGUlNiT1puOXZUeDFWQlpNcW9GMyIsImlhdCI6MTYxOTcwMzk2MCwiZXhwIjoxNjE5NzA3NTYwLCJlbWFpbCI6ImNpc3QuYjIxOS55Lm9obW9yaUBnbWFpbC5jb20iLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJnb29nbGUuY29tIjpbIjEwMzczMzM0NTU4ODY0MDk2ODI5MyJdLCJlbWFpbCI6WyJjaXN0LmIyMTkueS5vaG1vcmlAZ21haWwuY29tIl19LCJzaWduX2luX3Byb3ZpZGVyIjoiZ29vZ2xlLmNvbSJ9fQ.ernPrnD-OrXY4BHT3fBLTSeIXrRLEbK52oRRrzOvvNoum-AjlujMQEzIQ1lFCmpvMB-jHPZhZDWPqXejt5_JT22EGVv_BwNeJHteVKt-3IoAlUqOJFFihqqW-gjgW7BEPQ5zTGvFMWNgsNAl6r-Rc7qHYLz0dTTtwj8eRvyUItl7xc4O-moVB-EZILO_-UzyYH3ADlD_FadEnMdHrgSvLqjoQRisU7rnFyJQ-pyQ4LqHhbvHesYu-oOyhcdKHdtBbg-6y4i4GpK4dRuwMGuL2DY7PqQ0m4yTHnukLlGPyUOYwo3lMfHdyXBZnFk55QGOzMKtG05AyIrf_AQXEtfe6A',
        ])->json('POST', '/api/v1/post', ['content' => 'testcoment']);

        $response->assertOk();
    }
    public function testBasicExample2()
    {
        $response = $this->get('/api/v1/post');

        $response->assertOk();
    }
    public function testBasicExample3()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.'eyJhbGciOiJSUzI1NiIsImtpZCI6IjRlOWRmNWE0ZjI4YWQwMjUwNjRkNjY1NTNiY2I5YjMzOTY4NWVmOTQiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoi5aSn5qOu6KOV5LuLIiwicGljdHVyZSI6Imh0dHBzOi8vbGg2Lmdvb2dsZXVzZXJjb250ZW50LmNvbS8tWE1LOXMwME1ENmcvQUFBQUFBQUFBQUkvQUFBQUFBQUFBQUEvQU1adXVjbHNhVGZRSnFWeVo0ZHA3aWNmSzdzejM3b1NGZy9zOTYtYy9waG90by5qcGciLCJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20veXVzdWtlLW9obW9yaSIsImF1ZCI6Inl1c3VrZS1vaG1vcmkiLCJhdXRoX3RpbWUiOjE2MTk3MDM5NTksInVzZXJfaWQiOiIzbzBtVnFqOUZSU2JPWm45dlR4MVZCWk1xb0YzIiwic3ViIjoiM28wbVZxajlGUlNiT1puOXZUeDFWQlpNcW9GMyIsImlhdCI6MTYxOTcwMzk2MCwiZXhwIjoxNjE5NzA3NTYwLCJlbWFpbCI6ImNpc3QuYjIxOS55Lm9obW9yaUBnbWFpbC5jb20iLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJnb29nbGUuY29tIjpbIjEwMzczMzM0NTU4ODY0MDk2ODI5MyJdLCJlbWFpbCI6WyJjaXN0LmIyMTkueS5vaG1vcmlAZ21haWwuY29tIl19LCJzaWduX2luX3Byb3ZpZGVyIjoiZ29vZ2xlLmNvbSJ9fQ.ernPrnD-OrXY4BHT3fBLTSeIXrRLEbK52oRRrzOvvNoum-AjlujMQEzIQ1lFCmpvMB-jHPZhZDWPqXejt5_JT22EGVv_BwNeJHteVKt-3IoAlUqOJFFihqqW-gjgW7BEPQ5zTGvFMWNgsNAl6r-Rc7qHYLz0dTTtwj8eRvyUItl7xc4O-moVB-EZILO_-UzyYH3ADlD_FadEnMdHrgSvLqjoQRisU7rnFyJQ-pyQ4LqHhbvHesYu-oOyhcdKHdtBbg-6y4i4GpK4dRuwMGuL2DY7PqQ0m4yTHnukLlGPyUOYwo3lMfHdyXBZnFk55QGOzMKtG05AyIrf_AQXEtfe6A',
        ])->json('POST', '/api/v1/user');

        $response->assertOk();
    }
}
