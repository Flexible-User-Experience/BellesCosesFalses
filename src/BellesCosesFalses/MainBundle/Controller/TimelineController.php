<?php

namespace BellesCosesFalses\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TimelineController extends Controller
{
    public function facebookAction()
    {
        return $this->render('BellesCosesFalsesMainBundle:Timeline:facebook.html.twig', array(
            //'result' => $result,
            //'jsonData' => $jsonData,
        ));
    }

    public function pinterestAction()
    {
        return $this->render('BellesCosesFalsesMainBundle:Timeline:pinterest.html.twig', array(
            //'result' => $result,
            //'jsonData' => $jsonData,
        ));
    }

    public function instagramAction()
    {
        //$em = $this->getDoctrine()->getManager();
        //$posts = $em->getRepository('FluxBlogBundle:Post')->getAllActivePostsSortedByDate();

        $instagram_config = $this->container->getParameter('instagram');
        // Manage Instagram Clients from http://instagram.com/developer
        $user_id = $instagram_config['user_id'];   // davidromani UID (get from http://jelled.com/instagram/lookup-user-id)
        $access_token = $instagram_config['access_token'];     // rbcf managed client (get from http://jelled.com/instagram/access-token)
        $count = $instagram_config['count'];
        $width = $instagram_config['width'];
        $height = $instagram_config['height'];
        $hashtag = $instagram_config['hashtag'];

        //$url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?access_token='.$access_token.'&count='.$count;
        $url = 'https://api.instagram.com/v1/tags/'.$hashtag.'/media/recent?access_token='.$access_token.'&count='.$count;

        // Also Perhaps you should cache the results as the instagram API is slow
        /*$cache = './'.sha1($url).'.json';
        if (file_exists($cache) && filemtime($cache) > time() - 60*60) {
            // If a cache file exists, and it is newer than 1 hour, use it
            $jsonData = json_decode(file_get_contents($cache));
        } else {
            $jsonData = json_decode((file_get_contents($url)));
            file_put_contents($cache,json_encode($jsonData));
        }*/
        $jsonData = json_decode((file_get_contents($url)));

        /*$result = '<div id="instagram">'.PHP_EOL;
        foreach ($jsonData->data as $key=>$value) {
            if (isset($value->caption)) {
                $result .= "\t".'<a class="fancybox" data-fancybox-group="gallery" title="'.htmlentities($value->caption->text);
                $result .= ' '.htmlentities(date("F j, Y, g:i a", $value->caption->created_time));
                $result .= '" style="padding:3px" href="'.$value->images->standard_resolution->url.'">
                              <img src="';
                $result .= $value->images->low_resolution->url.'" alt="';
                $result .= $value->caption->text.'" width="'.$width.'" height="'.$height.'" /></a>'.PHP_EOL;
            }
        }
        $result .= '</div>'.PHP_EOL;*/

        /*$query = "sky";
        $api = $this->get('instaphp');
        $response = $api->Tags->Search($query);
        $userInfo = $response->data[0];
        // getting all the pages of results
        do {
            $pages[] = $response->data;
        } while($response = $response->getNextPage());*/

        return $this->render('BellesCosesFalsesMainBundle:Timeline:instagram.html.twig', array(
            //'result' => $result,
            'jsonData' => $jsonData,
        ));
    }
}
