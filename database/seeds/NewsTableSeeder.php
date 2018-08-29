<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\News::create([
            'titulo'        => 'Lorem ipsum dolor sit amet.',
            'cuerpo'        => 'Curabitur iaculis eu ex eget interdum. Ut commodo pulvinar mi quis gravida. Etiam imperdiet vel enim sed finibus. Vivamus nec dui in mauris sollicitudin blandit id nec lacus. Praesent urna ligula, consequat condimentum diam hendrerit, ornare vestibulum enim. In gravida vulputate ante, ut tempor dolor varius ut. Etiam pretium tortor ac orci suscipit, eu ornare orci aliquam. Donec ac odio ac libero sollicitudin pretium non ac lorem.

            Aliquam id nibh rutrum, semper eros vitae, posuere nisi. Nam mollis condimentum libero, nec tincidunt sem volutpat ut. Nulla maximus euismod porttitor. Sed augue tortor, facilisis ac turpis vel, facilisis vulputate nulla. Donec venenatis sapien eget tellus molestie, nec tempor erat malesuada. Aliquam vestibulum enim quis justo mattis, eget feugiat dui dictum. Vestibulum eleifend ex eu dignissim dapibus. Nunc id varius sem, eget gravida nunc. Vestibulum auctor fermentum elementum. Vestibulum sit amet nisi vel turpis fermentum egestas. Curabitur semper nulla ac lacus lobortis, dictum ultricies lectus egestas. Praesent efficitur consectetur augue ac facilisis. Sed sodales sem sed velit sollicitudin vulputate.',
            'foto'          => 'imagen1.png',
            'fecha_noticia' => date('Y-m-d')
        ]);
        App\News::create([
            'titulo'        => 'Lorem ipsum dolor sit amet.',
            'cuerpo'        => 'Curabitur iaculis eu ex eget interdum. Ut commodo pulvinar mi quis gravida. Etiam imperdiet vel enim sed finibus. Vivamus nec dui in mauris sollicitudin blandit id nec lacus. Praesent urna ligula, consequat condimentum diam hendrerit, ornare vestibulum enim. In gravida vulputate ante, ut tempor dolor varius ut. Etiam pretium tortor ac orci suscipit, eu ornare orci aliquam. Donec ac odio ac libero sollicitudin pretium non ac lorem.

            Aliquam id nibh rutrum, semper eros vitae, posuere nisi. Nam mollis condimentum libero, nec tincidunt sem volutpat ut. Nulla maximus euismod porttitor. Sed augue tortor, facilisis ac turpis vel, facilisis vulputate nulla. Donec venenatis sapien eget tellus molestie, nec tempor erat malesuada. Aliquam vestibulum enim quis justo mattis, eget feugiat dui dictum. Vestibulum eleifend ex eu dignissim dapibus. Nunc id varius sem, eget gravida nunc. Vestibulum auctor fermentum elementum. Vestibulum sit amet nisi vel turpis fermentum egestas. Curabitur semper nulla ac lacus lobortis, dictum ultricies lectus egestas. Praesent efficitur consectetur augue ac facilisis. Sed sodales sem sed velit sollicitudin vulputate.',
            'foto'          => 'imagen2.png',
            'fecha_noticia' => date('Y-m-d')
        ]);
        App\News::create([
            'titulo'        => 'Lorem ipsum dolor sit amet.',
            'cuerpo'        => 'Curabitur iaculis eu ex eget interdum. Ut commodo pulvinar mi quis gravida. Etiam imperdiet vel enim sed finibus. Vivamus nec dui in mauris sollicitudin blandit id nec lacus. Praesent urna ligula, consequat condimentum diam hendrerit, ornare vestibulum enim. In gravida vulputate ante, ut tempor dolor varius ut. Etiam pretium tortor ac orci suscipit, eu ornare orci aliquam. Donec ac odio ac libero sollicitudin pretium non ac lorem.

            Aliquam id nibh rutrum, semper eros vitae, posuere nisi. Nam mollis condimentum libero, nec tincidunt sem volutpat ut. Nulla maximus euismod porttitor. Sed augue tortor, facilisis ac turpis vel, facilisis vulputate nulla. Donec venenatis sapien eget tellus molestie, nec tempor erat malesuada. Aliquam vestibulum enim quis justo mattis, eget feugiat dui dictum. Vestibulum eleifend ex eu dignissim dapibus. Nunc id varius sem, eget gravida nunc. Vestibulum auctor fermentum elementum. Vestibulum sit amet nisi vel turpis fermentum egestas. Curabitur semper nulla ac lacus lobortis, dictum ultricies lectus egestas. Praesent efficitur consectetur augue ac facilisis. Sed sodales sem sed velit sollicitudin vulputate.',
            'foto'          => 'imagen3.png',
            'fecha_noticia' => date('Y-m-d')
        ]);
        App\News::create([
            'titulo'        => 'Lorem ipsum dolor sit amet.',
            'cuerpo'        => 'Curabitur iaculis eu ex eget interdum. Ut commodo pulvinar mi quis gravida. Etiam imperdiet vel enim sed finibus. Vivamus nec dui in mauris sollicitudin blandit id nec lacus. Praesent urna ligula, consequat condimentum diam hendrerit, ornare vestibulum enim. In gravida vulputate ante, ut tempor dolor varius ut. Etiam pretium tortor ac orci suscipit, eu ornare orci aliquam. Donec ac odio ac libero sollicitudin pretium non ac lorem.

            Aliquam id nibh rutrum, semper eros vitae, posuere nisi. Nam mollis condimentum libero, nec tincidunt sem volutpat ut. Nulla maximus euismod porttitor. Sed augue tortor, facilisis ac turpis vel, facilisis vulputate nulla. Donec venenatis sapien eget tellus molestie, nec tempor erat malesuada. Aliquam vestibulum enim quis justo mattis, eget feugiat dui dictum. Vestibulum eleifend ex eu dignissim dapibus. Nunc id varius sem, eget gravida nunc. Vestibulum auctor fermentum elementum. Vestibulum sit amet nisi vel turpis fermentum egestas. Curabitur semper nulla ac lacus lobortis, dictum ultricies lectus egestas. Praesent efficitur consectetur augue ac facilisis. Sed sodales sem sed velit sollicitudin vulputate.',
            'foto'          => 'imagen4.png',
            'fecha_noticia' => date('Y-m-d')
        ]);
       
    }
}
