<div id="time-bar">
    <div id="time-bar-container">
            <nav>
                <ul><?php
                $post_offer_formated=$post_offer_datatime->format('d-m');
                    if (strtotime($post_offer_end_at) > 1) {
                 if(time() - strtotime($post_offer_end_at) <= 0){
                    if (abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400) {
                        echo '<li><div class="clock-time-deals"></div></li> <li style="color:red;">A oferta está prestes a terminar no dia '.$post_offer_formated.'</li>';
                    }else if(abs(time() - strtotime($post_offer_end_at)) >= 2 * 86400){
                        if(abs(time() - strtotime($post_offer_end_at)) > 7 * 86400){
                            echo '<li><div class="clock-time-deals clock-7"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
                        }else if(abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400){
                            echo '<li><div class="clock-time-deals clock-70"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
                        }else if(abs(time() - strtotime($post_offer_end_at)) <= 3 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 2 * 86400){
                            echo '<li><div class="clock-time-deals clock-30"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
                        }else if(abs(time() - strtotime($post_offer_end_at)) <= 4 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 3 * 86400){
                            echo '<li><div class="clock-time-deals clock-25"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
                        }else if(abs(time() - strtotime($post_offer_end_at)) <= 7 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 4 * 86400){
                            echo '<li><div class="clock-time-deals clock-15"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
                        }
                    }
                }else if(time() - strtotime($post_offer_end_at) > 1){
                    echo '<li><div class="clock-time-deals clock-100"></div></li> <li style="">A oferta terminou no dia '.$post_offer_formated.'</li>';    
                }

                    }else{
                        echo '
                        <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="far fa-clock" ></i></li>
                        <li>'.$post_updated_at.'</li>';
                    }
                    ?>
                </ul>
            </nav>
    </div>
</div>