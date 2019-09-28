<?php

use Illuminate\Database\Seeder;
use judiostatic\Post;
use judiostatic\Buss;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = new Post();
        $posts->buss_id = "1";
        $posts->offer_end_at = "2019-03-14 21:00:00";
        $posts->price_new = "10.10";
        $posts->price_from = "11.11";
        $posts->title = "Oferta Lorem ipsum dolor sit amer us nec mollis";
        $posts->description = "Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero, vitae posuere ante lectus in enim. mollis vehicula, magna tortor finibus libero, vitae";
        $posts->post_hero_img_url = "images/tumb1.jpg";
        $posts->save();

        $posts = new Post();
        $posts->buss_id = "2";
        $posts->offer_end_at = "2019-03-14 21:00:00";
        $posts->price_new = "12.00";
        $posts->price_from = "37.00";
        $posts->title = "PromoÃ§Ã£o do Ximxim de Galinha 2x3 mais um refrig...";
        $posts->description = "Um saboroso prato de promoÃ§Ã£o do Ximxim de Galinha onde pelo preÃ§o de dois vocÃª ganha trÃªs mais um refrigerante. Oferta perfeita";
        $posts->post_hero_img_url = "images/posts/ximxim-de-gallinha.jpg";
        $posts->save();

        $posts = new Post();
        $posts->buss_id = "3";
        $posts->offer_end_at = "2019-03-14 21:00:00";
        $posts->price_new = "12.00";
        $posts->price_from = "26.00";
        $posts->title = "Feijoada com limÃ£o e carne de porco extra";
        $posts->description = "Uma feijoada clÃ¡ssica com o sabor que vocÃª sÃ³ encontra aqui. Esta oportunidade vocÃª terÃ¡ carne de porco extra e um preÃ§o muito mais barato";
        $posts->post_hero_img_url = "images/posts/frijolada.jpg";
        $posts->save();

        $posts = new Post();
        $posts->buss_id = "1";
        $posts->offer_end_at = "2019-03-14 21:00:00";
        $posts->price_new = "7.00";
        $posts->price_from = "14.00";
        $posts->title = " PromoÃ§Ã£o de 600 gr de Brigadeiros";
        $posts->description = "Um sabor saboroso de chocolate recheado com mais chocolate, coberto com mais chocolate. 600 gramas, entÃ£o vocÃª comeÃ§a bem o ano.";
        $posts->post_hero_img_url = "images/posts/brigadier.jpg";
        $posts->save();

        $posts = new Post();
        $posts->buss_id = "2";
        $posts->offer_end_at = "2019-03-14 21:00:00";
        $posts->price_new = "23.00";
        $posts->price_from = "45.00";
        $posts->title = " Churrasco para dois mais quatro cervejas de 400 ml";
        $posts->description = "Sabemos que sua predileÃ§Ã£o especial Ã© com uma boa carne de churrazco, Ã© por isso que temos essa boa oferta para vocÃª";
        $posts->post_hero_img_url = "images/posts/churrasco.jpg";
        $posts->save();
    }
}
