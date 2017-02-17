<?php


class CreatePostsTest extends FeatureTestCase
{
    function test_a_user_can_create_a_post()
    {
        $pregunta = 'Esta es una pregunta';
        $contenido = 'Este es el contenido';

        $this->actingAs($user = $this->defaultUser())
            ->visit(route('posts.create'))
            ->type($pregunta, 'title')
            ->type($contenido, 'content')
            ->press('Publicar');

        $this->seeInDatabase('posts', [
            'title' => $pregunta,
            'content' => $contenido,
            'pending' => true,
            'user_id' => $user->id,
        ]);

        $this->see($pregunta);
    }

    function test_creating_a_post_requires_authentication()
    {
        $this->visit(route('posts.create'))
            ->seePageIs(route('login'));
    }

    function test_create_post_form_validation()
    {
        $this->actingAs($this->defaultUser())
            ->visit(route('posts.create'))
            ->press('Publicar')
            ->seePageIs(route('posts.create'))
            ->seeErrors([
                'title' => 'El campo título es obligatorio',
                'content' => 'El campo contenido es obligatorio'
            ]);
    }
}