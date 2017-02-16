<?php


use App\User;

class ExampleTest extends FeatureTestCase
{
    function test_basic_example()
    {
        $user = factory(User::class)->create([
            'name' => 'Miguel Rodriguez',
            'email' => 'miguel@rodriguez.me'
        ]);
        $this->actingAs($user, 'api')
            ->visit('api/user')
            ->see('Miguel Rodriguez')
            ->see('miguel@rodriguez.me');
    }
}
